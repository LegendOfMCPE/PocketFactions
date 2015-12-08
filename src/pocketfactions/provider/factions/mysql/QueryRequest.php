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

class QueryRequest{
	/** @var PocketFactions */
	private $main;
	/** @var string */
	private $query;
	/** @var QueryListener|int|null */
	private $listener;

	/**
	 * QueryEntry constructor.
	 *
	 * @param PocketFactions     $main
	 * @param string             $query
	 * @param QueryListener|null $listener
	 */
	public function __construct(PocketFactions $main, $query, $listener = null){
		$this->main = $main;
		$this->query = $query;
		$this->listener = $listener;
	}
	/**
	 * Returns a clone of this object that is thread-safe (can be stored as a field in a {@link Threaded}
	 *
	 * @return QueryRequest
	 */
	public function getThreadSafeClone(){
		$clone = clone $this;
		$clone->makeThreadSafe();
		return $clone;
	}
	private function makeThreadSafe(){
		if($this->listener !== null){
			$this->listener = $this->main->getObjectPool()->store($this->listener);
		}
		unset($this->main);
	}
	public function makeThreadUnsafe(PocketFactions $main){
		$this->main = $main;
		if($this->listener !== null){
			$this->listener = $main->getObjectPool()->get($this->listener);
		}
	}

	public function getMain(){
		return $this->main;
	}
	public function getQuery(){
		return $this->query;
	}
	public function getListener(){
		return $this->listener;
	}

}
