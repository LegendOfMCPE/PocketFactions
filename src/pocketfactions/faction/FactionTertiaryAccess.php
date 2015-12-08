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
 * Tertiary access to the faction, namely administrative and executive permissions.
 */
class FactionTertiaryAccess{
//	formatter:off
	const INVITATIONS       = 0x00000003;
	const ACCEPT_INVITATION = 0x00000001;
	const SEND_INVITATION   = 0x00000002;
	const KICK_MEMBER       = 0x00000010;
	const PROMOTE_MEMBER    = 0x00000020;
	const DEMOTE_MEMBER     = 0x00000040;
//	formatter:on
}
