<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Exchange\Api;

class StarterController extends AbstractController
{
    /**
     * @Route("/starter", name="starter")
     */
    public function index()
    {
        $names = Api::getNames(true,false,true);
        $json = json_encode($names);

        echo $json;
        die;
    }
}
