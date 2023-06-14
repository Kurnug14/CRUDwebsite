<?php
     if("" == trim($_POST['table'])){
        echo 'is empty';
     }
     else {
        echo $_POST['table'];
     }