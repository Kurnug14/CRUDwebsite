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

    echo    "<form action=includes\dbdeletor.php method=post >
            <input type='text' name='id' placeholder='enter ID'>
            <input type='submit' value='delete data'>
            </form>";