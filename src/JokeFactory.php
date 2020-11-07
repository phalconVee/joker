<?php

namespace PhalconVee\Joker;

class JokeFactory
{
    protected $jokes = [
        'Chuck Norris\' tears cure cancer. Too bad he has never cried',
        'Chuck Norris counted to infinity... Twice.',
        'Chuck Norris tells Simon what to do.',
        'Chuck Norris can kill your imaginary friends.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
