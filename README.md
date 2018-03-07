# HireMe
## Local
    docker-compose up

## Install Heroku CLI
    sudo snap install heroku --classic


## Deploy
Check the APP_KEY in .env file. We call it thekey

    heroku create cesi-hireme-yourforname
    heroku buildpacks:set https://github.com/heroku/heroku-buildpack-php
    heroku config:set APP_KEY=thekey
    heroku config:set
    APP_URL=cesi-hireme.herokuapp.com
    heroku config:set APP_ENV=development
    heroku config:set APP_DEBUG=true
    heroku config:set APP_LOG_LEVEL=debug
    heroku config:set DB_CONNECTION=sqlite
    git remote -v 
    git add -A
    git commit -m 'heroku deployment stuff'
    git push heroku master
    heroku open


    heroku run php artisan migrate
    heroku run php artisan migrate:reset

Visit https://cesi-hireme-yourforname.herokuapp.com/api/products/1