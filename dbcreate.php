<?php
    include('includes/dbaccess.php');
    include_once 'index.php';
    include_once 'dbread.php';
    
    $tables=$_POST["tables"];
    //tabelle für die momentane session festhalten um diese erfolgreich zu überreichen
    ini_set('display_errors', 0);
    session_start();
    ini_set('display_errors', 1);
    $_SESSION['table'] = $table;

    /*//ID Feststellen
    $sqlid = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$table."' LIMIT 1;";
    $statement=$pdo->prepare($sqlid);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $resID =  $statement->fetchAll();
    $strID = $resID[0]-> COLUMN_NAME;
    echo $strID;*/
    
    /* Attributen festsetzen und formular generieren*/
     $table=$_POST["tables"];
    //Attribute abfragen
    $hsql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '". $table . "';";
    $statement=$pdo->prepare($hsql);
    $statement->execute();
    //Gibt die das resultat als Objekt zurück
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $tableHead =  $statement->fetchAll();
    //array zur speicherung der abgefragten attribute
    $arrHead=[];
    
    //Formular  generieren
    echo "<form action='includes/dbcreator.php' method='post' >";
    foreach($tableHead as $header){
        array_push($arrHead, $header->COLUMN_NAME);
        
    }
        $col = count($arrHead);

        for($i = 1; $i <= $col-1; $i++){
        echo "<input type='text' name='".$arrHead[$i]."' placeholder='".$arrHead[$i]."'> ";
        }
    echo "<input type='submit' value='Create data'>
    <form action='includes/dbfunctions.php' method='post' >";

