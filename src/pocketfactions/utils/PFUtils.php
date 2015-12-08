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

namespace pocketfactions\utils;

class PFUtils{
	public static function validate($boolean, $errMsg = "unexpected false value"){
		if(!$boolean){
			throw new \RuntimeException($errMsg);
		}
	}
	public static function notNull($value, $name = "value"){
		if($value === null){
			throw new \RuntimeException("unexpected null $name");
		}
	}
	public static function identical($bool1, $bool2, $name1 = "first value", $name2 = "second value"){
		if($bool1 !== $bool2){
			throw new \RuntimeException("unexpected: $name1 is not identical to $name2");
		}
	}
}
