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

namespace pocketfactions;

use pocketfactions\config\PFConfig;
use pocketfactions\faction\FactionRelation;
use pocketfactions\integration\auth\AuthIntegration;
use pocketfactions\integration\auth\BaseAuthIntegration;
use pocketfactions\integration\auth\SimpleAuthIntegration;
use pocketfactions\provider\OrderedObjectPool;
use pocketmine\plugin\PluginBase;

class PocketFactions extends PluginBase{
	/** @var OrderedObjectPool */
	private $objectPool;
	/** @var PFConfig */
	private $pfConfig;
	/** @var AuthIntegration */
	private $authIntegration;

	public function onLoad(){
		$this->objectPool = new OrderedObjectPool($this); // OOP = object-oriented programming :D

		FactionRelation::init();
	}

	public function onEnable(){
		/////////////////
		// LOAD CONFIG //
		/////////////////
		$this->saveDefaultConfig();
		$this->pfConfig = new PFConfig($this->getConfig());

		//////////////////
		// INTEGRATIONS //
		//////////////////
		$ai = $this->pfConfig->authIntegrationType;
		if($ai === "none"){
			$this->authIntegration = new BaseAuthIntegration;
		}elseif($ai === "SimpleAuth"){
			$this->authIntegration = new SimpleAuthIntegration($this);
		}else{
			throw new \RuntimeException("Invalid config value: unknown auth integration '$ai'");
		}

		////////////////////
		// DATA PROVIDERS //
		////////////////////
		$dpt = $this->pfConfig->factionsDbType;
		if($dpt === "mysql"){
			// TODO this is boring stuff :(
		}
	}

	/**
	 * @return OrderedObjectPool
	 */
	public function getObjectPool(){
		return $this->objectPool;
	}
}
