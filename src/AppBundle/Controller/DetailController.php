<?php
// src/AppBundle/Controller/DetailController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DetailController extends Controller
{
    /**
     * @Route("/view", name="view")
     */

    public function indexAction(Request $request)
    {
      $image = 'landscape-summer-beach.jpg';

      return $this->render('detail/index.html.twig', [
         'image' => $image
      ]);
    }
}
