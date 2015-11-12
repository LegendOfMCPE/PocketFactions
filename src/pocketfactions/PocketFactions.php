<?php

namespace pocketfactions;

use pocketmine\plugin\PluginBase;

class PocketFactions extends PluginBase{
	public function onEnable(){
		$this->saveDefaultConfig();
		// now let's start fresh!
	}
}
