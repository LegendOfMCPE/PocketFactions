<?php

namespace pocketfactions;

use legendofmcpe\statscore\PlayerRequestable;
use legendofmcpe\statscore\StatsCore;
use pocketfactions\faction\Chunk;
use pocketfactions\faction\Rank;
use pocketfactions\faction\Faction;
use pocketfactions\utils\FactionInviteRequest;
use pocketfactions\utils\PluginCmd as PCmd;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender as Issuer;
use pocketmine\Player;
use pocketmine\Server;

class CmdHandler implements CommandExecutor{
	public function __construct(Main $main){
		$this->config = $main->getCleanSaveConfig();
		$this->main = $main;
		$this->server = Server::getInstance();
	}
	public function onCommand(Issuer $issuer, Command $cmd, $lbl, array $args){
		switch(strtolower($cmd->getName())){
			case "faction":
				switch(""){ // manage subcommand
					case "unclaim":
						$f = $this->main->getFList()->getFaction($issuer);
						if($f === null){
							return PCmd::DB_LOADING;
						}
						if($f === false){
							return PCmd::NO_FACTION;
						}
						if(!$f->getMemberRank($issuer->getName())->hasPerm(Rank::P_UNCLAIM)){
							return PCmd::NO_PERM;
						}
						// TODO unclaim chunk
						break;
					case "unclaimall":
						$f = $this->main->getFList()->getFaction($issuer);
						if($f === null){
							return PCmd::DB_LOADING;
						}
						if($f === false){
							return PCmd::NO_FACTION;
						}
						if(!$f->getMemberRank($issuer->getName())->hasPerm(Rank::P_UNCLAIM_ALL)){
							return PCmd::NO_PERM;
						}
						// TODO unclaim all chunks except base chunk
						break;
					case "kick":
						if(count($args) != 1){
							return "Usage: \n/f kick <target-player>";
						}
						$targetp = $this->server->getOfflinePlayer(array_shift($args));
						if(!$targetp instanceof Player){
							return PCmd::INVALID_PLAYER;
						}
						$faction = $this->main->getFList()->getFaction($issuer);
						if($faction === null){
							return PCmd::DB_LOADING;
						}
						if($faction === false){
							return PCmd::NO_FACTION;
						}
						if(!$faction->getMemberRank($issuer->getName())->hasPerm(Rank::P_KICK_PLAYER)){
							return PCmd::NO_PERM;
						}
						$targetp->sendMessage("You have been kicked from $faction by " . $issuer->getDisplayName() . "!");
						// TODO
						break;
					case "perm":
						$sub = array_shift($args);
						switch($sub){
							case "add":
								break;
							case "remove":
								break;
							case "setplayer":
								break;
							default:
								break;
						}
						break;
					case "sethome":
						break;
					case "setopen":
						$bool = strtolower(array_shift($args));
						if($bool === "true" or $bool === "open" or $bool === "on"){
							$bool = true;
						}
						if($bool === "false" or $bool === "close" or $bool === "closed" or $bool === "not-open" or $bool === "notopen" or $bool === "off"){
							$bool = false;
						}
						if(!is_bool($bool)){
							return false;
						}
						$faction = $this->main->getFList()->getFaction($issuer);
						if($faction === null){
							return PCmd::DB_LOADING;
						}
						if($faction === false){
							return PCmd::NO_FACTION;
						}
						if(!$faction->getMemberRank($issuer->getName())->hasPerm(Rank::P_SET_WHITE)){
							return PCmd::NO_PERM;
						}
						if($faction->isOpen() === $bool){
							return "[PF] Your faction is already " . ($bool ? "opened":"closed") . "!";
						}
						$faction->setOpen($bool);
						return "[PF] Your faction's open status has been set to " . ($bool ? "opened":"closed") . ".";
					case "money":
						break;
				}
				break;
		}
		return true;
	}
	public function help($page){
		$page = (1 <= $page and $page <= 3) ? $page:1;
		$output = "";
		switch($page){
			case 1:
				$output .= "-=[ Pocket Faction Commands (P.1/3) ]=-\n";
				$output .= "/f create - Create a Faction.\n";
				$output .= "/f invite - Invite someone in your Faction.\n";
				$output .= "/f join - Join public Faction.\n";
				$output .= "/f accept <invitation id>\n";
				$output .= "/f decline <invitation id>\n";
				break;
			case 2:
				$output .= "-=[ Pocket Faction Commands (P.2/3) ]=-\n";
				$output .= "/f claim - Claim areas for your Faction.\n";
				$output .= "/f unclaim - Unclaim areas by your Faction.\n";
				$output .= "/f unclaimall - Unclaim all areas by your Faction.\n";
				$output .= "/f kick - Kick someone in your Faction.\n";
				$output .= "/f perm - Manage permissions in your Faction.\n";
				$output .= "/f sethome - Set Faction home.\n";
				break;
			case 3:
				$output .= "-=[ Pocket Faction Commands (P.3/3) ]=-\n";
				$output .= "/f setopen - Set Faction available to Public.\n";
				$output .= "/f home - Teleport back to Faction home.\n";
				$output .= "/f money - View Faction Money balance.\n";
				$output .= "/f quit - Quit a Faction.\n";
				$output .= "/f disband - Disband your Faction.\n";
				$output .= "/f motto - Set a faction motto.\n";
				break;
		}
		return $output;
	}
}
