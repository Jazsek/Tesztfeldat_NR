# Jászolos Ádám teszt feladat

Az alábbi leírás segít a program helyes beállításában, és tesztelésében.

## Telepítés

Klónozni kell, vagy letölteni a repot.

A config mappán belül meg kell adni a helyes beállításokat.

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

## Használat

Meg kell hívni az index.php-t a megfelelő paraméterrel. 

`..../index.php?user_email=___`