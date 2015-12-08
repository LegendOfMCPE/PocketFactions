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

namespace pocketfactions\provider\factions\mysql;

class QueryResult{
	public $src;
	public $error;
	public $rows;
	public $insertId;
	public function __construct(QueryRequest $src){
		$this->src = $src;
	}
}
