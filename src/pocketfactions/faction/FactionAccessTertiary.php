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
class FactionAccessTertiary{
//	@formatter:off
	/**
	 * Allows the accessor to handle invitations
	 */
	const INVITATIONS       = 0x00000003;
	/**
	 * Allows the accessor to accept requests to join the faction
	 */
	const ACCEPT_REQUEST    = 0x00000001;
	/**
	 * Allows the accessor to send an invitation to a player
	 */
	const SEND_INVITATION   = 0x00000002;
	/**
	 * Allows the accessor to kick a member out of the faction
	 */
	const KICK_MEMBER       = 0x00000010;
	/**
	 * Allows the accessor to
	 */
	const PROMOTE_MEMBER    = 0x00000020;
//	@formatter:on
}
