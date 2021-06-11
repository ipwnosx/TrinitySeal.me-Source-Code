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
		<title>TrinitySeal - Dashboard</title>
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
                    <a class="red active item">Dashboard</a>
                    <a href="redeemtoken.php" class="red item">Redeem Token</a>
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
        
        <center><img src="logo.png" style="width:350px;height:100px;"></center><br>
        <center><b><font color = "white">Join our new Discord Community server <font color="red"><a href="https://discord.gg/DXvHcVK">here</a></font></font></b></center><br>
        <center><a class="ui red button" href="https://trinityseal.me/purchase.php">Purchase Premium</a></center><br>
        <div class="w3-container">
                <div class="w3-responsive w3-card-4 w3-row-padding">
                <h3 class="ui inverted dividing header">Programs</h3>
                <table class="w3-table w3-striped w3-bordered">
          <thead>
            <tr class="w3-red">
              <th>Application ID</th>
              <th>Application Name</th>
              <th>Application Secret</th>
              <th>Active Users</th>
              <th>Current Version</th>
              <th>Banned</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
              $grabprograms = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($grabprograms)){
              {
                echo '
                <tr>
                <td class="gtext">'.$row['id'].'</td>
                <td class="gtext">'.$row['name'].'</td>
                <td class="gtext">'.$row['authtoken'].'</td>
                <td class="gtext">'.$row['clients'].'</center>  </td>
                <td class="gtext">'.$row['version'].'</td>
                '.($row['banned'] == "1" ? "<td class = 'w3-text-red'>Banned</td>" : "<td class = 'w3-text-red'>Not Banned</td>") .'
                <td>
                <a href="programs?id='.$row['id'].'" class="w3-button w3-red">Program Panel</a>
                <br class="w3-hide-large">
                <br class="w3-hide-large">
                <a class="w3-button w3-red" onclick="document.getElementById(\'deactive#'.$row['id'].'\').style.display=\'block\'">Deactivate</a>
                <div id="deactive#'.$row['id'].'" class="w3-modal">
                  <div class="w3-modal-content w3-card-4">
                    <header class="w3-container w3-red w3-card-4">
                      <h2>Deactive Application</h2>
                      <span onclick="document.getElementById(\'deactive#'.$row['id'].'\').style.display=\'none\'"
                      class="w3-button w3-display-topright">X</span>
                    </header>
                    <form class="w3-container" method="POST">
                      <p style="color: red;">***Please enter the name of the app you are trying to delete***</p>
                      <div class="w3-section">
                        <input class="w3-input" type="hidden" name="secret" value="'.$row['id'].'">
                        <input class="w3-input" type="text" name="name" required="">
                        <label>Application Name</label>
                      </div>
                      <div class="w3-row">
                        <div class="w3-half">
                          <input id="submit" name="deactivateapp" type="submit" class="w3-button w3-red" value="Deactivate">
                          <br>
                          <br>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                </td>'
                ;
              }
          }
              ?>
            </tr>
          </tbody>
        </table>
                <br>
            </div>
            <br>
        <div class="ui container">
            <div style="margin:auto; width:700px; margin-bottom: 15px" class="ui inverted segment">
                <?php
                if(isset($_POST['createapp'])) {
$auth = GenerateAuthToken();
$programname = xss_clean(mysqli_real_escape_string($con, $_POST['programname']));

if (trim($programname) == '' || strlen($programname) <= 0)
{
 echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Program name cannot be empty!</p>
                </div>";
}
else {

$name_check = mysqli_query($con, "SELECT `name` FROM `programs` WHERE `name` = '$programname'") or die(mysqli_error($con));
$do_name_check = mysqli_num_rows($name_check);
if($do_name_check > 0){
    
    echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Program name already taken!</p>
                </div>";
}
else{
$kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));

$grabinfo = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$kek'") or die(mysqli_error($con));
            while($row = mysqli_fetch_array($grabinfo)){
            $subscription = $row['premium']; 
            }

$count_check = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek'") or die(mysqli_error($con));
$do_count_check = mysqli_num_rows($count_check);
$boolcheck = 1;
if ($subscription == "0") {
if($do_count_check >= 3){
$boolcheck = 0;
echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>You cannot have more than 3 programs! Purchase premium to remove this limit.</p>
                </div>";
}
}
if ($subscription == "1") {
if($do_count_check >= 50){
$boolcheck = 0;
echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>You cannot have more than 50 programs!</p>
                </div>";
}
}
if ($boolcheck == 1) {

    $kek = $_SESSION['username'];
    $query_bruh = mysqli_query($con, "INSERT INTO `programs` (id, owner, name, authtoken, version, banned, clients)
    VALUES ('', '$kek', '$programname', '$auth', 1.0, 0, 0)") or die(mysqli_error($con));
    if ($query_bruh){
        echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui positive message\">
                    <p>Successfully created ". $_POST["programname"] ."!</p>
                </div>";
        echo "<meta http-equiv='Refresh' Content='0'; url='".$_SERVER."'>";
                die();
    }
}
}
}
}

if(isset($_POST['deactivateapp'])) {
$nameeshit = xss_clean(mysqli_real_escape_string($con, $_POST['name']));
$secretshit = xss_clean(mysqli_real_escape_string($con, $_POST['secret']));
$kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$epicc = mysqli_query($con, "SELECT * FROM `programs` WHERE `name` = '$nameeshit' AND `id` = '$secretshit'") or die(mysqli_error($con));

if(mysqli_num_rows($epicc) < 1){      
 echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui negative message\">
                    <p>Incorrect program name!</p>
                </div>";
    }
    else {
$grabprograms = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($grabprograms)){
$epicbruhhh = $row['authtoken'];
}
$cleantokens = mysqli_query($con, "DELETE FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$epicbruhhh'") or die(mysqli_error($con));

if (cleantokens) { 

$query_lel = mysqli_query($con, "DELETE FROM `programs` WHERE `name` = '$nameeshit' AND `id` = '$secretshit'");
if ($query_lel){

echo "<div style=\"margin:auto;margin-top:10px;width:670px;\" class=\"ui positive message\">
                    <p>Successfully deleted your program!</p>
                </div>";
                echo "<meta http-equiv='Refresh' Content='0'; url='".$_SERVER."'>";
                die();
    }
  }
}
}
                ?>
                <h2 class="ui inverted dividing header">Create Program</h2>
                    <form class="ui form" method="POST" action="">
                    <div class="ui action fluid input">
                        <input id="text" name="programname" placeholder="Program name" required type="text" value="">
                    </div>
                    <br>
                    <input id="submit" name="createapp" type="submit" class="ui fluid red button" value="Create">
                </form>
            </div>
            <br><br>
            <center><font color = "red">TrinitySeal reserves the right to remove any programs that we deem malicious (viruses, rats, trojans etc.)</font></center>
             <center><font color = "red">Read about our policies <font color="white"><a href="https://trinityseal.me/terms">here</a></font></font></center>
            <?php

function GenerateAuthToken() {
    for($i = 0; $i < 1; $i++) {
      $randomString = "";
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      for ($i = 0; $i < 45; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
  }

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