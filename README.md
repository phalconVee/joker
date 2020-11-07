# Phalcon Chuck Norris Jokes

Create Chuck Norris jokes in your next PHP projects.

## Installation

Require the package using composer:

```bash
composer require phalconvee/joker
```

## Usage

```php
use PhalconVee\Joker\JokeFactory;

$jokes = new JokeFactory();

$joke = $jokes->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)
