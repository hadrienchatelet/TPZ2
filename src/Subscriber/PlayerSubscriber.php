<?php

namespace App\Subscriber;

use App\Event\AppEvent;
use App\Event\PlayerEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlayerSubscriber implements EventSubscriberInterface
{
    private $entityManager;

    /**
     * PlayerSubscriber constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AppEvent::PLAYER_ADD => 'playerAdd',
            AppEvent::PLAYER_EDIT => 'playerEdit'
        );
    }

    public function playerAdd(PlayerEvent $playerEvent){
        $player = $playerEvent->getPlayer();
        $this->entityManager->persist($player);
        $this->entityManager->flush();
    }

    public function playerEdit(PlayerEvent $playerEvent){
        $player = $playerEvent->getPlayer();
        $this->entityManager->persist($player);
        $this->entityManager->flush();
    }
}