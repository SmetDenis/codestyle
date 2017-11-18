# Project Description

General code style for All projects


## Global install in your vagrant
```sh
sudo composer global require item8/codestyle
```


## PhpStorm Example Config

**PHP MD**

 * Mess Detector Config - https://yadi.sk/i/08QbtfCP3Nf8Ez
 * Inspections - https://yadi.sk/i/o1gL0iN23Nf6pX

```sh
/home/vagrant/.composer/vendor/bin/phpmd
/home/vagrant/.composer/vendor/item8/codestyle/src/phpmd/item8.xml
```

#### PHP CS
 * Code Sniffer Config - https://yadi.sk/i/t-eXjVZ_3Nf7sH
 * Inspections - https://yadi.sk/i/33h_B6uq3Nf7NP

```sh
/home/vagrant/.composer/vendor/bin/phpcs
/home/vagrant/.composer/vendor/item8/codestyle/src/phpcs/item8/ruleset.xml
```
