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

 class Main extends PluginBase implements Listener{
     public $point;
     public $level;

     public function onEnable(): void{
         $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
         $this->getServer()->getLogger()->info($this->getServer()->getMotd() . "§c Enabled BlockScore V1-BETA-2 BY NZSigourney");
         $this->saveResource("EXP.yml");
         $this->saveResource("LEVEL.yml");
         $this->point = yaml_parse(file_get_contents($this->getDataFolder() . "EXP.yml"));
         $this->level = yaml_parse(file_get_contents($this->getDataFolder() . "Level.yml"));
         $this->getServer()->getLogger()->notice("Created EXP.yml & Level.yml, Translated Language Vie #UNICODE!");
     }

     public function onDisable(){
         file_put_contents($this->getDataFolder() . "EXP.yml", yaml_emit($this->point));
         file_put_contents($this->getDataFolder() . "Level.yml", yaml_emit($this->level));
         sleep(3);
     }

     public function onQuit(PlayerQuitEvent $ev){
        $player = $ev->getPlayer();
        file_put_contents($this->getDataFolder() . "EXP.yml", yaml_emit($this->getPlugin()->point));
        file_put_contents($this->getDataFolder() . "Level.yml", yaml_emit($this->getPlugin()->level));
    }

     public function createData(Player $player){
         if(!isset($this->point["EXP"][strtolower($player->getName())])){
             $this->point["EXP"][strtolower($player->getName())] = 0;
         }

         if(!isset($this->level["LEVEL"][strtolower($player->getName())])){
             $this->level["LEVEL"][strtolower($player->getName())] = 0;
         }
     }

     public function addExp(Player $player){
         $this->point["EXP"][strtolower($player->getName())]++;
     }

     public function addLevel(Player $player){
         $this->level["LEVEL"][strtolower($player->getName())]++;
     }

     public function getExp(Player $player){
         return $this->point["EXP"][strtolower($player->getName())];
     }

     public function getLevel(Player $player){
         return $this->level["LEVEL"][strtolower($player->getName())];
     }
 }