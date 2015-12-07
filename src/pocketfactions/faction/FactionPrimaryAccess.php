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
 * Primary access to the repo, including world editing and PvP.
 */
class FactionPrimaryAccess{
//	@formatter:off
	const WORLD_EDITING                     = 0x0000FFFF;
	const BLOCK_BREAKING                    = 0x0000000F;
	const BLOCK_PLACEMENT                   = 0x000000F0;
	const BLOCK_PLACEMENT_GENERIC           = 0x00000010;
	const BLOCK_PLACEMENT_FLUID             = 0x00000060;
	const BLOCK_PLACEMENT_LAVA              = 0x00000020;
	const BLOCK_PLACEMENT_WATER             = 0x00000040;
	const BLOCK_PLACEMENT_TNT               = 0x00000080;
	const BLOCK_ACTIVATION                  = 0x0000FF00;
	const BLOCK_ACTIVATION_REDSTONE         = 0x00000100;
	const BLOCK_ACTIVATION_TNT              = 0x00000200;
	const BLOCK_ACTIVATION_FIRE             = 0x00000400;
	const BLOCK_ACTIVATION_DOOR             = 0x00001800;
	const BLOCK_ACTIVATION_VERTICAL_DOOR    = 0x00000800;
	const BLOCK_ACTIVATION_TRAPDOOR         = 0x00001000;
	const BLOCK_ACTIVATION_CONTAINER        = 0x00006000;
	const BLOCK_ACTIVATION_CHEST            = 0x00002000;
	const BLOCK_ACTIVATION_FURNACE          = 0x00004000;
	const BLOCK_ACTIVATION_BED              = 0x00008000;
//	@formatter:on
}
