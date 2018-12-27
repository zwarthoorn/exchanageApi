<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Message\SmsNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Exchange\Api;
use Symfony\Component\HttpFoundation\Response;
use AMQPConnection;

class StarterController extends AbstractController
{
    /**
     * @Route("/starter", name="starter")
     */
    public function index(MessageBusInterface $bus)
    {
        $names = Api::getNames(true,false,true);
        $i = 0;
        $counter = 1;
        $count = count($names);
        foreach ($names as $name){


            $json = json_encode($name);

            $rabbitMessage = $json;
            $last = false;
            if ($counter === $count){
                $last = true;
            }
            $bus->dispatch(new SmsNotification($rabbitMessage,$i,$last));

            if ($i == 100){
                $i = 0;
            }else{
                $i++;
            }
            $counter++;
        }



        return new Response($json);

    }
}
