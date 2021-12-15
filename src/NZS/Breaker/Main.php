<?php

/**
 * BLOCKSCORE
 * PARAMS @value
 * @BLOCKS
 */

namespace NZS\Breaker;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use NZS\Breaker\Commands\lencap;

class Main extends PluginBase implements Listener{
    public $point;
    public $level;
    public $dhs;

    public function onEnable(): void{
        $this->getServer()->getCommandMap()->register("lvup", new lencap($this));
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getLogger()->info($this->getServer()->getMotd() . "§c Enabled BlockScore V4.5 REMAKED BY NZSigourney");
        $this->saveResource("EXP.yml");
        $this->saveResource("LEVEL.yml");
        $this->saveResource("Rank.yml");
        $this->point = yaml_parse(file_get_contents($this->getDataFolder() . "EXP.yml"));
        $this->level = yaml_parse(file_get_contents($this->getDataFolder() . "Level.yml"));
        $this->dhs = yaml_parse(file_get_contents($this->getDataFolder() . "Rank.yml"));
        //$this->coin = yaml_parse(file_get_contents($this->getDataFolder() . "Coin.yml"));
        $this->getServer()->getLogger()->notice("Created EXP.yml & Level.yml, Translated Language Vie #UNICODE!");
    }

    public function onDisable(): void{
        file_put_contents($this->getDataFolder() . "EXP.yml", yaml_emit($this->point));
        file_put_contents($this->getDataFolder() . "Level.yml", yaml_emit($this->level));
        file_put_contents($this->getDataFolder() . "Rank.yml", yaml_emit($this->dhs));
        sleep(3);
    }

    public function onQuit(PlayerQuitEvent $ev){
        //$player = $ev->getPlayer();
        file_put_contents($this->getDataFolder() . "EXP.yml", yaml_emit($this->point));
        file_put_contents($this->getDataFolder() . "Level.yml", yaml_emit($this->level));
        file_put_contents($this->getDataFolder() . "Rank.yml", yaml_emit($this->dhs));
    }

    public function createData(Player $player){
        if(!isset($this->point["EXP"][strtolower($player->getName())])){
            $this->point["EXP"][strtolower($player->getName())] = 0;
        }

        if(!isset($this->level["LEVEL"][strtolower($player->getName())])){
            $this->level["LEVEL"][strtolower($player->getName())] = 0;
        }

        if(!isset($this->dhs["DanhHieu"][strtolower($player->getName())])){
            $this->dhs["DanhHieu"][strtolower($player->getName())] = "Hào kiệt";
        }

        /**if(!file_exists($this->getDataFolder() . "Coin/".$player->getName().".yml")){
            $this->coin = new Config($this->getDataFolder() . "Coin/".$player->getName().".yml", Config::YAML);
            $this->coin->set("Score", 0);
            $this->coin->save();
        }*/
    }

    public function addExp(Player $player, $rand){
        //$rand = mt_rand(1,10);
        $int = $this->point["EXP"][strtolower($player->getName())];
        $this->point["EXP"][strtolower($player->getName())] = $rand + $int;
    }

    public function addLevel(Player $player){
        $this->level["LEVEL"][strtolower($player->getName())]++;
    }

    public function getExp(Player $player){
        return $this->point["EXP"][strtolower($player->getName())];
    }

    public function getLVPlayer(Player $player){
        return $this->level["LEVEL"][strtolower($player->getName())];
    }

    public function getDH(Player $player){
        return $this->dhs["DanhHieu"][strtolower($player->getName())];
    }

    public function resetExp(Player $player){
        $this->point["EXP"][strtolower($player->getName())] = 0;
    }

    public function danhHieu(Player $player, array $dh){
        $this->dhs["DanhHieu"][strtolower($player->getName())] = $dh;
    }
}
