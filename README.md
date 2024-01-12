# Kanye West Quotes API
# Created by Iulian Moldovanu

This Laravel application provides a REST API for fetching random Kanye West quotes.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Close Server](#ending)

## Requirements

- Docker (https://docs.docker.com/get-docker/)
- Postman (https://www.postman.com/downloads/)

## Installation

```bash
   git clone https://github.com/iuliancmoldovanu/kanye-api.git
   
   cd kanye-api
   
   docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

## Configuration

    Download and install Postman
    import KanyeAPI.postman.json file from root directory into the Postman App

## Usage

```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

    sail up -d
```
    send API request using the 2 endpoints - get and refresh quotes

## Testing

```bash
   sail php artisan test
```

## Ending

```bash
   sail down
```