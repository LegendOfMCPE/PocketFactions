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

use pocketmine\Player;

interface FactionsDataProvider{
	/**
	 * Call the <code>$callback</code> parameter with one parameter: the {@link Faction} of the given name, or
	 * <code>null</code> if there is no such faction.
	 *
	 * @param string   $name
	 * @param callable $callback
	 */
	public function getFaction($name, callable $callback);

	/**
	 * Call the <code>$callback</code> parameter with one parameter: the {@link Faction} of the given <code>$id</code>,
	 * or <code>null</code> if there is no such faction.
	 *
	 * @param int      $id
	 * @param callable $callback
	 *
	 * @return
	 */
	public function getFactionById($id, callable $callback);

	/**
	 * Call the <code>$callback</code> parameter with one parameter: the {@link Faction} of the given {@link Player},
	 * or <code>null</code> if the player is not in a faction or the player isn't registered yet.
	 *
	 * @param Player   $player
	 * @param callable $callback
	 *
	 * @return
	 */
	public function getFactionForPlayer(Player $player, callable $callback);

	/**
	 * Finalizes the database, if necessary.
	 */
	public function close();
}
