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

use pocketfactions\utils\ModelledEnum;

class FactionRelation extends ModelledEnum{
	// Think about this - China and USA are commercial partners, but they are apparently not in alliance.
	// As for truce, it simply means "no warfare", which isn't very well.
	// Hostile only means that they are not friendly with each other, but warring means direct conflict.
	const ALLY = 19;
	const PARTNER = 18;
	const TRUCE = 17;
	const NIL = 16;
	const HOSTILE = 15;
	const WARRING = 14;

	public static function init(){
		self::addEnumEntry(new FactionRelation(self::ALLY, "ally"));
		self::addEnumEntry(new FactionRelation(self::PARTNER, "partner"));
		self::addEnumEntry(new FactionRelation(self::TRUCE, "truce"));
		self::addEnumEntry(new FactionRelation(self::NIL, "neutral"));
		self::addEnumEntry(new FactionRelation(self::HOSTILE, "hostile"));
		self::addEnumEntry(new FactionRelation(self::WARRING, "warring"));
	}

	protected function __construct($id, $name){
		parent::__construct($id, $name);
	}
}
