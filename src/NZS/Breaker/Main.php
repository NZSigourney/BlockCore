<?php

declare(strict_types=1);

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
use NZS\Breaker\Commands\lencap;

class Main extends PluginBase implements Listener{
    //public $motd = $this->getServer()->getMotd();

    public function onEnable(): void{
        $this->getServer()->getCommandMap()->register("lvup", new lencap($this));
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getLogger()->info($this->getServer()->getMotd() . "§c Enabled BlockScore V4.5 REMAKED BY NZSigourney");
        @mkdir($this->getDataFolder(), 0744, true);
        $this->exps = new Config($this->getDataFolder() . "EXP.yml", Config::YAML);
        $this->lv = new Config($this->getDataFolder() . "Level.yml", Config::YAML);
    }

    public function createDanhHieu(Player $player, $dh){
        if(!is_dir($this->getDataFolder() . "DanhHieu/")){
            @mkdir($this->getDataFolder(), 0777, true);
        }
        $this->dhs = new Config($this->getDataFolder() . "DanhHieu/" . strtolower($player->getName()) . ".yml", Config::YAML, ["NameTag" => $dh]);
        //$this->dhs->set("NameTag", $dh);
        //$this->dhs->save();
    }

    public function getDanhHieu(Player $player)
    {
        $dhs = new Config($this->getDataFolder() . "DanhHieu/" . strtolower($player->getName()) . ".yml");
        return $dhs->getAll(true);
        //return $this->dhs->get("NameTag");
    }

    public function setDanhHieu(Player $player, $dh){
        $dhs = new Config($this->getDataFolder() . "DanhHieu/" . strtolower($player->getName()) . ".yml");
        $dhs->set("NameTag", $dh);
        $dh->save();
    }

    public function createExp(Player $player){
        $this->exps->set($player->getName(), 0);
        $this->exps->save();
    }

    public function setExp(Player $player, $exp){
        $playerName = $player->getName();
        $currentExp = $this->exps->get($playerName);
        $this->exps->set($playerName, $exp + $currentExp);
        $this->exps->save();
    }

    public function getExp(Player $player)
    {
        return $this->exps->get($player->getName());
    }

    public function createLevel(Player $player){
        $this->lv->set($player->getName(), 0);
        $this->lv->save();
    }

    public function setLevel(Player $player, $lv){
        $lvs = $this->lv->get($player->getName());
        $this->lv->set($player->getName(), $lv + $lvs);
        $this->lv->save();
    }

    public function resetExp(Player $player){
        $max = $this->exps->get($player->getName());
        $this->exps->set($player->getName(), 0);
        $this->exps->save();
    }

    public function getLevels(Player $player){
        return $this->lv->get($player->getName());
    }
}