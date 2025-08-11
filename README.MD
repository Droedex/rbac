## Installation

Require this package with composer.

```shell
composer require droedex/rbac
```

Public configs and migrations

```shell
php artisan tinker
>>> \Droedex\RBAC\Utils\Installer::run()
```

Run migrations

```shell
php artisan migrate
```

## Base configure