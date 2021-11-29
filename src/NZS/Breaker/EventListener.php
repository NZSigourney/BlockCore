<?php


namespace NZS\Breaker;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\level\Level;
use pocketmine\item\Item;
use NZS\Breaker\Main;

class EventListener implements Listener
{
    public $plugin;
    private static $instance = null;

    public static function getInstance(){
		return self::$instance;
	}

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function getPlugin(){
        return $this->plugin;
    }

    public function onJoin(PlayerJoinEvent $ev){
        $player = $ev->getPlayer();
        $this->getPlugin()->createData($player);
        /**$this->plugin->point->set($player->getName(), 0);
        $this->plugin->point->save();*/
        //$this->getPlugin()->taodiem($player);
        //Server::getInstance()->getLogger()->critical(Self::getInstance()->getMotd() . "§b Added Point (".$this->plugin->point[$player->getName()]." to Point.yml success");
    }

    public function onBlockSet(BlockBreakEvent $event){
        
    }

    public function onChat(PlayerChatEvent $ev){
        $p = $ev->getPlayer();
        $m = $ev->getMessage();
        $motd = $this->getPlugin()->getExp($p);
        if($m == "xemdiem"){
            $mess = str_replace("xemdiem", "******", $m);
            $p->chat($mess);
            $p->sendMessage("§l§f[§aBlock§cScore§f] §bYour Score: §e". $motd);
            //return $m;
        }else{
            return $m;
        }

        if($m == "lencap"){
            $mess = str_replace("lencap", "******", $m);
            $max = 100;
            $getExp = $this->getPlugin()->point[$p->getName()];
            $getLv = $this->getPlugin()->level[$p->getName()];
            //$getExp = $this->getPlugin()->getExp($p);
            //$getLv = $this->getPlugin()->getLevel($p);
            $nextLv = $getLv + 1;
            $p->chat($mess);
            $p->sendMessage("§l§f[ ".self::getInstance()->getMotd()."§f] §bYour Score: §e". $motd);
            if($getExp != 10){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c100!");
            }elseif($getExp < 10){
                $p->sendMessage("§l§cDo not enough EXP for next Level! §f(§b".$nextLv."§f)");               
            }
        }
    }

    public function onBreak(BlockBreakEvent $ev){
        $p = $ev->getPlayer();
        $player = $ev->getPlayer();
        $block = $ev->getBlock();
        $PADiamond = 278;
        $PAGold = 285;
        $PAIron = 257;
        $PAStone = 274;
        $PAWooden = 270;

        $world = "ai";
        $level = $p->getLevel()->getName();
        if($level == $world){
            $p->getLevel()->setTime(0);
            if($p->getInventory()->getItemInHand()->getId() == $PADiamond){

            if($block->getId() == 56 || $block->getId() == 129) {
                switch (mt_rand(1, 15)) {
                    case 1:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 2:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 8);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 3:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 4);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 4:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 6);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 5:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 5);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 6:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 7);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 7:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 8);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                    case 8:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b " . $this->getPlugin()->seePoint($player) . " §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, 9);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . rand(1, 5) . "§c " . Item::get(175)->getName() . "§a To your Inventory!");
                        break;
                }
            }elseif($block->getId() == 15 || $block->getId() == 75 || $block->getId() == 14 || $block->getId() == 21 || $block->getId() == 16 || $block->getId() == 73)
            {
                switch(mt_rand(1, 3)){
                    case 1:
                        $this->getPlugin()->addPoint($p, 1);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 1);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 2:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 3:
                        $this->getPlugin()->addPoint($p, );
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 4);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 4:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 6);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 5:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 5);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    }
                }
            }
            if($p->getInventory()->getItemInHand()->getId() == $PAGold || $p->getInventory()->getItemInHand()->getId() == $PAIron || $p->getInventory()->getItemInHand()->getId() == $PAStone || $p->getInventory()->getItemInHand()->getId() == $PAWooden)
            {
                if($block->getId() == 56 || $block->getId() == 129)
                {
                    switch(mt_rand(1, 12)){
                    case 1:
                        $this->getPlugin()->addPoint($p, 1);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 1);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 2:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 3:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 4);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 4:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 6);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 5:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 5);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 6:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 7);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    }
                }elseif($block->getId() == 15 || $block->getId() == 75 || $block->getId() == 14 || $block->getId() == 21 || $block->getId() == 16 || $block->getId() == 73)
                {
                    switch(mt_rand(1, 3)){
                        case 1:
                        $this->getPlugin()->addPoint($p, 1);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 1);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                        case 2:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 3:
                        $this->getPlugin()->addPoint($p, );
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 4);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 4:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 6);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    case 5:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
                        $drops = array();
                        $drops[] = Item::get(175,0, 5);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
                        break;
                    }
                }
            }
        }else{
            $p->sendMessage("Qua LAVA mà đào đi đũy ngựa!");
        }

        
        
        # Random Ore

        /**$block = $event->getBlock();
        $water = false;
        $lava = false;
        for ($i = 2; $i <= 5; $i++) {
            $nearBlock = $block->getSide($i);
            if ($nearBlock instanceof Water) {
                $water = true;
            } else if ($nearBlock instanceof Lava || $nearBlock instanceof Fence) {
                $lava = true;
            }
            if ($water && $lava) {
                $id = mt_rand(1, 65);
                switch ($id) {
                    case 2;
                        $newBlock = new Iron();
                        break;
                    case 4;
                        $newBlock = new Gold();
                        break;
                    case 6;
                        $newBlock = new Emerald();
                        break;
                    case 8;
                        $newBlock = new Coal();
                        break;
                    case 10;
                        $newBlock = new Redstone();
                        break;
                    case 12;
                        $newBlock = new Diamond();
                        break;
					case 14;
                        $newBlock = new Lapis();
                        break;	
						case 16;
                        $newBlock = new Block(15);
                        break;	
						case 19;
                        $newBlock = new Block(21);
					
                        break;	
						case 21;
                        $newBlock = new Block(14);
                        break;	
							case 27;
                        $newBlock = new Block(15);
                        break;	
							case 29;
                        $newBlock = new Block(56);
                        break;
                        case 25;
                        $newBlock = new Block(73);
                        break;	
							case 28;
                        $newBlock = new Block(129);
                        break;	
							case 32;
                        $newBlock = new Block(153);
                        break;	
                    default:
                        $newBlock = new Cobblestone();
                }
                $block->getLevel()->setBlock($block, $newBlock, true, false);
                return;
            }
        }

        /**if($block->getId() == 16 || $block->getId() == 73)
        {
            $this->getPlugin()->addPoint($p, mt_rand(1, 10));
            $p->sendMessage("§l§f[".Server::getInstance()->getMotd()."§f]§b ".$this->getPlugin()->seePoint($player)." §aAdded to your Vault!");
            $drops = array();
            $drops[] = Item::get(175,0, rand(1,5));
            /**switch(mt_rand(1,10)){
                case < 30:
                    // 25 Percent
                break;
            }
            $ev->setDrops($drops);
            $p->sendPopup("§l§f[".Server::getInstance()->getMotd()."§f]§a Added§b ".rand(1,5)."§c ".Item::get(175)->getName()."§a To your Inventory!");
        }*/
    }
}
