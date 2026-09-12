# ÜK Modul 307 Projektarbeit

Projektarbeit von Matthias Odermatt und Olivier Lüthy: eine kleine PHP-Webanwendung
zur Verwaltung von Krediten einer Kreditfirma, umgesetzt mit einem selbstgebauten
MVC-Muster (Router, Controller, Models, Views).

A small PHP web application for managing a credit company's loans, built with a
hand-rolled MVC pattern (router, controllers, models, views), created for the
"05 Kreditfirma" task of vocational training module 307.

## Features

- Kredite anzeigen, erstellen, bearbeiten und synchronisieren
  (view / create / update / sync).
- Server- und clientseitige Validierung der Eingaben.
- Front-Controller-Routing über `index.php` mit `.htaccess`-Rewrites.

## Tech

- PHP (custom MVC: `core/Router.php`, `core/database.php`, `core/bootstrap.php`)
- MySQL (`SQL_Database/kredit.sql`, Datenbank `kreditfirma`)
- HTML/CSS + JavaScript (`public/js/clientSideValidation.js`)
- Apache mit `mod_rewrite` (`.htaccess`)

## Setup

1. Datenbank `kreditfirma` in MySQL anlegen und `SQL_Database/kredit.sql` importieren.
2. Zugangsdaten in `index.php` (Array `$db`) bei Bedarf anpassen.
3. Projekt über einen Apache-Server mit aktiviertem `mod_rewrite` bereitstellen
   (z. B. XAMPP) und `index.php` im Browser aufrufen.

## Aufgabenstellung

Alle Informationen zum Projekt: https://github.com/IctBerufsbildungZentralschweiz/modul-307-projekte/tree/master/Projekte/05%20Kreditfirma
