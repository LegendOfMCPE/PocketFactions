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

/**
 * Secondary access to the faction, including economic access and diplomatic access.
 */
class FactionAccessSecondary{
//	@formatter:off
	/**
	 * Allows the accessor to claim chunks (if claiming chunks costs a price, spend_money is required too)
	 */
	const CLAIM_CHUNKS          = 0x00000001;
	/**
	 * Allows the accessor to do actions that cost money
	 */
	const SPEND_MONEY           = 0x0000FFF0;
	/**
	 * Allows the accessor to donate money into the faction bank
	 */
	const DONATE_MONEY          = 0x00010000;
	/**
	 * Allows the accessor to do diplomatic actions on behalf of the faction, including chunk sieges
	 */
	const DIPLOMACY             = 0xFF000000;
	/**
	 * Allows the accessor to improve the relations of the faction with other factions
	 * E.g. warring -> hostile, hostile -> none, none -> ally, truce -> partner, warring -> truce, etc.
	 */
	const DIPLOMACY_IMPROVE_REL = 0x01000000;
	/**
	 * Allows the accessor to worsen the relations of the faction with other factions
	 * E.g. hostile -> warring, none -> hostile, ally -> none, partner -> truce, truce -> warring, etc.
	 */
	const DIPLOMACY_WORSEN_REL  = 0x02000000;
	/**
	 * Allows the accessor to carry out chunk sieges
	 */
	const SIEGE_CHUNK           = 0x04000000;
//	@formatter:on
}
