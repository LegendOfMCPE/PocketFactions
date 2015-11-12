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

namespace pocketfactions\provider\factions;

use pocketfactions\faction\Faction;
use pocketmine\Player;

interface FactionsDataProvider{
	/**
	 * Call the <code>$callback</code> parameter with one parameter: the {@link Faction} of the given name.
	 *
	 * @param string $name
	 * @param callable $callback
	 */
	public function getFaction($name, callable $callback);
	/**
	 * Call the <code>$callback</code> parameter with one parameter: the {@link Faction} of the given <code>$id</code>.
	 *
	 * @param int $id
	 */
	public function getFactionById($id);
	/**
	 * Call the <code>$callback</code> parameter with one parameter: the {@link Faction} of the given {@link Player}.
	 *
	 * @param Player $player
	 * @return Faction|null
	 */
	public function getFactionForPlayer(Player $player);

	/**
	 * Finalizes the database, if necessary.
	 */
	public function close();
}
