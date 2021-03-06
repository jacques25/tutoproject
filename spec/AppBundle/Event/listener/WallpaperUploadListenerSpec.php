<?php

namespace spec\AppBundle\Event\listener;

use AppBundle\Entity\Category;
use AppBundle\Event\listener\WallpaperUploadListener;
use AppBundle\Service\FileMover;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WallpaperUploadListenerSpec extends ObjectBehavior
{
    private $fileMover;

    function let(FileMover $fileMover)
    {
        $this->beConstructedWith($fileMover);

        $this->fileMover = $fileMover;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(WallpaperUploadListener::class);
    }

    function it_returns_early_if_prePersist_LifecycleEventArgs_entity_is_not_a_Wallpaper_instance(
        LifecycleEventArgs $eventArgs
    )
    {
           $eventArgs->getEntity()->willReturn(new Category());

           $this->prePersist($eventArgs)->shouldReturn(false);

           $this->fileMover->move(
               Argument::any(),
               Argument::any()
           )->shouldNotHaveBeenCalled();
    }

    function it_can_prePersist(LifecycleEventArgs $eventArgs)
    {
        $fakeTempPath = '/tmp/some.file';
        $fakeRealPath = '/path/to/my/project/some.file';

        $this->prePersist($eventArgs);

        $this->fileMover->move($fakeTempPath, $fakeRealPath)->shouldHaveBeenCalled();

    }

    function it_can_preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->preUpdate($eventArgs);
    }
}
