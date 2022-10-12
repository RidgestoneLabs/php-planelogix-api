# PLANELOGIX API v2 PHP Client

A simple Object Oriented wrapper for PLANELOGIX API v2, written with PHP.

Uses [PLANELOGIX API v2](https://api-docs.planelogix.com/). The object API is very similar to the RESTful API.

## Requirements

* PHP >= 7.4

## Installation

Via [Composer](https://getcomposer.org).

This command will get you up and running quickly with a Guzzle HTTP client.

```bash
composer require ridgestonelabs/planelogix-api:^1.0 guzzlehttp/guzzle:^7.4 http-interop/http-factory-guzzle:^1.2
```

## Examples

We will automatically discover an HTTP client to use, from what you have available.
Simply create a new PlaneLogixAPI client, provide your email address and password, then you're good to go:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

// create a new PLANELOGIX client
$client = new \PlaneLogixAPI\Client();

// authenticate the client with your access token which can be
// generated via the API, using your account email and password
$client->authenticate('your_email_address', 'your_password');
```

From `$client` object, you have access to all available PLANELOGIX API endpoints.

## Contributing

We will gladly receive issue reports and review and accept pull requests, in accordance with our [code of conduct](.github/CODE_OF_CONDUCT.md) and [contribution guidelines](.github/CONTRIBUTING.md)!

## License

PLANELOGIX API v2 PHP Client is licensed under [The MIT License (MIT)](LICENSE).

## Maintainers

This library is maintained by the following people:
- [@DrewKolstad](https://github.com/DrewKolstad)
