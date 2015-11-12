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

use pocketfactions\faction\Faction;
use pocketfactions\PocketFactions;
use pocketmine\Player;

abstract class CachedDataProvider implements FactionsDataProvider{
	/** @var Faction[] $factions indexed by ID */
	private $factions = [];

	/** @var int[] array ("faction_name" => fid ) */
	private $nameToFID = [];
	/** @var int[] array ( "player_name" => fid ) */
	private $playerToFID = [];

	/** @var PocketFactions */
	private $main;

	public function __construct(PocketFactions $main){
		$this->main = $main;
	}

	public function getFaction($name, callable $callback){
		if(isset($this->nameToFID[$name])){
			$callback($this->factions[$this->nameToFID[$name]]);
			return;
		}
		$callbackId = $this->main->getObjectPool()->store($callback);
		$this->getFactionByNameImpl($name, $callbackId);
	}
	protected abstract function getFactionByNameImpl($name, $callbackId);

	public function getFactionById($id){
		// TODO: Implement getFactionById() method.
	}

	public function getFactionForPlayer(Player $player){
		// TODO: Implement getFactionForPlayer() method.
	}

	public function close(){
	}
}
