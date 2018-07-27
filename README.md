# TripSorter

#### Introduction
You are given a stack of boarding cards for various transportations that will take you from a point
A to point B via several stops on the way. All of the boarding cards are out of order and you don't
know where your journey starts, nor where it ends. Each boarding card contains information
about seat assignment, and means of transportation (such as flight number, bus number etc).
Write an API that lets you sort this kind of list and present back a description of how to complete
your journey.

#### System Requirements
* PHP 7.1
* PHPUnit 7

#### Setup
In order to run this, you need to have composer installed. Look [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
for Linux or OSX environments and [here](https://getcomposer.org/doc/00-intro.md#installation-windows) for
Windows.

#### Prepare environment
Once you have a sane environment, execute the following:
* git clone git@github.com:hellproducts/TripSorter.git
* cd TripSorter
* composer install

#### Running the app
In order to execute the app on a Unix (Linux / OSX) machine, type the following command from inside
the TripSorter directory:
```bash
php ./runner.php
```
For Windows, the syntax is a bit different:
```bash
php .\runner.php
```
If, for some reason, you get namespace related errors, execute the following command:
```bash
composer dump-autoload
```

To add new cards, juat edit the json / xml file located in data folder. Eaxh new entry must have a minimum of attributes: from, to and type.
<b><i>Enjoy</i></b>
