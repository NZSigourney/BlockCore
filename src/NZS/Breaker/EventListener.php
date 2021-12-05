<?php

/** EventListener Version 2
 * Remake by NZS
 */

namespace NZS\Breaker;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
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
        $pickaxe = Item::get(274,0,1);
        $pickaxe->setCustomName("§l§bDynasty's §cLava§a Pickaxe");
        $pickaxe->setLore(array("§l§bDynasty's §cLava§aIslands\n§c•§r §aStart up Pickaxe =))"));
        $lava = Item::get(11,0,1);
        $water = Item::get(10,0,1);
        $axe = Item::get(275,0,1);
        $axe->setCustomName("§l§bDynasty's §cLava§a Axe");
        $axe->setLore(array("§l§bDynasty's §cLava§aIslands\n§c•§r §aStart up Axe =))"));
        $inv = $player->getInventory();
        if($player->HasPlayedBefore() == true){   
            // Write when Player already played
        }else{
            $this->getPlugin()->createData($player);
            $inv->addItem($pickaxe);
            $inv->addItem($lava);
            $inv->addItem($water);
            $inv->addItem($axe);
        }
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
                //if($block->getId() == 56 || $block->getId() == 129) {
                switch($block->getId()){
                    case 56:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 129:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 15:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 75:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 14:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 21:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 16:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 73:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 5)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                }
            }elseif($p->getInventory()->getItemInHand()->getId() == $PAGold || $p->getInventory()->getItemInHand()->getId() == $PAIron || $p->getInventory()->getItemInHand()->getId() == $PAStone || $p->getInventory()->getItemInHand()->getId() == $PAWooden)
            {
                switch($block->getId()){
                    case 56:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 2)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 129:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 2)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 15:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 75:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 14:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 21:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 16:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 73:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b " . $this->getPlugin()->getExp($p) . " §ais Currently EXP!");
                        $drops = array();
                        $drops[] = Item::get(175, 0, mt_rand(1, 2)*2);
                        $ev->setDrops($drops);
                        $p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 5)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                }
            }
        }
    }
}