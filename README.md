# Symodo
I made Symodo to be my starter point to make _PHP7 + Symfony 4 + mongo_ websites.

It's based on the Symfony 4 website skeleton, adding:

- Laradock for managing dockers. Inside bin folder I added some shellscripts to ease the work with laradock.
- Mongodb-odm-bundle and the mongo PHP extension, and configuring everything to work
- FOSUserBundle and configures it. Automatically creates a default admin.
- Adds the home and admin page to test everything works

## Installation

You only need to follow the next steps:

```shell
$ git clone git@github.com:desaroger/symodo.git
```

```shell
$ cd symodo
```

```shell
$ ./bin/initialize.sh
```

```shell
$ ./bin/start.sh
```

Now open your browser and [go to localhost](http://localhost).
