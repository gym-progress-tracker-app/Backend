# Workout Tracker Backend

This repository contains the Laravel backend for the Workout Tracker project. The API handles authentication, exercise browsing, personal exercise management, categories, and workout progress logging.

## Project Overview

The backend provides a REST API for the frontend application. It includes:

- user registration, login, and logout
- public and user-specific exercise listing
- creating custom exercises
- managing a personal exercise list
- creating, listing, and deleting progress log entries
- category listing

## Tech Stack

- Laravel 12
- PHP 8.2
- Laravel Sanctum
- Eloquent ORM
- SQLite by default in the sample environment configuration

## Prerequisites

Before starting the backend, make sure you have:

- PHP 8.2 or newer
- Composer
- Node.js and npm
- SQLite, or another database configured in `.env`

## Getting Started

Install dependencies:

```bash
composer install
npm install
```

Create the environment file and generate the application key:

```bash
copy .env.example .env
php artisan key:generate
```

If you use SQLite, create the database file:

```powershell
New-Item -ItemType File -Path database/database.sqlite -Force
```

Run migrations and seed the database:

```bash
php artisan migrate --seed
```

Start the development server:

```bash
php artisan serve
```

The API is available at:

```text
http://localhost:8000/api/
```

## Quick Setup

You can also use the built-in Composer setup script:

```bash
composer run setup
```

This installs PHP and npm dependencies, creates the `.env` file if needed, generates the app key, runs migrations, and builds frontend assets.

## Seed Data

The default seeder creates:

- a test user with the email `test@example.com`
- default exercise categories
- default exercises

If you want to verify or change the default test password, check [database/factories/UserFactory.php](database/factories/UserFactory.php).

## Authentication

Authentication uses Laravel Sanctum bearer tokens. After a successful login, the API returns the authenticated user and a token that can be used for protected endpoints.

Public endpoints include:

- `POST /api/register`
- `POST /api/login`
- `GET /api/exercises-without-logged-in`
- `GET /api/categories`

Protected endpoints include:

- `GET /api/user`
- `POST /api/logout`
- `GET /api/exercises`
- `POST /api/exercises`
- `GET /api/own-exercises`
- `POST /api/own-exercises`
- `GET /api/progresslogs`
- `POST /api/progresslogs`

## Available Scripts

Start the Laravel development server:

```bash
php artisan serve
```

Run the combined local development workflow defined in Composer:

```bash
composer run dev
```

Run database migrations:

```bash
php artisan migrate
```

Seed the database:

```bash
php artisan db:seed
```

Run tests:

```bash
composer test
```

Build frontend assets:

```bash
npm run build
```

Run the Vite development server:

```bash
npm run dev
```

## Main API Areas

- `users`: registration, login, logout, current user
- `exercises`: public and user-created exercises
- `own-exercises`: personal saved exercise list
- `progresslogs`: workout progress history
- `categories`: exercise category list

## Notes

- The sample environment file is configured for SQLite by default.
- The frontend expects the backend API at `http://localhost:8000/api/` unless configured otherwise.
- Most exercise and progress log features require authentication.
