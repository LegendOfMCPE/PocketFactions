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

use pocketmine\utils\TextFormat;

class FactionBuilder{
	private $id;
	private $name;
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
		return new FactionImpl(

		);
	}
	public function validate(){
		if(!$this->isValid()){
			throw new \InvalidStateException("This builder is not fully initialized.");
		}
	}
}
