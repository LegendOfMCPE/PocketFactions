<?php

/*
 * PocketFactions
 *
 * Copyright (C) 2015 LegendsOfMCPE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author LegendsOfMCPE
 */

use pocketfactions\faction\FactionAccessPrimary;
use pocketfactions\faction\FactionAccessSecondary;
use pocketfactions\faction\FactionAccessTertiary;
use pocketfactions\PocketFactions;

chdir(__DIR__);

$filename = "bin/PocketFactions_Dev.phar";
$class = "dev";
$opts = getopt("", ["rc", "beta"]);
if(isset($opts["beta"])){
	$filename = "bin/PocketFactions_Beta.phar";
	$class = "beta";
}
if(isset($opts["rc"])){
	$filename = "bin/PocketFactions_RC.phar";
	$class = "rc";
}

$data = json_decode(file_get_contents("bin/id.json"));
$nextBuildId = ++$data->{$class};
$globalBuildId = ++$data->global;
$author = $data->author;
$version = $data->version->stage . "_" . $data->version->major . "." . $data->version->minor . "." . $globalBuildId . "_" . $class . "#" . $nextBuildId;
$description = $data->description;
$website = $data->website;
file_put_contents("bin/id.json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_BIGINT_AS_STRING));

if(is_file($filename)){
	unlink($filename);
}

$pluginYml = yaml_emit($manifest = [
	"name" => "PocketFactions",
	"author" => "LegendsOfMCPE",
	"authors" => [
		"PEMapModder",
	],
	"version" => $version,
	"api" => ["1.13.0"],
	"main" => PocketFactions::class,
	"description" => $description,
	"website" => $website,
	"build" => [
		"author" => $author,
		"buildTime" => [
			"ISO8601" => date(DATE_ISO8601),
			"unix" => time(),
		],
		"type" => $class,
		"globalBuildNumber" => $globalBuildId,
		"typeVersion" => $nextBuildId,
	],
], YAML_UTF8_ENCODING, YAML_LN_BREAK);

$i = 0;
function addDir(\Phar $phar, $realPath, $localPath){
	global $i;
	$realPath = str_replace("\\", "/", $realPath);
	$localPath = rtrim($localPath, "/\\") . "/";
	echo "Directory transfer: $realPath > $localPath", PHP_EOL;
	foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($realPath)) as $path){
		if(!$path->isFile()){
			continue;
		}
		$path = str_replace("\\", "/", (string) $path);
		if(strpos($path, ".git") !== false){
			continue;
		}
		$relative = ltrim(substr($path, strlen($realPath)), "/");
		$local = $localPath . $relative;
		$num = str_pad((string) (++$i), 3, "0", STR_PAD_LEFT);
		echo "\r[$num] Adding: " . realpath($path) . " to $local";
		$phar->addFile($path, $local);
	}
	echo "\n";
}

$phar = new Phar($filename);
$phar->setStub('<?php require_once "entry/entry.php"; __HALT_COMPILER();');
$phar->setSignatureAlgorithm(Phar::SHA1);
$phar->setMetadata($manifest);
$phar->startBuffering();
$phar->addFromString("plugin.yml", $pluginYml);
addDir($phar, realpath("src"), "src");
addDir($phar, realpath("entry"), "entry");
require_once realpath("src/pocketfactions/faction/FactionAccessPrimary.php");
require_once realpath("src/pocketfactions/faction/FactionAccessSecondary.php");
require_once realpath("src/pocketfactions/faction/FactionAccessTertiary.php");
$consts = [];
loadFactionAccessConstants(FactionAccessPrimary::class, $consts);
loadFactionAccessConstants(FactionAccessSecondary::class, $consts);
loadFactionAccessConstants(FactionAccessTertiary::class, $consts);
file_put_contents("resources/access.json", json_encode($consts, JSON_PRETTY_PRINT | JSON_BIGINT_AS_STRING));
addDir($phar, realpath("resources"), "resources");
$phar->stopBuffering();

if(is_file("priv/postCompile.php")){
	require_once("priv/postCompile.php"); // this is for testing
}

function loadFactionAccessConstants($className, &$output){
	$class = new ReflectionClass($className);
	$file = $class->getFileName();
	foreach($class->getConstants() as $constant => $v){
		preg_match($regex = '#/\*\*[\n\r\t ]+((\*[^\*]+)+)[\n\r\t ]+\*/[\n\r\t ]+const[\n\r\t ]+' . $constant . '[\n\r\t ]+=[\n\r\t ]+#m', file_get_contents($file), $match);
		$comment = trim(implode("\n", array_map(function ($str){
			return substr(trim($str), 2);
		}, explode("\n", $match[1]))));
		$output[strtolower($constant)] = $comment;
	}
}

exec("git add -A");
