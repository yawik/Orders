Orders
======

This modules injects a form with a billing address into to wizard entering a job posting. In addition admins can export orders as a csv via the 
command line.

Build status:

[![Build Status](https://api.travis-ci.org/yawik/Orders.svg)](https://travis-ci.org/yawik/Orders)
[![Coverage Status](https://coveralls.io/repos/github/yawik/Orders/badge.svg?branch=develop)](https://coveralls.io/github/yawik/Orders?branch=develop)

Requirements
------------

running [YAWIK](https://github.com/cross-solution/YAWIK)


Installation
------------

recommended

```
cd YAWIK/module
git clone https://github.com/yawik/Orders.git
```

Or by using composer

```
composer require yawik/orders
```

Documentation
-------------

http://yawik.readthedocs.io/en/latest/modules/orders/index.html


Development
-------
1.  Clone project
```sh
$ git clone git@github.com:yawik/Orders.git /path/to/orders 
```

2. Install dependencies:
```sh
$ composer install
```

3. Run PHPUnit Tests
```sh
$ ./vendor/bin/phpunit
```

4. Run Behat Tests
```sh

# start selenium
$ composer run start-selenium --timeout=0

# start php server
$ composer run serve --timeout=0

# run behat
$ ./vendor/bin/behat

```

Licence
-------

MIT