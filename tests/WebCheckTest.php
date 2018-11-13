<?php

namespace CheckBundle\Test;

use Goutte\Client as BaseClient;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebCheckTest extends WebTestCase
{

    var $client;

    public function setUp()
    {
        $this->client = new BaseClient();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'auth' => ['m0t007', 'm0t007'],
        ));
        $this->client->setClient($guzzleClient);
    }

    private function checkUrl($crawler, $linkName)
    {

        /*
        $this->assertGreaterThan(
            0,
            $crawler->filter('a:contains("' . $linkName . '")')->count(),
            'Link not found '.$linkName
        );
        */
        //rimuove spazi e accapo, fa strtolower
        $xQuery = '//a[translate(normalize-space(text()),\'ABCDEFGHIJKLMNOPQRSTUVWXYZ\',\'abcdefghijklmnopqrstuvwxyz\')=\''.$linkName.'\']';
        $this->assertGreaterThan(
            0,
            $crawler->filterXPath($xQuery)->count(),
            'Link not found '.$linkName
        );

    }


    public function testMotor1IT()
    {

        $crawler = $this->client->request('GET', 'https://it.motor1.com/',   [
        ]);
       // var_dump($crawler);
//        $this->checkUrl($crawler, 'News');
//        $this->checkUrl($crawler, 'Prove');
        $this->checkUrl($crawler, 'da sapere');
//        $this->checkUrl($crawler, 'YouTester');
    }
/*
    public function testOmniFurgone()
    {

        $crawler = $this->client->request('GET', 'https://of.motor1.com/', [
        ]);
        // var_dump($crawler);
        $this->checkUrl($crawler, 'News');
        $this->checkUrl($crawler, 'Prove');
        $this->checkUrl($crawler, 'Da sapere');
        $this->checkUrl($crawler, 'YouTester');
    }*/
}