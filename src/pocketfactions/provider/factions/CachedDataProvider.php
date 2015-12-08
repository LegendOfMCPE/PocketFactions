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
use pocketfactions\utils\PFUtils;
use pocketmine\Player;

abstract class CachedDataProvider implements FactionsDataProvider{
	const NO_FACTION = -1;

	/** @var Faction[] $factions indexed by ID */
	private $factions = [self::NO_FACTION => null];

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
		if(array_key_exists($name, $this->nameToFID)){
			$callback($this->factions[$this->nameToFID[$name]]);
			return;
		}
		$callback2 = function ($faction) use ($callback, $name){
			if($faction instanceof Faction){
				PFUtils::identical($faction->getName(), $name, "fetched faction name", "requested faction name");
				$this->factions[$faction->getId()] = $faction;
				$this->nameToFID[$name] = $faction->getId();
			}
			$callback($faction);
		};
		$callbackId = $this->main->getObjectPool()->store($callback2);
		$this->getFactionByNameImpl($name, $callbackId);
	}
	protected abstract function getFactionByNameImpl($name, $callbackId);

	public function getFactionById($id, callable $callback){
		if(array_key_exists($id, $this->factions)){
			$callback($this->factions[$id]);
			return;
		}
		$callback2 = function ($faction) use ($callback, $id){
			if($faction instanceof Faction){
				PFUtils::identical($faction->getId(), $id, "fetched faction ID", "requested faction ID");
				$this->factions[$id] = $faction;
				$this->nameToFID[$faction->getName()] = $id;
			}else{
				$this->factions[$id] = null;
			}
			$callback($faction);
		};
		$callbackId = $this->main->getObjectPool()->store($callback2);
		$this->getFactionByIdImpl($id, $callbackId);
	}
	protected abstract function getFactionByIdImpl($id, $callbackId);

	public function getFactionForPlayer(Player $player, callable $callback){
		$name = strtolower($player->getName());
		if(array_key_exists($name, $this->playerToFID)){
			$callback($this->factions[$this->playerToFID[$name]]);
		}
		$callback2 = function ($fid) use ($callback, $name){
			$this->playerToFID[$name] = $fid;
			if($fid !== self::NO_FACTION){
				$this->getFactionById($fid, $callback);
			}else{
				$callback(null);
			}
		};
		$callbackId = $this->main->getObjectPool()->store($callback2);
		$this->getFactionByPlayerImpl($name, $callbackId);
	}
	protected abstract function getFactionByPlayerImpl($name, $callbackId);

	public function linkPlayerToFactionCache($name, Faction $faction){
		$this->playerToFID[$name] = $faction->getId();
	}
	public function unlinkPlayerFromFactionCache($name){
		$this->playerToFID[$name] = -1;
	}

	public function close(){
	}
}
