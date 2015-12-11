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
	 * Allows the accessor to kick a member (of lower or same superiority) out of the faction
	 */
	const KICK_MEMBER       = 0x00000010;
	/**
	 * Allows the accessor to promote a member of a rank of lower superiority to a rank of superiority lower or same as the accessor
	 */
	const PROMOTE_MEMBER    = 0x00000020;
	/**
	 * Allows the accessor to demote a member of same or lower superiority
	 */
	const DEMOTE_MEMBER     = 0x00000040;
	/**
	 * A faction member must have this access to have a chance to inherit the founder rank
	 * A new founder will be chosen among the successors after the founder has not been online for a period of time (decided by server admin)
	 * The way of choosing depends on the `/f success` settings.
	 * If no faction members are successors, the faction will either be automatically disbanded or a successor will be chosen by server admin
	 */
	const SUCCESSOR         = 0x00000080;
//	@formatter:on
}
