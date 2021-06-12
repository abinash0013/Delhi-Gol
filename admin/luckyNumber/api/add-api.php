<?php

    include './../../config.php';
    $current_date=date("Y-m-d");
    $date = $_POST['date'];
    $startingTime = $_POST['time'];
    $endingTime = $_POST['endingTime'];
    $luckyNumber = $_POST['luckyNumber'];

   $resultdata = $con->query("SELECT * from `tbl_luckyNumber` where date='$current_date' AND startingTime='$startingTime'");
   
    $i=0;
    while($row = mysqli_fetch_array($resultdata)) {
    $i=1;
    }
    if($date == null){
        $rsp->status = "202";
        $rsp->message = 'Please select date';
    }
     else if($luckyNumber == null){
        $rsp->status = "202";
        $rsp->message = 'Please enter number';
    }
    else if($i == 1){
        $rsp->status = "202";
        $rsp->message = 'This time is already added';
    }else{
          $insert = $con->query("INSERT INTO `tbl_luckyNumber`(`date`, `startingTime`,  `luckyNumber`) VALUES ('$date','$startingTime', '$luckyNumber')");

          $res->success = false;
          if($insert > 0){ 
              $rsp->status = "200";
              $rsp->message = 'Successfully Added';
          }
          else{
              $rsp->status = '204';
              $rsp->message = 'Something Went Wrong';
          }

    }
    echo json_encode($rsp);
?>