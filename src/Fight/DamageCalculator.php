<?php
/**
 * Created by PhpStorm.
 * User: hadrien.chatelet
 * Date: 22/11/17
 * Time: 11:07
 */

namespace App\Fight;


use App\Entity\Weapon;

class DamageCalculator
{
    public function calculate(Weapon $weapon, int $range): int
    {
        $damage = $weapon->getDamage() - ($weapon->getDamageDistanceCoef() * $range);

        if ($damage < 0)
            return 0;
        return round($damage);
    }
}