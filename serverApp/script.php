<?php
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$date = date("Y-m-d H:i:s");
$quest = "UPDATE status SET date='$date', status='good', notification='' where id=1";
mysqli_query($link, $quest);

$checkLog =mysqli_query($link, "SELECT * FROM log WHERE device like 'T620 OBS' AND time_run like ''");
while($row = mysqli_fetch_array($checkLog)){
    mysqli_query($link, "UPDATE log SET time_run='$date' where id like ".$row['id']);
}

mysqli_close($link);

?>
 