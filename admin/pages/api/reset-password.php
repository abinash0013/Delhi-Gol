<?php
include './../../config.php';  
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $setNewPassword = md5($confirmPassword);
    
    
    if($newPassword == $confirmPassword){
    	$edit = $con->query("UPDATE `tbl_admin` SET `password`='$setNewPassword' ");
            if($edit > 0){ 
              $rsp->status = "200";
              $rsp->message = 'Password Reset Successfully';
            }
          else{
              $rsp->status = '204';
              $rsp->message = 'Something Went Wrong';
          }
    }
    else{
          $rsp->status = '400';
          $rsp->message = 'Password Not Matched';
   }
    echo json_encode($rsp);

?>