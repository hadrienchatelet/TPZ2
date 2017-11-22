<?php
/**
 * Created by PhpStorm.
 * User: hadrien.chatelet
 * Date: 22/11/17
 * Time: 11:06
 */

namespace App\Fight;


class FightHandler
{
    private $damageCalculator;

    public function  __construct(DamageCalculator $damageCalculator)
    {
        $this->damageCalculator = $damageCalculator;
    }

    public function handle(Fight $fight)
    {
        $weapon = $fight->player->getCurrentWeapon();
        $damage = $this->damageCalculator->calculate($weapon, $fight->distance);

        $fight->target->setHealthPoint($fight->target->getHealthPoint() - $damage);
    }
}