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
        <title>Status panel</title>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css" >
    </head>
    <body>
        <div class="page-header justify-content-center">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Server status panel</h1>
        </div>
        <div class="row justify-content-center">
            <form method="POST">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last seen</th>
                    <th scope="col">Working status</th>
                    <th scope="col">Issue status</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
           
        <?php
    
            $quest = "select * from status";
            $query = mysqli_query($link, $quest);
            while($row = mysqli_fetch_array($query)){
                echo '<tbody><tr>';
                echo '<th scope="row"> '.$row['id'].'</th>';
                echo '<td>'.$row['model'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['status'].'</td>';
                echo '<td>'.$row['notification'].'</td>';
                echo '<td><a href="changeState.php?id='.$row['id'].'"><button type="button" class="btn btn-outline-dark">Checked</button></a></td>';
                echo '</tr></tbody>';
            }

        ?>
         </table>
        </form>
        </div>
       
        <p>
            <a href="logout.php" class="btn signoutbtn btn-danger">Sign Out </a>
        </p>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>