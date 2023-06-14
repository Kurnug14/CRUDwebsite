<?php
    include('dbaccess.php');
    session_start();
    $table = $_SESSION['table'];
    $delID = $_POST["id"];
    
    //ID Feststellen
    $sqlid = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$table."' LIMIT 1;";
    $statement=$pdo->prepare($sqlid);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $resID =  $statement->fetchAll();
    $strID = $resID[0]-> COLUMN_NAME;
    $sqlDelete = 'DELETE FROM '. $table . ' WHERE ' .$strID.' ='.$delID.';';
    echo $sqlDelete;

    $statement=$pdo->prepare($sqlDelete);
    $statement->execute();
    header('Location: ../dbcreate.php');