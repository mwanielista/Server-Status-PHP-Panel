<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Status panel | LOG</title>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css" >
    </head>
    <body>
    <h1>Log</h1>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Device</th>
            <th scope="col">Time stopped</th>
            <th scope="col">Time started</th>
            </tr>
        </thead>
        <tbody>
           
            <?php
    
            $query = mysqli_query($link, "select * from log");
            while($row = mysqli_fetch_array($query)){
                echo '<tbody><tr>';
                echo '<th scope="row"> '.$row['id'].'</th>';
                echo '<td>'.$row['device'].'</td>';
                echo '<td>'.$row['time_stopped'].'</td>';
                echo '<td>'.$row['time_run'].'</td>';
                echo '</tr></tbody>';
            }

?>
        </tbody>
    </table>
       
        <p>
            <a href="admin.php" class="btn signoutbtn btn-success">Back to admin </a>
            <a href="logout.php" class="btn signoutbtn btn-danger">Sign Out </a>
        </p>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>