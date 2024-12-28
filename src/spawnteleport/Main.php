<?php

namespace spawnteleport;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function join(PlayerJoinEvent $event): void
    {
        $config = $this->getConfig();
        $player = $event->getPlayer();
        $x = $config->get("spawn_x", "0");
        $y = $config->get("spawn_y", "0");
        $z = $config->get("spawn_z", "0");
        $destination = new Vector3($x, $y, $z);
        $player->teleport($destination);
    }
}
