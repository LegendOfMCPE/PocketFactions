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

namespace pocketfactions\utils;

abstract class ModelledEnum{
	/** @var static[] */
	private static $pool = [];

	/** @var int */
	private $id;
	/** @var string */
	private $name;

	protected static function addEnumEntry(static $entry){
		self::$pool[$entry->getId()] = $entry;
	}

	public static function get($id){
		return isset(self::$pool[$id]) ? clone self::$pool[$id] : null;
	}

	public static function getByName($name){
		foreach(self::$pool as $element){
			if($element->getName() === $name){
				return clone $element;
			}
		}
		return null;
	}

	public static function getAll(){
		return self::$pool;
	}

	protected function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}

	public final function getId(){
		return $this->id;
	}

	public final function getName(){
		return $this->name;
	}
}
