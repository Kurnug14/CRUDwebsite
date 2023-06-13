<?php 
include('includes/dbaccess.php');
?>
<!DOCTYPE html>
<head>
    <title>CRUD</title>
</head>
<body>
    <form>
        <label for="tables">What Table?</label>
        <select name ="tables" id="tables">
            <option value = "equipment">Equipment</option>
            <option value = "workout">Workout</option>
            <option value = "excercise">Equipment</option>
            <option value = "musclegroup">Muscle Groups</option>
            <option value = "workoutexcercise">Workout Excercises</option>
            <input type="submit"/>
        </select>
    </form>
    <table>
        <thead>
            <tr>
                <?php 
                $hsql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'excercise';";
                $statement=$pdo->prepare($hsql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_OBJ);
                $tableHead =  $statement->fetchAll();
                $arrHead=[];
                
                foreach($tableHead as $header){
                    ?>
                    <th><?= $header->COLUMN_NAME ?></th>
                    <?php
                    array_push($arrHead, $header->COLUMN_NAME);
                }
                $col=count($arrHead);
                ?>
                

    
            </tr>
        </thead>
    <?php 
        // SQL Code eingeben
        $sql="SELECT * FROM excercise;";
        // Query wird abgefragt
        $statement = $pdo->prepare($sql);
        //führt das SQL Statement aus
        $statement->execute();

        //Gibt die das resultat als Objekt zurück
        $statement->setFetchMode(PDO::FETCH_OBJ);
        // Resultat wird angenommen. FETCH_OBJ gibt dabei ein Array welches die Daten in Form eines Objektes zurückgibt
        $results = $statement->fetchAll();

        if($results)
        {
            foreach($results as $row)
            {
                ?>
                    <tr>
                        <?php for ($i=0; $i<$col;){ ?>
                        <td><?= $row->{$arrHead[$i]}; ?></td>                        
                    <?php $i++; } ?>
                    </tr>
                    <?php  
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan "5">No Record Found</td>
            </tr>
            <?php
        }
        ?>
        </table>
</body>
</html>