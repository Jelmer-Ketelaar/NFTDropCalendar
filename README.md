# NFT Drop Calendar

NFT Drop Calendar is a Laravel 13 application shell around the original
NFTDropCalendar PHP website. The legacy pages are kept in `legacy/` and routed
through Laravel so existing URLs continue to work while the application can be
migrated to controllers, form requests, Blade views, and Eloquent models in
smaller follow-up changes.

## Requirements

- PHP 8.5
- Composer
- MySQL-compatible database
- Node.js and npm, only when changing Vite-managed assets

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Update the database settings in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nftdropcalendar_comnftdropcalendar
DB_USERNAME=root
DB_PASSWORD=
```

Run the app locally:

```bash
php artisan serve
```

The site will be available at `http://127.0.0.1:8000`.

## Project Structure

- `app/Http/Controllers/LegacyPageController.php` routes existing page URLs to
  the legacy PHP files.
- `legacy/` contains the original PHP page and processor files.
- `public/` contains static assets and uploaded images.
- `routes/web.php` keeps the existing extensionless and `.php` URLs working.

## Quality Checks

```bash
composer lint
composer pint:test
composer test
```

## Migration Notes

This is a compatibility-first Laravel conversion. The next production step is
to replace legacy pages gradually with Laravel controllers, Blade templates,
form requests, and Eloquent models while preserving the public URLs.
