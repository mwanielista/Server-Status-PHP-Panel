<?php
    $link = mysqli_connect('', '', '', '');

    $date = date("Y-m-d H:i:s");
    $quest = "UPDATE status SET model='T620 NGINX', date='$date', status='Working', notification='' where id=2";
    mysqli_query($link, $quest);

    mysqli_close($link);

?>
 