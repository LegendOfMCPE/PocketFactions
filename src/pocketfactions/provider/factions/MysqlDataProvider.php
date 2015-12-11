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

namespace pocketfactions\provider\factions;

use pocketfactions\PocketFactions;
use pocketfactions\provider\factions\mysql\MysqlStream;

class MysqlDataProvider extends CachedDataProvider{
	/** @var MysqlStream */
	private $db;

	public function __construct(PocketFactions $main){
		parent::__construct($main);
		$details = $main->getPFConfig()->factionsDbMysqlDetails;
		$this->db = new MysqlStream($details["host"], $details["username"], $details["password"], $details["schema"], isset($details["port"]) ? (int) $details["port"] : 3306);
		// TODO init queries
	}

	protected function getFactionByNameImpl($name, $callbackId){
	}
	protected function getFactionByIdImpl($id, $callbackId){
		// TODO: Implement getFactionByIdImpl() method.
	}
	protected function getFactionByPlayerImpl($name, $callbackId){
		// TODO: Implement getFactionByPlayerImpl() method.
	}

	public function close(){
		$this->db->stop();
	}
}
