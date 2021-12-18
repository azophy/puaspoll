PuasPoll App
============

## Technology Stack

- Laravel
- PicoCSS

## Setup in Heroku

```
# setup env in heroku
heroku config:set \
APP_ENV=prod \
APP_NAME=PuasPoll \
APP_URL=https://puaspoll.com \
APP_KEY=$(php artisan key:generate --show)
```
