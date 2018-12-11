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

class PopulateService implements ConsumerInterface
{
    public function execute(AMQPMessage $msg)
    {

    }
}