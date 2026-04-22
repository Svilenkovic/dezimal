# Dezimal

Produkcioni/demonstracioni kod korporativnog sajta za telecom consulting, organizovan kao PHP aplikacija sa modularnim include i system slojem.

## Tehnologije

- PHP
- HTML/CSS/JavaScript
- Strukturisana SEO mapa (`sitemap.xml`, `system/sitemap.xml`, `robots.txt`)

## Struktura

- `index.php`: ulazna tacka
- `includes/`: header, sekcije i footer komponente
- `system/`: konfiguracija, SEO i pomocni sistemski fajlovi
- `privacy.php`, `terms.php`, `legal.php`: pravne stranice

## Lokalni razvoj

```bash
php -S 127.0.0.1:8080
```

## Live Preview

- https://dezimal.svilenkovic.rs
- https://dezimal.rs

## Deploy smernice

- Repo je spreman za direktan deploy na PHP/Nginx hosting.
- Posle izmena proveri canonical/og/robots/sitemap reference.
- Ako menjas domen, azuriraj i root i `system` SEO fajlove.
