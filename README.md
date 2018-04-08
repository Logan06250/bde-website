# Introduction
Make sure your Ubuntu development environemnt is installed. Two environments are used for this project : development and production.

# Development
## Building the project
Before working on this project you have to build it. Type the following commands in a terminal.

    $ cd ~/Code
    $ git clone https://github.com/repository_name.git
    $ cd repository_name
    $ docker-compose up -d # if you encounter an error at this step, restart Ubuntu and try again
    $ cp .env.example .env

Edit .env file and change : DB_HOST=mariadb

    $ docker-compose exec laravel php artisan key:generate
    $ docker-compose exec laravel php artisan migrate

Visit http://localhost:3000 to see the website locally, linked to a local MySql database.

## Configuring git

Type the following command if you haven't done it before.

    $ git config --global user.email ID+username@users.noreply.github.com

If you already committed some changes type :

    $ git commit --amend --reset-author # to update last commit (only if you did one of course)

Finding your commit email address : https://help.github.com/articles/about-commit-email-addresses/

Detailed instructions : https://help.github.com/articles/setting-your-commit-email-address-in-git/


## Daily usage
### Start and stop the application
At the end of your coding session use one of the following commands to stop or remove the containers.

    $ docker-compose stop # stop the containers
    $ docker-compose down # remove the containers

At the beginning of your next coding session type the following command.

    $ docker-compose up -d # starts containers in detached mode

### Commit your changes
Lets assume you want to code a billing feature. First create a new branch and push it to GitHub (the master branch has to stay clean, so don't commit your changes directly to the master branch).

    $ git checkout -b feat-billing master # creates a local branch for the new feature
    $ git push origin feature-billing # makes the new feature remotely available

Periodically, changes made to master (if any) should be merged back into your bug branch.

    $ git merge master # merges changes from master into your branch

Edit your code then use one or more of the following commands.

    $ git status
    $ git diff
    $ git log
    $ git add filename
    $ git commit -m "feat : add paiment form" -m "The paiment form allows the client to enter his credit card"
    $ git commit --amend # use only if needed
    $ git pull origin feature-billing
    $ git push origin feature-billing

Detailled instructions : https://www.git-tower.com/blog/git-cheat-sheet/

### Commit
Commit message format "type: subject"
    * type : one of the following ones
    * feat (new feature)
    * fix (bug fix)
    * docs (changes to documentation)
    * style (formatting, missing semi colons, etc; no code change)
    * refactor (refactoring production code)
    * test (adding missing tests, refactoring tests; no production code change)
    * chore (updating grunt tasks etc; no production code change)
    * subject : summary in present tense

Examples : https://seesparkbox.com/foundry/semantic_commit_messages

Detailled instructions : https://conventionalcommits.org/

#### Commit example
    $ git add docker-compose.yml
    $ git commit -m "chore: add docker-compose.yml file" -m "Create three services (mariadb, laravel and redis) and one volume (db_data). Type \"docker-compose up\" to start"
    $ git push origin feature-billing

#### Artisan command

    $ docker-compose exec laravel php artisan

## Merging changes to master

When development on the feature is complete and has been tested, the lead developper merges changes into master and deletes the remote branch. Another way for the developper would be to create a pull request in GitHub.

    $ git checkout master # change to the master branch
    $ git merge --no-ff feature-billing # makes sure to create a commit object during merge
    $ git push origin master # push merge changes
    $ git push origin :feature-billing # deletes the remote branch

# Production

## Install Heroku CLI
    $ sudo snap install heroku --classic

## Deploy application
Check the APP_KEY in .env file. We call it the_key.

    $ heroku create cesi-hireme-yourforname
    $ heroku buildpacks:set https://github.com/heroku/heroku-buildpack-php
    $ heroku config:set APP_KEY=the_key
    $ heroku config:set APP_URL=cesi-hireme.herokuapp.com # type the name of YOUR url
    $ heroku config:set APP_ENV=development
    $ heroku config:set APP_DEBUG=true
    $ heroku config:set APP_LOG_LEVEL=debug
    $ heroku config:set DB_CONNECTION=sqlite
    $ git remote -v
    $ git add -A
    $ git commit -m 'heroku deployment stuff'
    $ git push heroku master
    $ heroku open
    $ heroku run php artisan migrate
    $ heroku run php artisan migrate:reset

Visit https://cesi-hireme-yourforname.herokuapp.com/api/products/1