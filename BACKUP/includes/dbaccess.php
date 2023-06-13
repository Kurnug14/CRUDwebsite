<?php

    // Den Namen, Username, und Passwort in variablen Festsetzen

    $dbname = "mysql:host=localhost;dbname=workouts";
    $dbusername = "root";
    $dbpassword = "";

    //Errors via try und catch ergreifen

    try{
        /* Die Klasse PDO ist die verbindung zwischen PHP und einem Datenbankserver
        PDO braucht die DSN, welches drei möglichkeiten hat: Die volle DSN, die URI (Entweder lokale datei oder URL), oder via Aliasing.
        Auch ein Username, und ein Passwort. Was oben als variable Festgesetzen wurde */
        $pdo = new PDO($dbname, $dbusername, $dbpassword);

        /* Hier werden die Attribute für die verbindung gesetzt. ::ATTR_ERRMODE setzt den Modus für Feahlermeldungen fest. In diesem Fall wird eine PDOException ausgelöst*/
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        /*Falls ein Fehler passiert, ruft der catch die Meldung ab. PDO exception liefert ein String ab mit getMessage()*/
        echo "Connection failed: " . $e->getMessage();
    }