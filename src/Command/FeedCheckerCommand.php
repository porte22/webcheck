<?php
/**
 * Created by PhpStorm.
 * User: Edimotive
 * Date: 06/07/2018
 * Time: 14:07
 */

namespace CheckBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;



class FeedCheckerCommand extends Command
{

    protected function configure()
    {
        $this->setName("feed:check")
            ->setDescription("check all url inside feeds.")
            ->addArgument(
                'country',
                null,
                InputOption::VALUE_OPTIONAL,
                'country 2 char'
            )
            ->addOption(
                'listener',
                'l',
                InputOption::VALUE_REQUIRED,
                'kind of listener [console]?',
                'console'
            );;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = include dirname(__FILE__) . '/../Config/config.php';
        $country = $input->getArgument('country');
        $listenerOpt = $input->getOption('listener');

        if(!$listenerOpt or !isset($config['setting']['listener'][$listenerOpt])){
            throw new \Exception('listener non valido ' . $listenerOpt);
        }

        $listener = $config['setting']['listener'][$listenerOpt];


        if ($country == 'all') {
            $countries = array_keys($config['editions']);
        } else {
            $countries = [$country];
        }

        $this->startCheck($countries, $listener, $listenerOpt, $config);

    }


    private function startCheck(array $countries, $listener, $listenerName,$config)
    {
        foreach ($countries as $country) {
            if (isset($config['editions'][$country])) {
                $feeds = $config['editions'][$country]['link'];
            } else {
                throw new \Exception('country not valid ' . $country);
            }

            $configuration = isset($config['editions'][$country]['listeners'][$listenerName]) ? $config['editions'][$country]['listeners'][$listenerName] : [];
            $httpCode = $config['setting']['http_code'];
            $customErrorCode = $config['setting']['custom_error_code'];

//            $feedChecker = new FeedChecker(
//                new $listener($country, $configuration, $httpCode, $customErrorCode),
//                $country,
//                $config['setting']['timeout'],
//                $config['setting']['concurrent_requests']
//            );
//            foreach ($feeds as $url => $currentFeed) {
//                $feedChecker->addFeed($url);
//            }
//
//            $feedChecker->check();
        }
    }

}