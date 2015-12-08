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

namespace pocketfactions\provider\factions\mysql;

use pocketfactions\PocketFactions;
use pocketmine\scheduler\PluginTask;

class MysqlStreamTickTask extends PluginTask{
	/** @var PocketFactions */
	private $main;
	/** @var MysqlStream */
	private $stream;

	public function __construct(PocketFactions $main, MysqlStream $stream){
		parent::__construct($this->main = $main);
		$this->stream = $stream;
	}
	public function onRun($currentTick){
		$this->stream->tick($this->main);
	}
}
