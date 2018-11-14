<?php

namespace CheckBundle\Test;

use Goutte\Client as BaseClient;
use GuzzleHttp\Client as GuzzleClient;
use function PHPSTORM_META\type;
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

    /**
     * @param $crawlerCategory
     */
    public function getArticles($crawlerCategory)
    {
        $xQuery = "//div[contains(@class,'pre-center')]//div[contains(@class,'item')]/a[@class='thumb zoom']/@href";
        return $crawlerCategory->filterXPath($xQuery);
    }

    /**
     * @param $articles
     */
    public function assertNumeberArticles($articles)
    {
        $numberOfArticles = $articles->count();
        $this->assertGreaterThan(8, $numberOfArticles, "troppi pochi articoli " . $numberOfArticles);
        $this->assertLessThan(50, $numberOfArticles, "troppi pochi articoli " . $numberOfArticles);
    }


    private function checkUrlFilter($crawler, $linkName)
    {
        $linkName = strtolower($linkName);

        $this->assertGreaterThan(
            0,
            $crawler->filter('a:contains("' . $linkName . '")')->count(),
            'Link not found ' . $linkName
        );

    }


    private function checkUrlByXPath($crawler, $linkName)
    {
        $linkName = strtolower($linkName);
        $xQuery = sprintf("//div[@class='m1-header-main']//a[translate(normalize-space(text()),'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='%s']", $linkName);
        return $crawler->filterXPath($xQuery);
    }


    private function getLinkByXPath($crawler, $linkName)
    {
        $linkName = strtolower($linkName);
        $xQuery = sprintf("//div[@class='m1-header-main']//a[translate(normalize-space(text()),'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz')='%s']/@href", $linkName);
        return $crawler->filterXPath($xQuery)->getNode(0)->textContent;
    }


    public function teeeestMotor1ITNavabar($currentSite = 'https://it.motor1.com')
    {

        $crawler = $this->client->request(
            'GET',
            $currentSite, [
        ]);

        foreach ($this->config[$currentSite]['navbar']['urls'] as $section) {

            $link = $this->{$this->config[$currentSite]['navbar']['method']}($crawler, $section);
            $this->assertGreaterThan(
                0,
                $link->count(),
                'Link not found ' . $section
            );

        }

    }


    public function testMotor1ITCategory($currentSite = 'https://it.motor1.com')
    {

        $crawler = $this->client->request(
            'GET',
            $currentSite, [
        ]);

        //navigo le categorie associate alla navbar
        foreach ($this->config[$currentSite]['category']['urls'] as $section) {

            $link = $this->{$this->config[$currentSite]['category']['method']}($crawler, $section);


            $crawlerCategory = $this->client->request(
                'GET',
                $currentSite . $link, [
            ]);

            //articoli presenti nella categoria
            $articles = $this->getArticles($crawlerCategory);

            $this->assertNumeberArticles($articles);

            foreach ($articles as $currentArticle) {
                //navigo il sito
                $crawlerCurrentArticle = $this->client->request(
                    'GET',
                    $currentSite . $currentArticle->textContent, [
                ]);

                $this->assertEquals(1, $crawlerCurrentArticle->filterXPath("//div[@class='pre-center']/h1")->count(), "H1 non trovato");
            }
        }

    }
}