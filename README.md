# Device Detector

## Lumen PHP Framework

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

### Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## API
    PHP version: 7.3
    Composer version: 1.8.4

    To install dependencies make sure you have composer installed:
        composer install

    To run tests for device detection:
        ./vendor/bin/phpunit

    To build the container use:
        docker build --file docker/Dockerfile -t api .

    To run it:
        docker run --rm -p 8080:80 api

    Example for API call with fetch:
        fetch(
            "http://localhost:8080/api/device_info",
            {
                "method":"GET",
                "credentials":"omit",
                "headers":{},
            }
        );

    Response example:
        {
            "type":"desktop",
            "os":"Ubuntu"
        }

