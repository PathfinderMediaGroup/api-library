<?php

class ArticlesTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\ArticleApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\ArticleApi($auth);
    }

    public function testGet()
    {
        $article = $this->api->getRecent(20)[0];
        $this->assertArrayHasKey('title', $article);
        $this->assertArrayHasKey('date', $article);
        $this->assertArrayHasKey('image', $article);
    }

    public function testGetWithOnly()
    {
        $articles = $this->api->getRecent(20, ['pc-patch-notes']);

        foreach ($articles as $article) {
            $this->assertEquals('pc-patch-notes', $article['channel']);
        }
    }

    public function testGetWithExclude()
    {
        $toExclude = ['reddit-weekday-post', 'reddit-daily-discussion'];

        $articles = $this->api->getRecent(20, [], $toExclude);

        foreach ($articles as $article) {
            $this->assertNotEquals('reddit-weekday-post', $article['channel']);
            $this->assertNotEquals('reddit-daily-discussion', $article['channel']);
        }
    }
}
