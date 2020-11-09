<?php

namespace PhalconVee\Joker\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PhalconVee\Joker\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $body = '{ "type": "success", "value": { "id": 76, "joke": "If tapped, a Chuck Norris roundhouse kick could power the country of Australia for 44 minutes.", "categories": [] } }';

        $mock = $this->get_api_mock(200, $body);

        $jokes = new JokeFactory($mock);

        $result = $jokes->getRandomJoke();

        $this->assertSame('If tapped, a Chuck Norris roundhouse kick could power the country of Australia for 44 minutes.', $result);
    }

    private function get_api_mock($status, $body = null)
    {
        $mock = new MockHandler([new Response($status, [], $body)]);
        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        return $client;
    }
}
