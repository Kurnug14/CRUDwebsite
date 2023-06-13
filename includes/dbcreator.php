<?php 
    session_start();
    include('dbaccess.php');
    

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
    
    //SQL Code generieren

    $sqlValues="INSERT INTO ".$table." (";

    foreach($tableHead as $header){
        array_push($arrHead, $header->COLUMN_NAME);
        
        }
        $col = count($arrHead);
    for($i = 0; $i <= $col-1; $i++){
        if($i===$col-1){
            $sqlValues= $sqlValues . $arrHead[$i] .") ";
            }
        else{
            $sqlValues= $sqlValues . $arrHead[$i] .", ";
        }
    }

        $sqlValues=$sqlValues."VALUES (NULL, ";
    for($i = 1; $i < $col; $i++){
        $val = $_POST[$arrHead[$i]];
        if($i===$col-1){
            $sqlValues= $sqlValues . "'" . $val . "'" .")";

            }
        else{
            $sqlValues= $sqlValues . "'" . $val . "'" .", ";
            }
        }
    $statement=$pdo->prepare($sqlValues);
    $statement->execute();
    header('Location: ../dbcreate.php');
        //echo $sqlValues;

    /*//SQL Code generieren
    $sqlValues="INSERT INTO ".$tables." (";
    foreach($tableHead as $header){
        array_push($arrHead, $header->COLUMN_NAME);
        
        }
        $col = count($arrHead);
        for($i = 0; $i <= $col-1; $i++){
            if($i===$col-1){
            $sqlValues= $sqlValues . $arrHead[$i] .") ";
            }
            else{
            $sqlValues= $sqlValues . $arrHead[$i] .", ";}
            }

        $sqlValues=$sqlValues."VALUES (NULL, ";

    for($i = 1; $i <= $col-1; $i++){
        if($i===$col-1){
        $sqlValues= $sqlValues . $i .")";
        }
        else{
        $sqlValues= $sqlValues . $i .", ";}
        }
    echo $sqlValues;*/