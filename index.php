
<!DOCTYPE html>
<head>
    <title>CRUD</title>
</head>
<body>
        With which table do you want to interact with?
        
        <select name ="tables" id="table">
            <option value = "equipment" >Equipment</option>
            <option value = "workout">Workout</option>
            <option value = "excercise">Excercises</option>
            <option value = "musclegroup">Muscle Groups</option>
            <option value = "workoutexcercise">Workout Excercises</option>
        </select>
        <form action="dbread.php" method="post" >
        <input type="hidden" name = "tables" id="rtable">
        <input type="submit" value="read the data">
        </form>
        <form action="dbcreate.php" method="post" >
        <input type="hidden" name = "tables" id="ctable">
        <input type="submit" value="create new data">
        </form>
        <form action="dbupdate.php" method="post" >
        <input type="hidden" name = "tables" id="utable">
        <input type="submit" value="update data">
        </form>
        <form action="dbdelete.php" method="post" >
        <input type="hidden" name = "tables" id="dtable">
        <input type="submit" value="delete data">
        </form>
        <p id=test></p>
</button>
    <script type="text/javascript" src="scripts/script.js" >
        </script>
</body>
</html>