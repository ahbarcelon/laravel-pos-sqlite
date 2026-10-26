# Laravel POS Management System

A read-only POS directory built with Laravel 13, Eloquent, Blade, and SQLite. The dashboard, customer list, and user list read their records from the database. The interface includes responsive tables, instant client-side search, and layered animations that respect reduced-motion settings.

## Requirements

- PHP 8.3 or newer with `pdo_sqlite`, `sqlite3`, `mbstring`, `openssl`, `fileinfo`, and the other Laravel-required extensions
- Composer 2

CSS and JavaScript are served directly from `public/`; Node.js is not required.

## Run on localhost:8080

From this project directory, run:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item -ItemType File -Force database/database.sqlite | Out-Null
php artisan migrate --seed
php artisan serve --host=127.0.0.1 --port=8080
```

Open <http://localhost:8080>. If `.env` already exists, keep its current application key and skip the copy and `key:generate` steps. The bundled ZIP used to prepare this project also contained a portable PHP 8.5 runtime; a compatible PHP installation works as well.

To check the project:

```powershell
php artisan test
php artisan route:list
```

## Database

The migrations create the following POS tables:

| Table | Columns used by the app |
| --- | --- |
| `customers` | `customer_id` (primary key), `full_name`, `email` (unique), `phone`, `address`, `status`, timestamps |
| `users` | `user_id` (primary key), `username` (unique), `full_name`, `email` (unique), `role`, `status`, timestamps |

`DatabaseSeeder` calls `CustomerSeeder` and `UserSeeder`. They populate the same eight customers and six team members shown in the original array-based application. Seeding can be run again without duplicating records:

```powershell
php artisan db:seed
```

The SQLite file is local runtime data and is ignored by Git. The committed migrations and seeders recreate the database and its sample records. Additional Laravel scaffold tables for cache, jobs, sessions, and password reset tokens are also created by migrations.

## Pages and source files

| Route | Controller | View |
| --- | --- | --- |
| `/` | `PageController@home` | `pages.home` |
| `/about` | `PageController@about` | `pages.about` |
| `/customers` | `CustomerController@index` | `pages.customers` |
| `/users` | `UserController@index` | `pages.users` |

`CustomerController` and `UserController` retrieve records through the `Customer` and `User` Eloquent models. `PageController` queries those models for dashboard counts. The Blade directory views preserve the original names, IDs, contact information, roles, statuses, and creation dates; the user list also shows each username.

The base styling is in `public/css/app.css`. `public/css/enhancements.css` adds larger text, atmospheric lighting, staggered entry, floating dashboard preview, animated bars, hover details, and reduced-motion overrides. `public/js/app.js` handles search and the mobile navigation menu.

The project is intentionally read-only: it does not include login, checkout, editing, or deletion flows.
