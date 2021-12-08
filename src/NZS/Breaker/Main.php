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
use pocketmine\{Player, Server};
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
    public $point;
    public $level;

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getLogger()->info($this->getServer()->getMotd() . "§c Enabled BlockScore V4.5 REMAKED BY NZSigourney");
        $this->saveResource("EXP.yml");
        $this->saveResource("LEVEL.yml");
        $this->point = yaml_parse(file_get_contents($this->getDataFolder() . "EXP.yml"));
        $this->level = yaml_parse(file_get_contents($this->getDataFolder() . "Level.yml"));
        //$this->coin = yaml_parse(file_get_contents($this->getDataFolder() . "Coin.yml"));
        $this->getServer()->getLogger()->notice("Created EXP.yml & Level.yml, Translated Language Vie #UNICODE!");
    }

    public function onDisable(){
        file_put_contents($this->getDataFolder() . "EXP.yml", yaml_emit($this->point));
        file_put_contents($this->getDataFolder() . "Level.yml", yaml_emit($this->level));
        sleep(3);
    }

    public function onQuit(PlayerQuitEvent $ev){
        $player = $ev->getPlayer();
        file_put_contents($this->getDataFolder() . "EXP.yml", yaml_emit($this->point));
        file_put_contents($this->getDataFolder() . "Level.yml", yaml_emit($this->level));
    }

    public function createData(Player $player){
        if(!isset($this->point["EXP"][strtolower($player->getName())])){
            $this->point["EXP"][strtolower($player->getName())] = 0;
        }

        if(!isset($this->level["LEVEL"][strtolower($player->getName())])){
            $this->level["LEVEL"][strtolower($player->getName())] = 0;
        }

        /**if(!file_exists($this->getDataFolder() . "Coin/".$player->getName().".yml")){
            $this->coin = new Config($this->getDataFolder() . "Coin/".$player->getName().".yml", Config::YAML);
            $this->coin->set("Score", 0);
            $this->coin->save();
        }*/
    }

    /**public function addCoin(Player $player, int $coin)
    {
        $current = $this->coin->get("Score");
        $this->coin->set("Score", $current + $coint);
        $this->coin->save();
    }

    public function getCoin(Player $player)
    {
        return $this->coin->get("Score");
    }*/

    public function addExp(Player $player){
        $this->point["EXP"][strtolower($player->getName())]++;
    }

    /**public function removeExp(Player $player, int $exp)
    {
        $this->point["EXP"][strtolower($player->getName())] = $exp - $this->getExp($player);
    }*/

    public function addLevel(Player $player){
        $this->level["LEVEL"][strtolower($player->getName())]++;
    }

    public function getExp(Player $player){
        return $this->point["EXP"][strtolower($player->getName())];
    }

    public function getLVPlayer(Player $player){
        return $this->level["LEVEL"][strtolower($player->getName())];
    }
}
