<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Wallpaper;
use Doctrine\Common\DataFixtures\AbstractFixture;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWallpaperData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $wallpaper = (new Wallpaper())
           ->setFilename('abstract-background-pink.jpg')
           ->setSlug('abstract-background-pink')
           ->setWidth(1920)
           ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
           ;

       $manager->persist($wallpaper);
       $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
       return 200;
    }
}