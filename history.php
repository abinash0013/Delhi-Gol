<?php 
    include 'config.php'; 
?>

<!-- :::::::::::::::::::::::::::::::::::> Fetch Data Start <::::::::::::::::::::::::::::::::::: -->
<?php 
  $today=date("Y-m-d");
  $startdate=$_GET['startDate'];
  $enddate=$_GET['endDate'];
  $resultdata = $con->query("SELECT * from `tbl_luckyNumber` where date BETWEEN '$startdate' AND '$enddate'");

  $result = array();
  while($row = mysqli_fetch_array($resultdata)) {
      $result[] = $row;
  }
?>
<!-- ::::::::::::::::::::::::::::::::::::> Fetch Data End <:::::::::::::::::::::::::::::::::::: -->

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delhi Golden Lottery</title>
    <link rel="shortcut icon" href="img/fab-icon.png" type="image/x-icon">
    <meta name="keywords" content="delhi golden lottery, Delhigoldenlottery.com, Delhigoldenlottery, delhigolden, delhigoldenlottery, Delhi Golden Lottery, delhi lottery">
    <meta name="description" content="Delhigoldenlottery.com, Delhigoldenlottery">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body class="page2">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173035201-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){ dataLayer.push(arguments); }
      gtag('js', new Date());
      gtag('config', 'UA-173035201-1');
    </script>
    <!-- header section start -->
    <header>
      <div class="marquee-top">
        <div class="row">
          <div class="container">
            <marquee>** WELCOME TO DELHI GOLDEN LOTTERY ** DAILY RESULT AFTER 30 MINUTES 10:05 AM to 05:05 PM **</marquee>
          </div>
        </div>
      </div>
      <div class="bottom-head">
        <div class="container">
          <a href="http://delhigoldenlottery.com/" class="logo"><h1>Delhi golden lottery</h1></a>                     
            <a href="http://delhigoldenlottery.com/"><div class="refresh-button"><i class="fa fa-refresh" aria-hidden="true"></i></div></a>
        </div>    
      </div>
    </header>
      <!-- header section finished -->
      <div class="sec-spacer">
        <div class="container">
          <h2 class="text-center">Results History</h2>
          <table class="table table-bordered table-hover" style="margin: 110px 0px 50px 0px; width: 100%;">
            <thead style="background-color: #21155f;color: #fff">
              <tr>
                <th>Date & Time</th>
                <th>Lucky Number</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($result as $val){?>
              <tr>
                <td><?php echo $val['date'] ?>, <?php echo $val['startingTime'] ?></td>
                  <td style="    color: #21155f; text-align: center; font-weight: bold;"><?php echo $val['luckyNumber'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <footer>
        <div class="container">
          <p>© 2021 Delhi golden lottery. All Rights Reserved.</p>
          <ul class="social">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
          </ul>
        </div>
  </footer>
  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="js/custom.js" type="text/javascript"></script>
  <script src="js/slick.min.js" type="text/javascript"></script>
  <script>
    $(function () {
      $("#datepicker-12").datepicker({
        dateFormat: 'yy-mm-dd'
      });
    });
  </script>
</body>
</html>