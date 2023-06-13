<?php 
    include('includes/dbaccess.php');
    include_once 'index.php';

    echo    '<table>
            <thead>
            <tr>';
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
                
                foreach($tableHead as $header){
                    
                    echo '<th>';
                    echo $header->COLUMN_NAME;
                    echo '</th>';
                    array_push($arrHead, $header->COLUMN_NAME);
                }
                $col=count($arrHead);
    
    echo    '</tr>
        </thead>'; 
        // SQL Code eingeben
        $sql="SELECT * FROM ". $table . " ;";
        // Query wird abgefragt
        $statement = $pdo->prepare($sql);
        //führt das SQL Statement aus
        $statement->execute();

        // Resultat wird angenommen. FETCH_OBJ gibt dabei ein Array welches die Daten in Form eines Objektes zurückgibt
        $results = $statement->fetchAll();
        if($results)
        {
            foreach($results as $row)
            {
                
                    '<tr>';
                    for ($i=0; $i<$col;){ 
                    echo '<td>';
                    echo $row[$arrHead[$i]];
                    echo '</td>';                        
                    $i++; }
                    echo '</tr>';
                    
            }
        }
        else
        {
            echo    '<tr>
                    <td colspan "5">No Record Found</td>
                    </tr>';
        }
        
        echo '</table>';
    
        /*function create($table, $pdo){
            //Read funktion wird abgefragt um den User übersicht über die bisherigen Daten zu geben
            read($table, $pdo);
                //Attribute für den Neuen Datensatz abfragen
                $hsql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '". $table . "';";
                $statement=$pdo->prepare($hsql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_OBJ);
                $tableHead =  $statement->fetchAll();
                $arrHead=[];
                $current = $table;
                //Formular generieren
                
                foreach($tableHead as $header){
                    echo '<input id="' . $header->COLUMN_NAME . '" type="text" name="' . $header->COLUMN_NAME . '" placeholder="' . $header->COLUMN_NAME . '"><br>';
                    array_push($arrHead, $header->COLUMN_NAME);
                }
                $col=count($arrHead);
      
                //SQL Code aus den Formular erstellen
                $test = "'INSERT INTO '". $table ." (";
                for ($i=0; $i<$col; ){
                    echo $i;
                    if ($i === $col-1){
                    $test = $test . $arrHead[$i].")";
                }
                    else {
                        $test = $test . $arrHead[$i].", ";
                    }
                    $i++;
                }
                $test = $test . " VALUES (";
                
                echo $test;
            
        }

        function update($table, $pdo){
            read($table, $pdo);
            echo "this will update data";
        }

        function delete($table, $pdo){
            read($table, $pdo);
            echo "this will delete data";
        }

        $userchoice=$_POST["userchoice"];
        $table=$_POST["tables"];

        if ($userchoice=== 'create'){
            create($table, $pdo);
        }
        elseif($userchoice==='read'){
            read($table, $pdo);
        }
        elseif($userchoice==='update'){
            update($table, $pdo);
        }
        elseif($userchoice==='delete'){
            delete($table, $pdo);
        } */