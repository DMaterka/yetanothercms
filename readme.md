<h1> Welcome to Yet Another CMS </h1>

The main feature of the CMS distinct from many others, is that it is created by me. <daniel.materka@gmail.com>

In simple words, the reason behind creation this CMS is to expertiment with different solutions and to have fun with programming.

I hope you find some valuable ideas here. 

<h2> DEV Requirements </h2>

For development, there is a dockerfile which creates the necessary services 

docker engine >= 17.12.0
docker-compose >= 1.18.0

<h2> Running instruction </h2>

1. Copy env file:

    $ cp env.example .env

2. Edit the .env file with custom data

3. Create the database with given name

4. Build the containers 

    \$ docker-compose up -d

5. enter inside container in order to continue building process

    \$ docker-compose app exec /bin/bash

6. Type commands in the container and exit

    \# composer install

    \# npm install 
    
    \# exit
    