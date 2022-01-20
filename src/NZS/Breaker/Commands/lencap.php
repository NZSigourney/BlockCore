<?php

namespace NZS\Breaker\Commands;

use http\Exception\InvalidArgumentException;
use NZS\Breaker\Main;
use pocketmine\command\{CommandSender, Command};
use pocketmine\player\Player;
use pocketmine\Server;
//use pocketmine\plugin\Plugin;

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
        $instance = self::$instance;
        return $instance;
    }

    public function getMain(): Main
    {
        return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!($sender instanceof Player)){
            Server::getInstance()->getLogger()->critical("USE IN-GAME!");
            return true;
        }
        $getExp = $this->getMain()->getExp($sender);
        $getLv = $this->getMain()->getLVPlayer($sender);
        //$max = 3200;    
        $nextLv = $getLv + 1;
        //$oldLv = $getLevel - 1;
        $max = [50, 200, 300, 400, 500, 750, 900, 1200, 1500, 3200];
        /**foreach($sender->getOnlinePlayers() as $online => $onlines){
            // Command
        }*/

        if($getExp == null || $getLv == null){
            if(!$sender->isOp()){
                $sender->sendMessage("Null!");
                return true;
            }else{
                throw new InvalidArgumentException("Must be string|array!, Check Config!");
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
            $sender->sendMessage("§c Không đủ EXP!");
            return false;
        }else{
            if($getExp >= 50){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 200){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 300){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 400){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 500){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 750){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 900){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 1200){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp >= 1500){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp = 3200){
                $this->getMain()->resetExp($sender);
                $this->getMain()->addLevel($sender);
                $sender->sendMessage("§a§lLevel Up!, EXP:§b ".$getExp."§a/§c".$max."§a, Next Level:§b ".$nextLv."§a!");
                Server::getInstance()->broadcastMessage("§l§f[".Server::getInstance()->getMotd()."§f]§r §aThống Lĩnh §e".$sender->getName()."§a Đã thăng cấp Đến §b".$getLv." §f(§a". $dh ."§f)");
                $this->getMain()->danhHieu($sender, array($dh));
            }elseif($getExp > 3200){
                $sender->sendMessage("§aMax Level!");
                $this->getMain()->resetExp($sender);
                #return;
            }  
            return true;
        }
        #return true;
    }
}