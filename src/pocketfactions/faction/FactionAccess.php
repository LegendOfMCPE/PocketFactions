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

class FactionAccess{
	private $primaryAccess;
	private $secondaryAccess;
	private $tertiaryAccess;

	/**
	 * Checks if accessors of this FactionAccess have the primary access named <code>$flag</code>.<br>
	 * If <code>$full</code> is true, <code>true</code> is only returned when all bits of <code>$flag</code>
	 * are enabled. If <code>$full</code> is false, <code>true</code> is returned when any of the bits
	 * of <code>$flag</code> is enabled.
	 *
	 * @param int       $flag
	 * @param bool|true $full
	 * @param int       $and
	 *
	 * @return bool
	 */
	public function isPrimaryFlagEnabled($flag, $full = true, &$and = 0){
		$and = $flag & $this->primaryAccess;
		return $full ? $and === $flag : (bool) $and;
	}
	/**
	 * Enables/disables the bits set in <code>$flag</code>.
	 *
	 * @param int  $flag
	 * @param bool $boolean
	 */
	public function setPrimaryFlag($flag, $boolean){
		if($boolean){
			$this->primaryAccess |= $flag;
		}else{
			$this->primaryAccess &= ~$flag;
		}
	}

	/**
	 * Checks if accessors of this FactionAccess have the secondary access named <code>$flag</code>.<br>
	 * If <code>$full</code> is true, <code>true</code> is only returned when all bits of <code>$flag</code>
	 * are enabled. If <code>$full</code> is false, <code>true</code> is returned when any of the bits
	 * of <code>$flag</code> is enabled.
	 *
	 * @param int       $flag
	 * @param bool|true $full
	 * @param int       $and
	 *
	 * @return bool
	 */
	public function isSecondaryFlagEnabled($flag, $full = true, &$and = 0){
		$and = $flag & $this->secondaryAccess;
		return $full ? $and === $flag : (bool) $and;
	}
	/**
	 * Enables/disables the bits set in <code>$flag</code>.
	 *
	 * @param int  $flag
	 * @param bool $boolean
	 */
	public function setSecondaryFlag($flag, $boolean){
		if($boolean){
			$this->secondaryAccess |= $flag;
		}else{
			$this->secondaryAccess &= ~$flag;
		}
	}

	/**
	 * Checks if accessors of this FactionAccess have the tertiary access named <code>$flag</code>.<br>
	 * If <code>$full</code> is true (default), <code>true</code> is only returned when all bits of <code>$flag</code>
	 * are enabled. If <code>$full</code> is false, <code>true</code> is returned when any of the bits
	 * of <code>$flag</code> is enabled.
	 *
	 * @param int       $flag
	 * @param bool|true $full
	 * @param int       $and
	 *
	 * @return bool
	 */
	public function isTertiaryFlagEnabled($flag, $full = true, &$and = 0){
		$and = $flag & $this->tertiaryAccess;
		return $full ? $and === $flag : (bool) $and;
	}
	/**
	 * Enables/disables the bits set in <code>$flag</code>.
	 *
	 * @param int  $flag
	 * @param bool $boolean
	 */
	public function setTertiaryFlag($flag, $boolean){
		if($boolean){
			$this->tertiaryAccess |= $flag;
		}else{
			$this->tertiaryAccess &= ~$flag;
		}
	}
}
