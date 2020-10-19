<?php

namespace PhalconVee\Joker\Tests;

use PhalconVee\Joker\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke'
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $joke_chest = [
            'Chuck Norris\' tears cure cancer. Too bad he has never cried',
            'Chuck Norris counted to infinity... Twice.',
            'Chuck Norris tells Simon what to do.',
            'Chuck Norris can kill your imaginary friends.'
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $joke_chest);
    }
}
