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