<?php
    require_once "config.php";

    $id = $_GET['id'];

    $change = "UPDATE status SET notification='Checked' where id=".$id;

    mysqli_query($link, $change);

    header('Location: admin.php');

?>