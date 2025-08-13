> **⚠️ Disclaimer**
> This package is currently **under active development** and is **not ready for production use**.
> The API, database schema, and core logic may change at any time without notice.
>
> Planned scope: an **"Intelligent RBAC"** system combining classic Role-Based Access Control (RBAC) with
> access levels and entity-level privileges to provide flexible, fine-grained permission checks.
> The design focuses on keeping the core model simple, while allowing advanced multi-layered



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