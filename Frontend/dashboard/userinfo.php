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
		<title>TrinitySeal - User Information</title>
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
                     <a href="redeemtoken.php" class="red item">Redeem Token</a>
                    <a class="red active item">User Info</a>
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
        <center>
            <?php
            
            $grabinfo = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username'") or die(mysqli_error($con));
            while($row = mysqli_fetch_array($grabinfo)){
            $email = xss_clean(mysqli_real_escape_string($con, $row['email']));
            $subscription = $row['premium'];
            
            $programcount = mysqli_query($con, "SELECT count('id') FROM `programs` WHERE `owner` = '$username'") or die(mysqli_error($con));
            $row1=mysqli_fetch_array($programcount);
            
            $tokencount = mysqli_query($con, "SELECT count('id') FROM `tokens` WHERE `owner` = '$username'") or die(mysqli_error($con));
            $row2=mysqli_fetch_array($tokencount);
            }
            ?>
        <div class="ui container">
                <div class="column">
                    <div class="ui inverted segment">
                        <h3 class="ui inverted dividing header">Account Info</h3>
                        <p><b>Email: <?php echo $email; ?></p>
						<p><b>Username: </b><?php echo $username; ?></p>
						<p><b>Subscription: </b><?php echo ($subscription == "1" ? "<span style=\"color: #008000;text-shadow: 0px 0px 10px #16AB39;\"><strong>Premium</strong></span>" : "Free") ?></p>
						<p><b>Total Programs: <?php echo $row1[0]; echo ($subscription == "1" ? "/50" : "/3"); ?></p>
						<p><b>Total Tokens: <?php echo $row2[0]; echo ($subscription == "1" ? "/10,000" : "/100"); ?></p>
                    </div>
			</div>
        </div>
        </center>
        
         <div class="ui container">
             <div style="margin:auto; width:700px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Change Password</h2>
                <?php
            if(isset($_POST['updatepass'])) {
                $currentpass = xss_clean(mysqli_real_escape_string($con, $_POST['currentpass']));
                $newpass = xss_clean(mysqli_real_escape_string($con, $_POST['newpass']));
                $confnewpass = xss_clean(mysqli_real_escape_string($con, $_POST['confnewpass']));
                $username = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                
                if ($newpass == $confnewpass){
                    $result = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username'") or die(mysqli_error($con));
                     while($row = mysqli_fetch_array($result)){
                         $pass = $row['password'];
                     }
                     if (password_verify($currentpass, $pass)){
                         if (strlen($newpass) <= 6){
                             echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>New password must be longer than 6 characters!</p>
                    </div><br>";
                         }
                         else {
                         $pass_encrypted = password_hash($newpass, PASSWORD_BCRYPT);
                         $update = mysqli_query($con, "UPDATE `owners` SET `password` = '$pass_encrypted' WHERE `username` = '$username'") or die(mysqli_error($con));
                         echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui positive message\">
                    <p>Successfully update password! Resetting session, please log back in!</p>
                    </div><br>";
                         session_destroy();
                         header("refresh:2; url=https://trinityseal.me/login");
                         }
                     }
                     else{
                         echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Current password doesn't match!</p>
                    </div><br>";
                     }
                }
                else{
                    echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>New passwords don't match!</p>
                    </div><br>";
                }
            }
            ?>
                    <form class="ui form" method="POST" action="">
                    <div class="ui action fluid input">
                        <input id="text" type="password" name="currentpass" placeholder="Current password" required type="text" value="">
                    </div>
                    <br>
                    <div class="ui action fluid input">
                        <input id="text" type="password" name="newpass" placeholder="New password" required type="text" value="">
                    </div>
                    <br>
                    <div class="ui action fluid input">
                        <input id="text" type="password" name="confnewpass" placeholder="Confirm new password" required type="text" value="">
                    </div>
                    <br>
                    <input id="submit" name="updatepass" type="submit" class="ui fluid red button" value="Update password">
                </form>
            </div>
        
            <?php

  function xss_clean($data)
  {
     return strip_tags($data);
  }
?>
            
            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    </body>
</html>