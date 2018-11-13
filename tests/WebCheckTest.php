<?php

namespace CheckBundle\Test;

use Goutte\Client as BaseClient;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebCheckTest extends WebTestCase
{

    var $client;
    var $config;

    public function setUp()
    {
        $this->client = new BaseClient();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'auth' => ['m0t007', 'm0t007'],
        ));
        $this->client->setClient($guzzleClient);
        $this->config = include dirname(__FILE__) . '/../src/Config/config.php';
    }

    private function checkUrlFilter($crawler, $linkName)
    {
        $linkName = strtolower($linkName);

        $this->assertGreaterThan(
            0,
            $crawler->filter('a:contains("' . $linkName . '")')->count(),
            'Link not found '.$linkName
        );

    }



    private function checkUrlByXPath($crawler, $linkName)
    {
        $linkName = strtolower($linkName);
        $xQuery =sprintf("//a[translate(normalize-space(text()),'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='%s']",$linkName);
        $this->assertGreaterThan(
            0,
            $crawler->filterXPath($xQuery)->count(),
            'Link not found ' . $linkName
        );
    }




    public function testMotor1ITNavabar()
    {
        $currentSite = 'https://it.motor1.com';
        $crawler = $this->client->request(
            'GET',
            $currentSite, [
        ]);

        foreach ($this->config[$currentSite]['navbar'] as $section) {
            $this->checkUrlByXPath($crawler, $section);
        }

    }
}