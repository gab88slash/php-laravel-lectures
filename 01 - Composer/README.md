# Composer 01

Composer è uno strumento molto importante per lavorare in maniera produttiva e moderna in PHP

Questi esercizi punteranno ad avere una prima familiarità con questo comando dall'installazione all'uso vero e proprio delle librerie

## Installazione

__Globale__ : molto meglio.

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```


Pochissimo impegno in questo!

## Sorgente del Sapere

Niente proviene dal nulla. Per maggiori dettagli https://getcomposer.org/doc/

## Cheatsheet per esercizi

### Init
    composer init
    
- name : nome del progetto
- description : descrizione del progetto
- type: library, project, metapackage, composer-plugin... in generale usare library
- license: Open/Close
- author: siete voi!
- minumum-stability: ignorate per ora

```json
{
    "name": "gab88slash/composer-one",
    "description": "Primo esercizio composer",
    "type": "library",
    "license": "MIT",
    "authors": [
        {
            "name": "gab88slash",
            "email": "consigliog@gmail.com"
        }
    ],
    "minimum-stability": "dev",
    "require": {}
}

```

### Install

    composer install
    

Installa le dipendenze dato un file `composer.json` o `composer.lock`

### Update

    composer update
    

Aggiorna le dipendenze dato un file `composer.json` e modifica `composer.lock`



### Require

    composer require monolog/monolog 

Crea nel composer.json un albero del tipo 

```
    "require": {
        "monolog/monolog": "^1.17"
    }
```

