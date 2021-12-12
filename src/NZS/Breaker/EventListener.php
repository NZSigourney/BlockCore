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
        $water = Item::get(8,0,1);
        $axe = Item::get(275,0,1);
        $axe->setCustomName("§l§bDynasty's §cLava§a Axe");
        $axe->setLore(array("§l§bDynasty's §cLava§aIslands\n§c•§r §aStart up Axe =))"));
        $inv = $player->getInventory();
        if($player->HasPlayedBefore() == true){   
            // Write when Player already played
            Server::getInstance()->getLogger()->notice("§b Player ".$player->getName()." already played before!");
        }else{
            $inv->addItem($pickaxe);
            $inv->addItem($lava);
            $inv->addItem($water);
            $inv->addItem($axe);
        }
        $this->getPlugin()->createData($player);
    }

    /**public function onChat(PlayerChatEvent $ev){
        $p = $ev->getPlayer();
        $m = $ev->getMessage();
        $motd = $this->getPlugin()->getExp($p);
        if($m == "xemdiem"){
            $p->sendMessage("§l§f[§aBlock§cScore§f]§r §aYour EXP: §b". $motd ." §f/§a Level:§c ". $this->getPlugin()->getLVPlayer($p));
        }        
    }*/

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
            $exp = $this->getPlugin()->getExp($p);
            //$getBC = $this->getPlugin()->getCoin($p);
            if($p->getInventory()->getItemInHand()->getId() == $PADiamond){
                //if($block->getId() == 56 || $block->getId() == 129) {
                switch($block->getId()){
                    case 56:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 129:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 15:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 75:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 14:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 21:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 16:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 73:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                }
            }elseif($p->getInventory()->getItemInHand()->getId() == $PAGold || $p->getInventory()->getItemInHand()->getId() == $PAIron || $p->getInventory()->getItemInHand()->getId() == $PAStone || $p->getInventory()->getItemInHand()->getId() == $PAWooden)
            {
                switch($block->getId()){
                    case 56:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 129:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 15:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 75:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 14:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 21:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 16:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                    case 73:
                        $this->getPlugin()->addExp($p, mt_rand(1,10));
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f] §b§r§b+".mt_rand(1,10)." §aEXP §f-§a Total Exp: §c" . $exp);
                        break;
                }
            }
        }else{
            $ev->setCancelled(true);
        }
    }
}