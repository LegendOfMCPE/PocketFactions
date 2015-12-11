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

namespace pocketfactions\faction;

use pocketfactions\PocketFactions;
use pocketmine\utils\TextFormat;

class FactionBuilder{
	private $id;
	private $name;
	private $founder;
	private $power = 0;
	private $motto = TextFormat::GRAY . "(no motto set)";
	private $rules = [];
	private $ranks = [];
	private $defaultRankId;
	private $relRanks = [];

	public function isValid(){
		$output = isset($this->id, $this->name, $this->defaultRankId, $this->ranks[$this->defaultRankId]);
		foreach(FactionRelation::getAll() as $relation){
			$output = (isset($this->relRanks[$relation->getId()]) and $output);
		}
		return $output;
	}
	public function build(){
		$this->validate();
		return new FactionImpl($this);
	}
	public function validate(){
		if(!$this->isValid()){
			throw new \InvalidStateException("This builder is not fully initialized.");
		}
	}

	public function setId($id){
		$this->id = $id;
		return $this;
	}
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	public function setPower($power){
		$this->power = $power;
		return $this;
	}
	public function setMotto($motto){
		$this->motto = $motto;
		return $this;
	}
	public function setRules($rules){
		$this->rules = $rules;
		return $this;
	}
	public function setRanks($ranks){
		$this->ranks = $ranks;
		return $this;
	}
	public function addRank(FactionRank $rank){
		$this->ranks[$rank->getId()] = $rank;
		return $this;
	}
	public function setRelRanks($relRanks){
		$this->relRanks = $relRanks;
		return $this;
	}
	public function setDefaultRankId($defaultRankId){
		$this->defaultRankId = $defaultRankId;
		return $this;
	}
	public function setFounder($founder){
		$this->founder = $founder;
		return $this;
	}

	public static function establishNewFaction(PocketFactions $main, $id, $name, $founder){
		(new FactionBuilder)->setId($id)
			->setName($name)
			->setFounder($founder)
			->addRank(FactionRank::defaultDefaultRank($main));
	}
}
