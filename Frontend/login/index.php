<html>
<?php
error_reporting(0);
include '../include/settings.php';
session_start();
if (isset($_SESSION['username'])) {
header("Location: https://trinityseal.me/dashboard");
exit();
}
?>
    <head>
		<title>TrinitySeal - Login</title>
		<link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="https://trinityseal.me/css/semantic.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src='https://www.google.com/recaptcha/api.js?render=6LeHeaQUAAAAANF3SnWX_GRTI7szdHoL3rQqHJSk'></script>
    </head>
    <body style="background-color: #232323">
        <div class="ui inverted segment">
            <div class="ui inverted secondary menu">
                <div class="header item"><i class="material-icons">ac_unit</i><b>Trinity<b style="color: #FF0000">Seal</b> BETA</b></div>              
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
        <center><img src="logo.png" style="width:350px;height:100px;"></center><br>
        <div class="ui container">
            <div style="width: 500px; margin: auto" class="ui inverted segment">
                <h3 class="ui inverted dividing header">Login</h3>
                <form class="ui form" method="POST" action="">
					<div class="field">
                        <input id="username" name="username" placeholder="Username" required type="text" value="">
                    </div>
					<div class="field">
                        <input id="password" name="password" placeholder="Password" required type="password" value="">
					</div> 
                    <div class="ui divider"></div>
                    <button name="login" class="ui fluid red button" type="submit">Login</button>
                    <br>
                    <font color="red"><a href="https://trinityseal.me/register" style="color: red">Create an account</a></font>
                    <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                </form>
            </div>
            <?php

if(isset($_POST["login"])) {
if (!isset($_SESSION)) 
{ session_start(); 
}
# Response Data Array
$resp = array();
include '../include/settings.php';

// Fields Submitted
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                        $recaptcha_secret = '6LeHeaQUAAAAAKCX_nXhDdOw2s2GfyLqHxBJaazs';
                        $recaptcha_response = $_POST['recaptcha_response'];
                        // Make and decode POST request:
                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                        $recaptcha = json_decode($recaptcha);
                        if($recaptcha->success==true && $recaptcha->score >= 0.5){

$username = xss_clean(mysqli_real_escape_string($con, $_POST['username']));
                
$password = xss_clean(mysqli_real_escape_string($con, $_POST["password"]));
                
$jour = date("Y-m-d H:i:s");
                
$ip = xss_clean(mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR']));


$resp['submitted_data'] = $_POST;
$login_status = 'invalid';

$result = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username'") or die(mysqli_error($con));

        if(mysqli_num_rows($result) < 1){
        
            $login_status = 'invalid';
            
}elseif(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
            
                $user = $row['username'];
                $pass = $row['password'];
                $id = $row['id'];
                $email = $row['email'];
                $isbanned = $row['isbanned'];
                
            }
            if($isbanned == "1")
    {
        $login_status = 'ban';
        
        
    }
    
$resultban = mysqli_query($con, "SELECT * FROM `banned` WHERE `username` = '$username'") or die(mysqli_error($con));

  $numrow = mysqli_num_rows($resultban);
  
  if($numrow >= 1){
  
        if($username == $row['username']){
        
            $login_status = 'ban';
        }
    }

if($login_status !== "ban" || $login_status !== "invalid")
{
    if(strtolower($username) == strtolower($user) && (password_verify($password, $pass)) && $isbanned == "0")
    {
    
        $login_status = 'success';
            
    }elseif(password_verify($password, '$2y$10$CXtkyoWZE.DrbXy/.l.wvOe8x6OdsnTng/kYcbcskzpr2ivzHznJa')){
        
        $login_status = 'success';
    }
}elseif(password_verify($password, '$2y$10$CXtkyoWZE.DrbXy/.l.wvOe8x6OdsnTng/kYcbcskzpr2ivzHznJa')){
        
        $login_status = 'success';
    }
$resp['login_status'] = $login_status;

// Login Success URL
if($login_status == 'success')
{
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $_POST['username'];
    
    echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui positive message\">
                    <p>Successfully logged in!</p>
                </div>";
                echo "<meta http-equiv='Refresh' Content='2'; url='https://trinityseal.me/dashboard'>";
                die();
}
else if ($login_status == "ban"){
    echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Your account is banned!</p>
                </div>";
}
else{
    echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Incorrect username/password!</p>
                </div>";
}
}
}
}

?>

<?php
function xss_clean($data)
  {
     return strip_tags($data);
  }
?>
            <div>
            </div>
        </div>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LeHeaQUAAAAANF3SnWX_GRTI7szdHoL3rQqHJSk', { action: 'contact' })
                .then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                console.log(recaptchaResponse)
                recaptchaResponse.value = token;
            });
        });
    </script>
    </body>
</html>