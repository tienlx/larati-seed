# larati-seed
Laravel Seed for project

# How to develop your service on the project


## Model

Model represent the data entity.

## Repository

The seeding use http://andersonandra.de/l5-repository/ to implement Repository pattern

Repositories provide interfaces for accessing models. Each model should have one repository. For example, `User` model should have `UserRepository` . 

You can understand repository more with the following article.
[https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/]


Repository should only work with single models. If you need to handle 2 or more models ( such as User and Category ). Should use service instead of repository.

### Controller

Controller should only have the following responsibilities.

* Validation
* Parameter extraction from request object
* Call service/repository methods
* Generate response.

Controller never do any business logic related actions. Such as sign in, create new models, and so on. You should write service method and give descriptive name and call it from controllers.

And Controller should only have route action public functions. Must not have any private functions. You should use service instead of controller private methods.


### Service

Services provide business logic. Services can call repositories but repositories cannot call services. Never call service from Models/Repositories.


### Helpers

Helpers is for utility functions which can be called from anywhare includes views, models, repositories, services.

# PHP CodeSniffer 

Must run PHP CodeSniffer before creating pull request and fix all violations
```bash
$ vendor/bin/phpcs --standard=phpcs.xml --extensions=php .
```

Some violations can auto fix with `phpcbf`
```bash
$ vendor/bin/phpcbf --standard=phpcs.xml --extensions=php .
```

# PHP Mess Detector 

Must run PHP Mess Detector before creating pull request and fix all violations
```bash
$ vendor/bin/phpmd . text ruleset.xml --suffixes php --exclude node_modules,resources,storage,vendor,.phpstorm.meta.php,_ide_helper.php,app\Console\Kernel.php
```