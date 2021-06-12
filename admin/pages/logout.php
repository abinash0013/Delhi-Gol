<?php
session_start();
session_unset();
session_destroy();
header("location:http://delhigoldenlottery.com/admin/");

?>