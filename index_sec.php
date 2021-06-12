<?php 
    include 'config.php'; 
?>
 
<?php  
    $current_date=date("Y-m-d");
    $resultdata = $con->query("SELECT * from `tbl_luckyNumber` where date='$current_date' order by lnId desc");
    $result = array();
    $currentnumber=null;
    $i=0;
    while($row = mysqli_fetch_array($resultdata)) {
        $result[] = $row ;
        if($i == 0){
        $currentnumber=$row['luckyNumber'];
        }
        $i=1;
    }
    $digit1=$currentnumber / 10;
    $digit2=$currentnumber % 10;
?> 

<?php 
    $startdate=$_GET['startDate'];
    $enddate=$_GET['endDate'];
    $resultdata = $con->query("SELECT * from `tbl_luckyNumber` where date BETWEEN '$startdate' AND '$enddate'");
    $result1 = array();
    while($row = mysqli_fetch_array($resultdata)) {
        $result1[] = $row;
    }
?> 

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
    <body>
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
                    <a href="/" class="logo"><h1>Delhi golden lottery</h1></a>                     
                    <div class="refresh-button"><i class="fa fa-refresh" aria-hidden="true" onclick='http://delhigoldenlottery.com/'></i></div>
                </div>    
            </div>
        </header>
        <!-- header section finished -->
        
        <!-- banner section start -->
        <section class="banner">
            <div class="slider">
                <div class="slide" style="background-image:url(img/banner_one.jpg);"></div>
            </div>
            <div class="spin-div"> <img src="img/img1.png" class="loader" />
                <figure class="ball"><span><?php echo $currentnumber; ?></span></figure>
            </div>
            <div class="circle-left"><img src="img/img1.png" class="loader" /><span><?php echo substr($digit1, 0, 1) ; ?></span></div>
            <div class="circle-right"><img src="img/img1.png" class="loader" /><span><?php echo $digit2; ?></span></div>
        </section>
        <section class="market-section">
            <div class="container">
                <div class="advertise">                     
              <?php
                   $markets="";
                    foreach($result as $value){
                        if($value['startingTime'] == '10:05 AM'){
                             $markets="MARKET OPEN";
                       }
                       if($value['startingTime'] == '05:05 PM'){
                             $markets="MARKET CLOSE";
                       }
                      }
              ?>
                     <p style="color: #c55511; font-weight: bold;"><?php echo $markets; ?></p>
                </div>
                <div class="result-section">
                    <div class="mid">
                        <h2>Today Results</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="lucky-number-section">
            <div class="container">
                <ul class="row">
                    <?php foreach($result as $val){?>
                        <li class="col-4 text-center">
                            <div class="text">
                                <h3><?php echo $val['startingTime']; ?></h3>
                                <div class="number-cover">
                                    <h2 style="color:red"><?php echo $val['luckyNumber'] ?></h2>
                                    <h4 style="color:red"><?php echo $val['luckyNumber'] ?></h4>
                                </div>
                            </div>
                        </li> 
                    <?php }?>
                </ul>
            </div>
        </section>
        <section>
            <!-- <div class="row result-banner"> -->
            <div class="row result-banner">
                <div class="col-12">
                    <img src="img/result-banner.jpg" style="width:100%; background-repeat: no-repeat;">
                    <p class="result-text">Search Result</p>
                    <img src="img/result-icon.png" alt="" class="result-icon">
                </div>
            </div>
        </section>
        <div class="filterResult-section">
            <div class="container">
                <div class="search-box">
                    <form action="" method="GET" >                
                        <div class="dropdown-flter">
                            <input name="startDate" type="date" value="<?php echo $startdate; ?>"> 
                            <input  name="endDate" type="date"  value="<?php echo $enddate; ?>">  
                            <button type="submit" class="btn_search">Search</button>
                      	</div>
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead style="background-color: #21155f;color: #fff">
                        <tr>
                            <th>Time</th>
                            <th>Lucky Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result1 as $val){?>
                            <tr>
                                <td><?php echo $val['date'] ?>, <?php echo $val['startingTime'] ?></td>
                                <td style="color:red"><?php echo $val['luckyNumber'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="prev-result-section">
            <h2 class="pre-result-header">Previous Results</h2>
        </div>
        <section>
            <div class="container">
                <div class="row text-center previous-result-history">
                    <div class="col-2 inner-result-box" style="margin: 10px;">
                        <a href="history.php?startDate=2018-01-01&&endDate=2018-12-31" style="color:#fff"><p>2018</p></a>
                    </div>
                    <div class="col-2 inner-result-box" style="margin: 10px;">
                        <a href="history.php?startDate=2019-01-01&&endDate=2019-12-31" style="color:#fff"><p>2019</p></a>                 
                    </div>
                    <div class="col-2 inner-result-box" style="margin: 10px;">
                        <a href="history.php?startDate=2020-01-01&&endDate=2020-12-31" style="color:#fff"><p>2020</p></a>
                    </div>
                    <div class="col-2 inner-result-box" style="margin: 10px;">
                        <a href="history.php?startDate=2021-01-01&&endDate=2021-12-31" style="color:#fff"><p>2021</p></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="disclaimer">
        	<div class="container">
            	<div class="col-12 text-center">
                  	<p><strong>Disclaimer :</strong> Purchase of lottery using this website is strictly prohibited in the states where lotteries are Strickly banned. To Play this Online Lottery You must be atleast 18 years Old.</p>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <p>© copyright 2021. All Rights Reserved.</p>
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </footer>
        <a href="history.html" class="sidebtn">Result History</a>
        <script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="/js/custom.js" type="text/javascript"></script>
        <script src="/js/slick.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="administration/scripts/jquery.syotimer.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#periodic-timer_period_minutes').syotimer({
                  year: '2020',
                  month: '06',
                  day: '08',
                  hour: '15',
                  minute: '00',
                  periodic: false,
                  layout: 'ms',
                  periodUnit: 'd'
                });
            })
        </script>
        <script type="text/javascript">
            function refreshPage(){
                location.reload();								
            }
        </script>
    </body>
</html>