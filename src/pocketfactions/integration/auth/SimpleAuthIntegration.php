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

namespace pocketfactions\integration\auth;

use pocketfactions\PocketFactions;
use pocketmine\Player;
use SimpleAuth\SimpleAuth;

class SimpleAuthIntegration extends BaseAuthIntegration{
	/** @var PocketFactions */
	private $main;

	/** @var SimpleAuth */
	private $simpleAuth;

	public function __construct(PocketFactions $main){
		$this->main = $main;
		$this->simpleAuth = $this->getMain()->getServer()->getPluginManager()->getPlugin("SimpleAuth");
		if(!($this->simpleAuth instanceof SimpleAuth) or !$this->simpleAuth->isEnabled()){
			throw new \RuntimeException("SimpleAuth is not enabled!");
		}
	}

	public function isPlayerAuthenticated(Player $player){
		return $this->simpleAuth->isPlayerAuthenticated($player);
	}

	public function getMain(){
		return $this->main;
	}
}
