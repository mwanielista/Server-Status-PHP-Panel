<?php
   $link = mysqli_connect('', '', '', '');

   $date = date("Y-m-d H:i:s");
   $minute = substr($date, -5,2);
   $hour = substr($date, -8,2);
   
   sleep(30);
   $quest = "select * from status";
   $query = mysqli_query($link, $quest);
   while($row = mysqli_fetch_array($query)){
       $m = substr($row['date'], -5,2);
       $h = substr($row['date'], -8,2);
          if($m != $minute){
            $zap = "update status set status='Stopped' where id=".$row['id'];
            mysqli_query($link, $zap);
            
            if($row['notification'] == null){
                        require_once('PHPMailer/PHPMailerAutoload.php');
                        $mail = new PHPMailer();
                        $mail -> isSMTP();
                        $mail -> SMTPAuth = true;
                        $mail -> SMTPSecure = 'ssl';
                        $mail -> Host = 'smtp.gmail.com';
                        $mail -> Port = '465';
                        $mail -> isHTML();
                        $mail -> Username = 'email@gmail.com';
                        $mail -> Password = 'password';
                        $mail -> setFrom('support@wanielista.eu');
                        $mail -> Subject = 'Check '.$row['model'].' server! ';
                        $mail -> Body = 'Server '.$row['model'].' was seen last at '.$row['date'].'. Check it!';
                        $mail -> AddAddress('michal.wanielista20@gmail.com');
                        $mail -> Send();
                        
                        $updateNotification = "UPDATE status SET notification='To check' where id=".$row['id'];
                        mysqli_query($link, $updateNotification);
            }
        }

    }
          

  mysqli_close($link);

?>
 