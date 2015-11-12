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

namespace pocketfactions\config;

use pocketmine\utils\Config;

class PFConfig{
	/** @var string */
	public $factionsDbType;
	/** @var array */
	public $factionsDbMysqlDetails;
	/** @var array */
	public $factionsDbSqliteDetails;

	/** @var string */
	public $authIntegrationType;

	public $plotSizeBits;

	public function __construct(Config $config){
		$this->factionsDbType = $config->getNested("dataProviders.factions.type", "sqlite3");
		$this->factionsDbMysqlDetails = $config->getNested("dataProviders.factions.mysql");
		$this->factionsDbSqliteDetails = $config->getNested("dataProviders.factions.sqlite3");

		$this->authIntegrationType = $config->getNested("integrations.auth", "none");

		$plotSize = (int) $config->getNested("mechanism.plotSize", 8);
		if($plotSize === 0){
			$this->plotSizeBits = 3; // 2 << 3 => 8
		}else{
			for($i = 0; $i < PHP_INT_SIZE << 3; $i++){
				if(($plotSize >> $i) & 1){
					break;
				}
			}
			$bits = min(16, $i);
			$this->plotSizeBits = $bits;
		}
	}
}
