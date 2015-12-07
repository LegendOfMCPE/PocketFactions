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

namespace pocketfactions\provider;

use pocketfactions\PocketFactions;

class OrderedObjectPool{
	/** @var PocketFactions */
	private $main;
	/** @var mixed[] */
	private $objects = [];
	/** @var int */
	private $nextObjectId = 0;

	public function __construct(PocketFactions $main){
		$this->main = $main;
	}

	/**
	 * @param mixed $object
	 *
	 * @return int
	 */
	public function store($object){
		$this->objects[$id = $this->nextId()] = $object;
		if(count($this->objects) >= $this->main->getConfig()->getNested("advanced.objectPool.warningSize")){
			$this->main->getLogger()->warning("OrderedObjectPool size reached " . count($this->objects) . "! Object summary:");
			$summary = [];
			foreach($this->objects as $obj){
				$class = get_class($obj);
				if(isset($summary[$class])){
					$summary[$class]++;
				}else{
					$summary[$class] = 1;
				}
			}
			foreach($summary as $class => $cnt){
				$this->main->getLogger()->warning($class . ": $cnt entries");
			}
		}
		return $id;
	}

	/**
	 * @param int $id
	 *
	 * @return mixed|null
	 */
	public function get($id){
		if(isset($this->objects[$id])){
			$object = $this->objects[$id];
			unset($this->objects[$id]);
			return $object;
		}
		return null;
	}
	/**
	 * Warning: avoid using this method to prevent memory leak
	 *
	 * @param int $id
	 *
	 * @return mixed|null
	 */
	public function getWithoutClean($id){
		return isset($this->objects[$id]) ? $this->objects[$id] : null;
	}

	/**
	 * @return int
	 */
	private function nextId(){
		return $this->nextObjectId++;
	}
}
