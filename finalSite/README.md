# Barrister AKM Kamruzzaman Website

Bangla-first bilingual PHP/MySQL political personnel site with curated media, local-focus pages, citizen intake, tracking, and admin review.

## Run locally

1. Import `database/schema.sql` into the local MySQL server.
2. Serve this directory with XAMPP or PHP's local server.
3. Open `index.php`. Bangla is the default and the language toggle persists with a cookie.

Database defaults are in `config.php`. Override them with `KM_DB_HOST`, `KM_DB_PORT`, `KM_DB_NAME`, `KM_DB_USER`, and `KM_DB_PASS` when needed.

The seeded local admin login is:

- Email: `admin@kamruzzaman.local`
- Password: `ChangeMe!2026`

Change the seeded password before deployment. Uploaded citizen files live outside public browsing behind `storage/uploads/.htaccess` and are served only through the authenticated admin file endpoint.

## Content rules

`data/source-inventory.md` records scanned demo material and public sources. The public release intentionally avoids unverified education/career claims, duplicate demo headlines, and elected-MP wording unsupported by verified results.
