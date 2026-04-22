# Dezimal

Production/demo source for a telecom consulting corporate website, organized as a PHP application with modular includes and system-level configuration.

## Tech Stack

- PHP
- HTML/CSS/JavaScript
- SEO files (`sitemap.xml`, `system/sitemap.xml`, `robots.txt`)

## Project Structure

- `index.php`: application entry point
- `includes/`: reusable header/sections/footer components
- `system/`: configuration and SEO support files
- `privacy.php`, `terms.php`, `legal.php`: legal pages

## Local Preview

```bash
php -S 127.0.0.1:8080
```

## Live Site

- https://dezimal.svilenkovic.rs
- https://dezimal.rs

## Deployment Notes

- Designed for direct deployment to PHP/Nginx hosting.
- Verify canonical tags, Open Graph metadata, robots, and sitemap references after domain-level changes.
- If domain mapping changes, update both root-level and `system/` SEO files.

## Language Note

The website content is intentionally in Serbian for the target audience.
