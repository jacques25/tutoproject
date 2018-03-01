<?php

namespace AppBundle\Event\listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileMover;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperUploadListener
{
    /**
     * @var FileMover
     */
    private $fileMover;

    public function __construct(FileMover $fileMover)
    {
        // TODO: write logic here
        $this->fileMover = $fileMover;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        // if not a Wallpaper entity, return false
         if(false === $eventArgs->getEntity() instanceof Wallpaper){
             return false;
         }

         // got here
        // $this->fileMover->move();

         return true;

    }
    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {

    }
}
