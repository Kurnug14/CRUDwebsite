<?php
    
    include('dbaccess.php');
    session_start();
    

    //Session speichert Daten nur solange das Fenster offen ist
    $table = $_SESSION['table'];

    //Attribute abfragen
    $hsql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '". $table . "';";
    $statement=$pdo->prepare($hsql);
    $statement->execute();
    //Gibt die das resultat als Objekt zurück
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $tableHead =  $statement->fetchAll();
    //array zur speicherung der abgefragten attribute
    $arrHead=[];
    //ID feststellen
    $sqlid = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$table."' LIMIT 1;";
    $statement=$pdo->prepare($sqlid);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $resID =  $statement->fetchAll();
    $strID = $resID[0]-> COLUMN_NAME;
    
    //SQL Code generieren
    $sqlUpdates="UPDATE ".$table." SET ";

    foreach($tableHead as $header){
        array_push($arrHead, $header->COLUMN_NAME);
        }
        $col = count($arrHead);
    
    for($i = 1; $i <= $col-1; $i++){
        $var = $_POST[$arrHead[$i]];
        if($i===$col-1){
            $sqlUpdates = $sqlUpdates.$arrHead[$i]." = '".$var."' ";
        }
        else {
            $sqlUpdates = $sqlUpdates.$arrHead[$i]." = '".$var."', ";
        }
    }
    $changeID = $_POST[$strID];
    $sqlUpdates = $sqlUpdates . "WHERE " . $strID . "=" . $changeID .";";
    echo $sqlUpdates;
    $statement=$pdo->prepare($sqlUpdates);
    $statement->execute();