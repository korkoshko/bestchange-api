# BestChange API
A simple package for working with the pseudo API of the bestchage.ru


## Features
- Save memory by using generators

## Requirements

- PHP 7.4 or above
- [ZIP extension](http://php.net/manual/en/json.installation.php)

## Installation

```
composer require korkoshko/bestchange-api
```

## Examples

### Initial
```php 
$bestChange = new BestChange();
$bestChange->setArchivePath(__DIR__); // If param is not set, a tmp directory is used 

$bestChange->download(); // Downloading archive with data
```

### Get base info of API
```php
foreach($bestChange->get(InfoMethod::class) as $info) { // The generator returns (https://www.php.net/manual/ru/language.generators.php)
    var_dump($info);
}

// Or using sugar method

var_dump(
    $bestChange->getArray(InfoMethod::class);
);
```

### Get exchangers

```php
foreach ($bestChange->get(ExchangerMethod::class) as $exchanger) {
    var_dump($exchanger);
}
```

## License
[MIT](https://opensource.org/licenses/MIT)