<?php

namespace NZS\Breaker\Commands;

use http\Exception\InvalidArgumentException;
use NZS\Breaker\Main;
use pocketmine\command\{CommandSender, ConsoleCommandSender, Command};
use pocketmine\{Player, Server};
use pocketmine\plugin\Plugin;

class lencap extends Command
{
    public $plugin;
    private static $instance = null;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        parent::__construct("lvup");
        $this->setDescription("Leve Up for BlockCore");
    }

    public static function getInstance(){
        return self::$instance();
    }

    public function getMain(): Main
    {
        return $this->plugin;
    }

    public function execute(CommandSender $player, string $dh, array $args)
    {
        if(!($player instanceof Player)){
            Server::getInstance()->getLogger()->critical("USE IN-GAME!");
            return;
        }
        $getExp = $this->getMain()->getExp($player);
        $getLv = $this->getMain()->getLVPlayer($player);
        //$max = 3200;    
        $nextLv = $getLv + 1;
        //$oldLv = $getLevel - 1;
        $max = [50, 200, 300, 400, 500, 750, 900, 1200, 1500, 3200];
        if($getExp == null || $getLv == null){
            if(!$player->isOp()){
                $player->sendMessage("Null!");
                return true;
            }else{
                throw new InvalidArgumentException("Must be string|array!");
            }
        }
        switch($getLv){
            case 1:
                $max = 50;
                $dh = "Anh Hùng";
                break;
            case 2:
                $max = 200;
                $dh = "Hào Trưởng";
                break;
            case 3:
                $max = 300;
                $dh = "Trấn Quân";
                break;
            case 4:
                $max = 400;
                $dh = "Thiên Hộ";
                break;
            case 5:
                $max = 500;
                $dh = "Châu Mục";
                break;
            case 6:
                $max = 750;
                $dh = "Phủ Doãn";
                break;
            case 7:
                $max = 900;
                $dh = "Tổng Binh";
                break;
            case 8:
                $max = 1200;
                $dh = "Chỉ Huy Sứ";
                break;
            case 9:
                $max = 1500;
                $dh = "Hoàng Đế";
                break;
            case 10:
                $max = 3200;
                $dh = "Thái Thượng Hoàng";
                break;
            default:
                $dh = "Hào Kiệt";
                break;
        }

        if($getExp <= 0){
            $player->sendMessage("§c Không đủ EXP!");
            return false;
        }else{
            if($getExp >= 50){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 200){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 300){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 400){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 500){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 750){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 900){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 1200){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp >= 1500){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp = 3200){
                $this->getMain()->resetExp($player);
                $this->getMain()->addLevel($player);
                $player->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$player->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($player, $dh);
            }elseif($getExp > 3200){
                $player->sendMessage("§aMax Level!");
                $this->getMain()->resetExp($player);
            }  
            return true;                 
        }        
    }
}