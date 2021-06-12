<?php
 
        $to = "meenavikash2013@gmail.com";
        $subject ="Delhi Golden Lottery Reset Password";
         
        $message ="Delhi Golden Lottery Reset Your password click link http://delhigoldenlottery.com/admin/pages/7a4051e02fb6284cebe3de0bc6b484417a7a4051e02fb6284cebe3de0bc6b484417a7a4051e02fb6284cebe3de0bc6b484417a.php?/".md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject).md5($subject);
       
        $headers= "meenavikash2013@gmail.com";
               
        mail($to,$subject,$message,$headers);
        
        echo "<p>Please..!!! Check you email Reset Password link is sended on $headers</p>";
                   
?>

<div style="text-align:center">
	<a href="http://delhigoldenlottery.com/admin">Login back</a>
<div>
<style>
  p{    
      padding: 100px;
      font-size: 30px;
      text-align: center;
  }
  a{      
      font-size: 30px;
  }