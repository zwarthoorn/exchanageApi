<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use GuzzleHttp\Client;

class UpdatePoolCommand extends Command
{
    protected static $defaultName = 'UpdatePool';

    protected function configure()
    {
        $this
            ->setDescription('gets all the api stuff')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $client = new Client(['base_uri'=>'http://127.0.0.1:8001']);

        $response = $client->get('/starter');

        $io->success('we have send the request to update the database');
    }
}
