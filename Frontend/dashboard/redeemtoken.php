<?php
include '../include/settings.php';
error_reporting(0);
if (!isset($_SESSION)) { session_start(); }
$username = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
if (!isset($_SESSION['username'])) {
header("Location: https://trinityseal.me/login");
exit();
}
?>
<html>
    <head>
		<title>TrinitySeal - Redeem Token</title>
		<meta name="keywords" content="Auth,Authentication,.NET,C#,Security">
		<meta property="og:title" content="TrinitySeal">
		<meta name="og:description" content="TrinitySeal - Most secure & easy to use authentication solution."/>
		<meta name="og:image" content="https://trinityseal.me/favicon.jpg"/>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="https://trinityseal.me/css/semantic.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="epic.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
    <style> 
    .gtext {
    color: #CECECE;
    font-size: 100%;
    }
    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #232323; 
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #FF0000; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #FF0000; 
}
    </style>
    </head>
   <body style="background-color: #232323">

        <div class="ui inverted segment">
            <div class="ui inverted secondary menu">
                  <div class="header item"><i class="material-icons">ac_unit</i><b>Trinity<b style="color: #FF0000">Seal</b> BETA</b></div>        
                    <a href="index.php" class="red item">Dashboard</a>
                    <a class="red active item">Redeem Token</a>
                    <a href="userinfo.php" class="red item">User Info</a>
                    <a href="leaderboards.php" class="red item">Leaderboards</a>
                    <a href="announcements.php" class="red item">Announcements</a>
                    <div class="right menu">
                        <a href="/logout" class="red item">Logout</a>
                    </div>
            </div>
        </div>
        <style>
/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 5px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s}
</style>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
</div>
        <?php
        $bancheck = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username' AND `isbanned` = '1'") or die(mysqli_error($con));
if(mysqli_num_rows($bancheck) >= 1){
    echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Your account is banned!</p>
                </div>";
                session_destroy();
        header("refresh:2; url=https://trinityseal.me/");
                die();
}
        ?>
        
        <div class="ui container">
            <center><div class="col-md-3"><strong><font color="white">Redeeming a valid token will give you access to all premium features listed <font color="red"><a href="https://trinityseal.me/purchase.php">here</a></font>!</font></strong></div></center><br>
            <div style="margin:auto; width:700px; margin-bottom: 15px" class="ui inverted segment">
                <?php
                if(isset($_POST['redeemtoken'])) {
                    $token = xss_clean(mysqli_real_escape_string($con, $_POST['token']));
                    $premiumcheck = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username' AND `premium` = '1'") or die(mysqli_error($con));
                    if(mysqli_num_rows($premiumcheck) >= 1){
                        echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Your account is already premium!</p>
                    </div>";
                    }
                    else {
                    $tokencheck = mysqli_query($con, "SELECT * FROM `premium` WHERE `token` = '$token' AND `used` = '0'") or die(mysqli_error($con));
                    if(mysqli_num_rows($tokencheck) >= 1){
                        $updatetoken = mysqli_query($con, "UPDATE `premium` SET `used` = '1', `used_by` = '$username' WHERE `token` = '$token'") or die(mysqli_error($con));
                        if ($updatetoken){
                            $updateuser = mysqli_query($con, "UPDATE `owners` SET `premium` = '1' WHERE `username` = '$username'") or die(mysqli_error($con));
                            if ($updateuser){
                                 echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui positive message\">
                    <p>Your account is now premium!</p>
                    </div>";
                            }
                            else{
                                 echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Failed to set your premium level!</p>
                    </div>";
                            }
                        }
                        else{
                             echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Failed to claim token!</p>
                    </div>";
                        }
                    }
                    else{
                         echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Token doesn't exist!</p>
                </div>";
                    }
                }
                }
                ?>
                <h2 class="ui inverted dividing header">Redeem Token</h2>
                    <form class="ui form" method="POST" action="">
                    <div class="ui action fluid input">
                        <input id="text" name="token" placeholder="Token" required type="text" value="">
                    </div>
                    <br>
                    <input id="submit" name="redeemtoken" type="submit" class="ui fluid red button" value="Redeem">
                </form>
            </div>
            
        
            <?php

  function xss_clean($data)
  {
     return strip_tags($data);
  }
?>
            
            
        </div>
        
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    </body>
</html>