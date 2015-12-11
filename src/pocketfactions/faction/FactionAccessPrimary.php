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
 * Primary access to the faction, including world editing and PvP.
 */
class FactionAccessPrimary{
//	@formatter:off
	/**
	 * Allows the accessor to do actions that can update blocks in the faction's chunks
	 */
	const WORLD_EDITING                     = 0x0000FFFF;
	/**
	 * Allows the accessor to break any blocks in the faction's chunks
	 */
	const BLOCK_BREAKING                    = 0x0000000F;
	/**
	 * Allows the accessor to place any blocks in the faction's chunks
	 */
	const BLOCK_PLACEMENT                   = 0x000000F8;
	/**
	 * Allows the accessor to place normal blocks in the faction's chunks
	 */
	const BLOCK_PLACEMENT_GENERIC           = 0x00000010;
	/**
	 * Allows the accessor to place any liquid blocks in the faction's chunks
	 */
	const BLOCK_PLACEMENT_FLUID             = 0x00000060;
	/**
	 * Allows the accessor to place lava in the faction's chunks
	 */
	const BLOCK_PLACEMENT_LAVA              = 0x00000020;
	/**
	 * Allows the accessor to place water blocks in the faction's chunks
	 */
	const BLOCK_PLACEMENT_WATER             = 0x00000040;
	/**
	 * Allows the accessor to place TNT blocks in the faction's chunks
	 */
	const BLOCK_PLACEMENT_TNT               = 0x00000080;
	/**
	 * Allows the accessor to place redstone components in the faction's chunks
	 */
	const BLOCK_PLACEMENT_REDSTONE          = 0x00000008;
	/**
	 * Allows the accessor to activate any blocks in the faction's chunks (including using flint and steel on its blocks)
	 */
	const BLOCK_ACTIVATION                  = 0x0000FF00;
	/**
	 * Allows the accessor to activate redstone components (excluding TNT) in the faction's chunks
	 */
	const BLOCK_ACTIVATION_REDSTONE         = 0x00000100;
	/**
	 * Allows the accessor to activate TNT blocks in the faction's chunks
	 */
	const BLOCK_ACTIVATION_TNT              = 0x00000200;
	/**
	 * Allows the accessor to use flint and steel in the faction's chunks
	 */
	const BLOCK_ACTIVATION_FIRE             = 0x00000400;
	/**
	 * Allows the accessor to open doors and trapdoors in the faction's chunks
	 */
	const BLOCK_ACTIVATION_DOOR             = 0x00001800;
	/**
	 * Allows the accessor to open (vertical) doors in the faction's chunks
	 */
	const BLOCK_ACTIVATION_VERTICAL_DOOR    = 0x00000800;
	/**
	 * Allows the accessor to open trapdoors in the faction's chunks
	 */
	const BLOCK_ACTIVATION_TRAPDOOR         = 0x00001000;
	/**
	 * Allows the accessor to open containers in the faction's chunks
	 */
	const BLOCK_ACTIVATION_CONTAINER        = 0x00006000;
	/**
	 * Allows the accessor to open chests in the faction's chunks
	 */
	const BLOCK_ACTIVATION_CHEST            = 0x00002000;
	/**
	 * Allows the accessor to open furnace in the faction's chunks
	 */
	const BLOCK_ACTIVATION_FURNACE          = 0x00004000;
	/**
	 * Allows the accessor to use beds in the faction's chunks
	 */
	const BLOCK_ACTIVATION_BED              = 0x00008000;

	/**
	 * Protects the accessor from being hurt by players who are not in warring (and hostile, depending on server admins) factions
	 */
	const INVULNERABLE                      = 0x00010000;

	/**
	 * Allows the accessor to claim any kits.
	 * Claiming is still rate-limited by server admins
	 */
	const CLAIM_KITS                        = 0xFF000000;

	/**
	 * Allows the accessor to claim kit 1.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_1                       = 0x01000000;
	/**
	 * Allows the accessor to claim kit 2.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_2                       = 0x02000000;
	/**
	 * Allows the accessor to claim kit 3.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_3                       = 0x04000000;
	/**
	 * Allows the accessor to claim kit 4.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_4                       = 0x08000000;
	/**
	 * Allows the accessor to claim kit 5.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_5                       = 0x10000000;
	/**
	 * Allows the accessor to claim kit 6.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_6                       = 0x20000000;
	/**
	 * Allows the accessor to claim kit 7.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_7                       = 0x40000000;
	/**
	 * Allows the accessor to claim kit 8.
	 * This action is still rate-limited by server admins
	 */
	const CLAIM_KIT_8                       = 0x80000000;
//	@formatter:on
}
