<?php

namespace AppBundle\Service;

class WallpaperFilePathHelper
{
    /**
     * @var string
     */
    private $wallpaperFileDirectory;

    public function __construct(string $wallpaperFileDirectory)
    {
        // TODO: Implement __toString() method.
        $this->wallpaperFileDirectory = $wallpaperFileDirectory;
    }

    public function getNewFilePath(string $newFileName)
    {
        return $this->wallpaperFileDirectory . $newFileName;
    }


}