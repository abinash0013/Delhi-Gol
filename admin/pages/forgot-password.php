<?php
    include('../config.php');
    if(isset($_POST["email"]) && (!empty($_POST["email"]))){
        $email = $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $error .="<p>Invalid email address please type a valid email address!</p>";
        }else{
            $sel_query = "SELECT * FROM `tbl_admin` WHERE email='".$email."'";
            $results = mysqli_query($con,$sel_query);
            $row = mysqli_num_rows($results);
            if ($row==""){
            $error .= "<p>No user is registered with this email address!</p>";
        }
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div>
        <br /><a href='javascript:history.go(-1)'>Go Back</a>";
    }else{
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5(2418*2+$email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
    
        // Insert Temp Table
        mysqli_query($con,
        "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');"); // changes need
         
        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="https://www.allphptricks.com/forgot-password/reset-password.php? // changes need
        key='.$key.'&email='.$email.'&action=reset" target="_blank">
        https://www.allphptricks.com/forgot-password/reset-password.php
        ?key='.$key.'&email='.$email.'&action=reset</a></p>'; 
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser.
        The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action 
        is needed, your password will not be reset. However, you may want to log into 
        your account and change your security password as someone may have guessed it.</p>';   
        $output.='<p>Thanks,</p>';
        $output.='<p>AllPHPTricks Team</p>';
        $body = $output; 
        $subject = "Password Recovery - AllPHPTricks.com";
        $email_to = $email;
        $fromserver = "noreply@yourwebsite.com"; 
        require("PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "mail.yourwebsite.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@yourwebsite.com"; // Enter your email here
        $mail->Password = "password"; //Enter your password here
        $mail->Port = 25;
        $mail->IsHTML(true);
        $mail->From = "noreply@yourwebsite.com";
        $mail->FromName = "AllPHPTricks";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if(!$mail->Send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "<div class='error'>
            <p>An email has been sent to you with instructions on how to reset your password.</p>
            </div><br /><br /><br />";
        }
    }
}
else{
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Forgot Password - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form>
                    <div class="login-form-head">
                        <h4>Forgot Password</h4>
                        <p>Hey! Forgot Password Your Password ? Reset Now</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="exampleInputEmail1">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area mt-5">
                            <button id="form_submit" type="submit">Reset <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>