<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 11/12/2018
 * Time: 17:27
 */

namespace App\Rabbit;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use App\Entity\Item;
use App\Entity\PriceNow;
use App\Entity\PriceRange;
use Doctrine\ORM\EntityManagerInterface;

class PopulateService implements ConsumerInterface
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function execute(AMQPMessage $msg)
    {

        $response = json_decode($msg->body, true);

        $item = $this->manager->getRepository('App\Entity\Item')->find($response['id']);

        if ($item == null){
            $item = new Item();
            $item->setId($response['id']);
        }


        $item->setStore($response['sp']);
        $item->setName($response['name']);
        $item->setMember($response['members']);
        $this->manager->persist($item);
        $this->manager->flush();

        print( "updated id: ". $response['id']. "\n");

    }
}