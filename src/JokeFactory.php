<?php

namespace PhalconVee\Joker;

use GuzzleHttp\Client;
use PhalconVee\Joker\Helpers\GuzzleRequestHelper;

class JokeFactory
{
    const API_ENDPOINT = "http://api.icndb.com/jokes/random";

    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
        $this->setUpGuzzleHelper();
    }

    /**
     * Set up Guzzle Helper
     *
     * @return GuzzleRequestHelper
     */
    private function setUpGuzzleHelper()
    {
        return new GuzzleRequestHelper($this->client);
    }

    /**
     * Get Random Joke
     *
     * @return mixed
     */
    public function getRandomJoke()
    {
        $response = $this->setUpGuzzleHelper()->makeHttpRequest('GET', self::API_ENDPOINT);
        return $response->value->joke;
    }
}
