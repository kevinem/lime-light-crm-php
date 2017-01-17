# Lime Light CRM PHP Client

https://www.limelightcrm.com/

[![Latest Stable Version](https://poser.pugx.org/kevinem/lime-light-crm-php/v/stable?format=flat-square)](https://packagist.org/packages/kevinem/lime-light-php)
[![License](https://poser.pugx.org/kevinem/lime-light-crm-php/license?format=flat-square)](https://packagist.org/packages/kevinem/lime-light-crm-php)
[![Build Status](https://travis-ci.org/kevinem/lime-light-crm-php.svg?branch=master)](https://travis-ci.org/kevinem/lime-light-crm-php)

## Installation

To install, use composer:

```
composer require kevinem/lime-light-crm-php
```

## Documentation

http://help.limelightcrm.com/forums/261931-APIs

### Example Usage

```php
$limelightCRM = new LimeLightCRM([
    'base_url' => 'your_url',
    'username' => 'your_username',
    'password' => 'your_password'
]);

$limelightCRM->transaction()->newOrder([
    'firstName'  => 'John',
    'lastName' => 'Doe',
    'email' => 'jdoe@gmail.com'
]);

$limelightCRM->transaction()->newOrderWithProspect([
    'firstName'  => 'John',
    'lastName' => 'Doe',
    'email' => 'jdoe@gmail.com'         
]);

$limelightCRM->membership()->findActiveCampaign();

$limelightCRM->membership()->viewCampaign([
    'campaign_id' => 1     
]);

```

## License 

The MIT License (MIT)
Copyright (c) 2016 Kevin Em

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of
the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.
