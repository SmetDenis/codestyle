[![build status](http://code.unilead.net/unilead/codestyle/badges/master/build.svg)](http://code.unilead.net/unilead/codestyle/commits/master)

# Project Description

General code style for All projects


## Global install in your vagrant
```sh
sudo composer global require unilead/codestyle
```


## PhpStorm Example Config

**PHP MD**

 * Mess Detector Config - https://yadi.sk/i/08QbtfCP3Nf8Ez
 * Inspections - https://yadi.sk/i/o1gL0iN23Nf6pX

```sh
/home/vagrant/.composer/vendor/bin/phpmd
/home/vagrant/.composer/vendor/unilead/codestyle/src/phpmd/unilead.xml
```

#### PHP CS
 * Code Sniffer Config - https://yadi.sk/i/t-eXjVZ_3Nf7sH
 * Inspections - https://yadi.sk/i/33h_B6uq3Nf7NP

```sh
/home/vagrant/.composer/vendor/bin/phpcs
/home/vagrant/.composer/vendor/unilead/codestyle/src/phpcs/Unilead/ruleset.xml
```
