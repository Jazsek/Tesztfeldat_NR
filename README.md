# PHP SDK for ActiveCollab 5 and 6 API

Jászolos Ádám teszt feladat

## Telepítés

Első lépésként a config mappán belül meg kell adni a helyes beállításokat

```php
<?php

class Config {
    // Active collab connect infos
    public static $org_name = "";   // Szervezet neve
    public static $app_name = "";   // Fejlesztés alatt álló app neve (igazából lehet bármi)
    public static $username = "";   // Felhasználónév
    public static $password = "";   // Jelszó
    
    // Egyedi config, hogy azonosítani tudjuk a kívánt projektet
    public static $project_name = "";   // Azon projekt neve, amelyen belül keressük a felhasználó feladatait.
}
```
    
Kiadni a `composer update` parancsot.

## Használat

Meg kell hívni az index.php-t a megfelelő paraméterrel. 

`..../index.php?user_name=___`