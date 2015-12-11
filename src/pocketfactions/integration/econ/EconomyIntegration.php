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

namespace pocketfactions\integration\econ;

interface EconomyIntegration{
	public function checkPlayerBalance($name, $account);

	public function grantPlayerMoney($name, $account);
	public function takePlayerMoney($name, $account);

	public function prepareFactionAccount($name);
	public function checkFactionBalance($name);

	public function grantFactionCash($name);
	public function grantFactionBank($name);

	public function takeFactionCash($name);
	public function takeFactionBank($name);
}
