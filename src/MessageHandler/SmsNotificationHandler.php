<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 19/12/2018
 * Time: 14:28
 */
namespace App\MessageHandler;
use App\Message\SmsNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Entity\Item;
use App\Entity\PriceNow;
use App\Entity\PriceRange;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SmsNotificationHandler extends AbstractController implements MessageHandlerInterface
{
    public function __invoke(SmsNotification $message)
    {
        $manager = $this->getDoctrine()->getManager();;

        $response = json_decode($message->getContent(), true);

        $item = $manager->getRepository('App\Entity\Item')->find($response['id']);

        if ($item == null){
            $item = new Item();
            $item->setId($response['id']);
        }
        $newprice = false;
        if ($item->getPriceNew() == null){
            $pricenow = new PriceNow();
            $newprice = true;
        }else{
            $pricenow = $manager->getRepository('App\Entity\PriceNow')->find($item->getPriceNew()->getId());
        }


        $item->setStore($response['sp']);
        $item->setName($response['name']);
        $item->setMember($response['members']);
        $pricenow->setSellQuantity($response['sell_quantity']);
        $pricenow->setSellAverage($response['sell_average']);
        $pricenow->setBuyQuantity($response['buy_quantity']);
        $pricenow->setBuyAverage($response['buy_average']);
        $pricenow->setOverallAverage($response['overall_average']);
        $pricenow->setOverallQuantity($response['overall_quantity']);
        $pricenow->setPriceDifference( $response['buy_average'] - $response['sell_average']);
        if ($newprice){
            $pricenow->setItem($item);
        }

        $manager->persist($pricenow);
        $manager->persist($item);

        if ($message->getCounter() === 100){
            $manager->flush();
        }
        if ($message->getLast()){
            $manager->flush();
        }

        print( "updated id: ". $response['id']. "\n");
    }
}