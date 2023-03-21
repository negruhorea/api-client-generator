# OpenAPI SDK generator - API client generator

API client generator is a console application capable of auto-generating a [PSR18](https://www.php-fig.org/psr/psr-18/)/[PSR7](https://www.php-fig.org/psr/psr-7/) compliant API client based on [OpenAPI v3](https://swagger.io/specification/) specification according to PHP best practices and your code style standards.

[![Build Status](https://travis-ci.org/DoclerLabs/api-client-generator.svg?branch=master)](https://travis-ci.org/DoclerLabs/api-client-generator)
[![Coverage Status](https://coveralls.io/repos/github/DoclerLabs/api-client-generator/badge.svg?branch=master)](https://coveralls.io/github/DoclerLabs/api-client-generator?branch=master)
[![PHPStan Level](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat)](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat)

## Requirements
- OpenAPI >= 3.0
- PHP >= 7.0

## Why using it?
- With generated client you are always sure that your OpenAPI specification is up-to-date.
- Work with objects instead of raw data, it is OOP friendly.
- Saves your time. You don't need to write data mappers youself to populate those objects with the data from the response.
- All the basic type validations in the request and the response done automatically.
- Despite the fact the code is generated it's clear and readable, simple to debug and to reason about.
- Highly configurable and extensible.
- Reliable and well tested.
- Simply, **if something can be automated it should be automated.**  Focus on important stuff.

## Features
- Supports yaml or json specification file formats.
- Validates your OpenAPI specification.
- Supports multiple content types:
    * application/json
    * application/x-www-form-urlencoded
    * application/xml
- Supports new PHP versions synthax features.
- It is base client independent, you are free to choose any [existing PSR-18 compliant client](https://packagist.org/providers/psr/http-client-implementation). Just choose the one which you already use, so generated client would not cause any conflicts with your dependencies. Although not recommended, you can also use or build your own PSR-18 implementation, as the generated client depends on PSR interfaces only.
- Applies code style rules to generated code, you can specify your own.
- Generates README and composer.json files with possibility to use your own template.
- Supports `allOf` OpenAPI parameter.
- Supports nullable optional parameter.

## Example
Check out [example](https://github.com/DoclerLabs/api-client-generator/tree/master/example) directory to see the code generated by api-client-generator.

Try it out:
```bash
cd example && \
composer install && \
php test-example.php
```

## Usage
### With Docker
```bash
$ docker run -it \
-v {path-to-specification}/openapi.yaml:/openapi.yaml:ro \
-v {path-to-client}/some-api-client:/client \
-e NAMESPACE=Group\\SomeApiClient \
-e OPENAPI=/openapi.yaml \
-e OUTPUT_DIR=/client \
-e PACKAGE=group/some-api-client \
dhlabs/api-client-generator
```

### Without Docker
Preconditions: PHP 7.4

Clone the repository and run:
```bash 
OPENAPI={path-to-specification}/openapi.yaml NAMESPACE=Group\SomeApiClient PACKAGE=group/some-api-client OUTPUT_DIR={path-to-client}/generated ./bin/api-client-generator generate
``` 

## Configuration
The following environment variables are available:

| Variable | Required | Default                             | Enum | Example                    |
|------------|---------|------------------|---------|---------------------------|
| `NAMESPACE` | yes | | | Group\\SomeApiClient |
| `PACKAGE` | yes | | | group/some-api-client |
| `OPENAPI ` | yes | | | /api/openapi.yaml |
| `OUTPUT_DIR` | yes | | | /client |
| `CODE_STYLE` | no | {path-to-repository}/.php_cs.php | | /client/myCodeStyle.php |
| `SOURCE_DIR` | no | src | | src |
| `CLIENT_PHP_VERSION` | no | 7.4 | 7.0, 7.1, 7.2, 7.3, 7.4 | 7.4 |
| `COMPOSER_JSON_TEMPLATE_DIR` | no | {path-to-repository}/template/composer.json.twig | | /path/composer.json.twig |
| `README_MD_TEMPLATE_DIR` | no | {path-to-repository}/template/README.md.twig | | /path/README.md.twig |
| `HTTP_MESSAGE` | no | guzzle | guzzle, nyholm | nyholm |
| `CONTAINER` | no | pimple | pimple | pimple |

## Running tests

```bash
$ composer install
$ make test
```

(check `make` for all available routines).
