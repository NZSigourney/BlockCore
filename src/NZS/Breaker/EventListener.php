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
        $lava = Item::get(327,0,1);
        $water = Item::get(326,0,1);
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
            $this->getPlugin()->createData($player);
        }
        /**$this->plugin->point->set($player->getName(), 0);
        $this->plugin->point->save();*/
        //$this->getPlugin()->taodiem($player);
        //Server::getInstance()->getLogger()->critical(Self::getInstance()->getMotd() . "§b Added Point (".$this->plugin->point[$player->getName()]." to Point.yml success");
    }

    public function onChat(PlayerChatEvent $ev){
        $p = $ev->getPlayer();
        $m = $ev->getMessage();
        $motd = $this->getPlugin()->getExp($p);
        if($m == "xemdiem"){
            //$mess = str_replace("xemdiem", "******", $m);
            //$p->chat($mess);
            $p->sendMessage("§l§f[§aBlock§cScore§f]§r §aYour EXP: §b". $motd ." §f/§a Level:§c ". $this->getPlugin()->getLVPlayer($p));
            //return $m;
        }

        if($m == "lencap"){
            //$mess = str_replace("lencap", "******", $m);
            $getExp = $this->getPlugin()->getExp($p);
            $getLv = $this->getPlugin()->getLVPlayer($p);
            $max = 10;
            $nextLv = $getLv + 1;
            //$p->chat($mess);
            $p->sendMessage("§l§f[§aBlock§cScore§f]§r §aYour EXP: §b". $motd ."§f/§a Level:§c " . $getLv);
            if($getExp >= 100){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 200){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 300){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 400){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 500){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 600){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 700){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 800){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp >= 900){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");
            }elseif($getExp = 1000){
                $this->getPlugin()->addLevel($p);
                $p->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c10§a, Next Level:§b ".$nextLv."§a!");
                $p->sendPopup("§l§aPresent Level: §b".$getLv."§a/§c".$max."§a!");                
            }elseif($getExp > 1000){
                $this->getPlugin()->point["EXP"][strtolower($player->getName())] = 0;
                $this->getPlugin()->level["LEVEL"][strtolower($player->getName())] = 0;
            }else{
                $p->sendMessage("§c Không đủ EXP!");
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
            $exp = $this->getPlugin()->getExp($p);
            //$getBC = $this->getPlugin()->getCoin($p);
            if($p->getInventory()->getItemInHand()->getId() == $PADiamond){
                //if($block->getId() == 56 || $block->getId() == 129) {
                switch($block->getId()){
                    case 56:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 129:
                        $this->getPlugin()->addExp($p);
                        //$this->getPlugin()->addCoin($p, mt_rand(1,5)*2);
                        //$p->sendPopup("§l§c §b+ ". $getBC);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);
                        //$this->getPlugin()->addCoin($p, mt_rand(1, 5)*2);
                        ///$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 15:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 75:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 14:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 21:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 16:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 73:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                }
            }elseif($p->getInventory()->getItemInHand()->getId() == $PAGold || $p->getInventory()->getItemInHand()->getId() == $PAIron || $p->getInventory()->getItemInHand()->getId() == $PAStone || $p->getInventory()->getItemInHand()->getId() == $PAWooden)
            {
                switch($block->getId()){
                    case 56:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 2)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 129:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§a Added§b " . mt_rand(1, 2)*2 . "§c " . Item::get(175,0,1)->getName() . "§a To your Inventory!");
                        break;
                    case 15:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 75:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                       
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 14:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 21:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 16:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                    case 73:
                        $this->getPlugin()->addExp($p);
                        $p->sendMessage("§l§f[" . Server::getInstance()->getMotd() . "§f]§b§r§b+1 §aEXP §f-§a Total Exp: §c" . $exp);                        
                        //$p->sendPopup("§l§f[" . Server::getInstance()->getMotd() . "§f]§r§a Added§b " . mt_rand(1, 5)*2 . "§cBCoin §a To your Vault!");
                        break;
                }
            }
        }
    }
}