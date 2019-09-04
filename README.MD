# Outline

## Requirements

PHP 7.3

## Kirby
- not used atm maybe later

## Oauth2_client_social_login

basic php code for having login with FB in php
see issue here: https://github.com/mfdz/rides/issues/1

### How to run this sub-project.

- Isntall Composer --> dependency manager for php.
 see: https://getcomposer.org/

to install in local project:

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

- install dependencies:

`php composer.phar install`

- run this in the project dir (inside the oauth2_client_social_login dir):

`php -S localhost:8080 -t .`


## Social_login
obsolete experimental work. Do not use.