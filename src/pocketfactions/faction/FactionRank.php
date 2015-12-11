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

class FactionRank extends FactionAccess{
	const FOUNDER_RANK_ID = 0;
	const FOUNDER_RANK_SUPERIORITY = PHP_INT_MAX;

	/** @var int */
	private $id;
	/** @var string */
	private $name;
	/** @var int */
	private $superiority;

	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	/**
	 * Returns the superiority of the rank.
	 *
	 * @return int
	 */
	public function isSuperiority(){
		return $this->superiority;
	}

	public static function defaultRanks(PocketFactions $main, &$defaultRank){
		$config = $main->getPFConfig();

	}
}
