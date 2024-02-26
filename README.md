# Maak je eigen Gutenberg blokken in PHP

Deze bestanden dienen als bijlage voor mijn presentatie "Maak je eigen Gutenberg blokken in PHP".

## Hoe te gebruiken

Voeg deze bestanden toe in de root van je (child)thema. In `functions.php`, voeg je `block-loader.php` toe om in te laden.
Bijvoorbeeld: ```require_once 'block-loader.php';```

### Advanced Custom Fields Pro

ACF Pro is een verplichte dependency, zonder deze plugin krijg je deze code niet aan de praat.
Om de ACF velden van de twee demo blokken in te laden, importeer `field-groups-export.json` via "Gereedschap" in ACF PRO.
