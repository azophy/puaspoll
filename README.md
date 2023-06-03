PuasPoll App
============

A polling app that should produce fairer result by using [Quadratic Voting](https://en.m.wikipedia.org/wiki/Quadratic_voting). Built using Laravel, PostgreSQL, Bulma CSS. This project is an MVP that I created iteratively for several weeks. However I later found that this project may require more maintenance & resource than I could reasonably spare, so I decided to abandon it and open source its code. I would be happy if it could be a source for learning for other people.

This app is originally hosted on Heroku's Free Dyno & Gitlab Repository.

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

## License
The MIT License (MIT)

Copyright © 2023 Abdurrahman Shofy Adianto

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

