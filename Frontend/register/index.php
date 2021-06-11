<html>
<?php
include '../include/settings.php';
session_start();
?>
    <head>
		<title>TrinitySeal - Register</title>
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
                <h3 class="ui inverted dividing header">Register</h3>
                <form class="ui form" method="POST" action="">
					<div class="field">
                        <input id="username" name="username" placeholder="Username" required type="text" value="">
                    </div>
                    <div class="field">
                        <input id="email" name="email" placeholder="Email" required type="email" value="">
                    </div>
                    <div class="field">
                        <input id="password" name="password" placeholder="Password" required type="password" value="">
                    </div>
                    <div class="field">
                        <input id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required type="password" value="">
                    </div>
                    <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                    <div class="ui divider"></div>
                    <button name="register" class="ui fluid red button" type="submit">Register</button>
                    <br>
                    <font color="red"><a href="https://trinityseal.me/login" style="color: red">Already registered? Login here!</a></font>
                </form>
            </div>
            <?php
            $register_status = 'success';
            if(isset($_POST['register'])) {
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                        $recaptcha_secret = '6LeHeaQUAAAAAKCX_nXhDdOw2s2GfyLqHxBJaazs';
                        $recaptcha_response = $_POST['recaptcha_response'];
                        // Make and decode POST request:
                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                        $recaptcha = json_decode($recaptcha);
                        if($recaptcha->success==true && $recaptcha->score >= 0.5){
            $username = xss_clean(mysqli_real_escape_string($con, $_POST['username']));
            $password = xss_clean(mysqli_real_escape_string($con, $_POST["password"]));
            $email = xss_clean(mysqli_real_escape_string($con, $_POST["email"]));

            $result = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username'") or die(mysqli_error($con));

            if($_POST["repeatpassword"] !== $password){
               echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Passwords do not match!</p>
                </div>";
            }
            else if(strlen($password) <= 6){
               echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Please use a longer password!</p>
                </div>";
            }
            else if(mysqli_num_rows($result) >= 1){      
            echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Username already taken!</p>
                </div>";
            }
            else if (strlen($username) > 20){
                echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Username too long, maximum length is 20 characters.</p>
                </div>";
            }
            else if (strlen($email) > 40){
                echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Email too long, maximum length is 40 characters.</p>
                </div>";
            }
            else if (strlen($password) > 30){
                echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui negative message\">
                    <p>Password too long, maximum length is 30 characters.</p>
                </div>";
            }
            else{ //all checks passed
               $user_check = mysqli_query($con, "SELECT `username` FROM `owners` WHERE `username` = '$username'") or die(mysqli_error($con));
    
    $do_user_check = mysqli_num_rows($user_check);
    
    if($do_user_check > 0){
    
        $register_status = 'usertaken';

    }
    
    $email_check = mysqli_query($con, "SELECT `email` FROM `owners` WHERE `email` = '$email'") or die(mysqli_error($con));
    
    $do_email_check = mysqli_num_rows($email_check);
    
    if($do_email_check > 0){
    
        $register_status = 'emailtaken';
    
    }
    
    if($register_status == 'success'){
        
    $pass_encrypted = password_hash($password, PASSWORD_BCRYPT);
    
    mysqli_query($con, "INSERT INTO `owners` (id, username, password, email, isbanned)

    VALUES ('', '$username', '$pass_encrypted', '$email', 0)") or die(mysqli_error($con));
        
    $register_status = 'success';
    
    }
    if ($register_status == true){
    echo "<div style=\"margin:auto;margin-top:10px;width:500px;\" class=\"ui positive message\">
                    <p>Successfully registered!</p>
                </div>";
                header("refresh:3; url=https://trinityseal.me/login");
                die();
            }
}
}
    }
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