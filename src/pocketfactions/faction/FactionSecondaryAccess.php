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
class FactionSecondaryAccess{
//	@formatter:off
	const CLAIM_CHUNKS          = 0x00000001;
	const SPEND_MONEY           = 0x0000FFF0;
	const DONATE_MONEY          = 0x00010000;
	const DIPLOMACY             = 0xFF000000;
	const DIPLOMACY_IMPROVE_REL = 0x01000000;
	const DIPLOMACY_WORSEN_REL  = 0x02000000;
	const SIEGE_CHUNK           = 0x04000000;
//	@formatter:on
}
