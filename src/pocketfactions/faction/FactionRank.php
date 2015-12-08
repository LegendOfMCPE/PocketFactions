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

	/** @var int */
	private $id;
	/** @var string */
	private $name;
	/** @var bool */
	private $superior;

	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	/**
	 *Returns whether this is a <i>superior</i> rank, i.e. members of this rank can only be kicked, demoted or promoted by the founder.
	 *
	 * @return bool
	 */
	public function isSuperior(){
		return $this->superior;
	}

	public static function defaultDefaultRank(PocketFactions $main){
		$config = $main->getPFConfig();
	}
}
