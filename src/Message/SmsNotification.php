<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 19/12/2018
 * Time: 14:23
 */

namespace App\Message;


class SmsNotification
{
    private $content;
    private $counter;
    private $last;

    public function __construct(string $content, int $counter, bool $last)
    {
        $this->content = $content;
        $this->counter = $counter;
        $this->last = $last;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCounter(){
        return $this->counter;
    }
    public function getLast(){
        return $this->last;
    }
}