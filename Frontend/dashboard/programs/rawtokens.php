<?php
include 'settings.php';
error_reporting(0);
if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
header("Location: https://trinityseal.me/login");
exit();
}
?>
<html>
    <head>
		<title>TrinitySeal - Raw Token View</title>
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
                   <?php
                   $id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
                   ?>
                   <a href="../" class="red item">Dashboard</a>
                   <a class="red item" href="index.php?id=<?php echo $id; ?>">Hub</a>
                   <a href="tokens.php?id=<?php echo $id; ?>" class="red item">Tokens</a>
                   <a href="users.php?id=<?php echo $id; ?>" class="red item">Users</a>
                    <a href="variables.php?id=<?php echo $id; ?>" class="red item">Variables</a>
                    <a href="filemanager.php?id=<?php echo $id; ?>" class="red item">File Manager</a>
                <a href="programsettings.php?id=<?php echo $id; ?>" class="red item">Program Settings</a>
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
  ???
  </div>
  <div class="snowflake">
  ???
  </div>
  <div class="snowflake">
  ???
  </div>
  <div class="snowflake">
  ???
  </div>
  <div class="snowflake">
  ???
  </div>
  <div class="snowflake">
  ???
  </div>
  <div class="snowflake">
    ???
  </div>
  <div class="snowflake">
    ???
  </div>
  <div class="snowflake">
    ???
  </div>
  <div class="snowflake">
    ???
  </div>
  <div class="snowflake">
    ???
  </div>
  <div class="snowflake">
    ???
  </div>
</div>
<?php
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$username = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$result = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$username' AND `id` = '$id'") or die(mysqli_error($con));
$bancheck = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username' AND `isbanned` = '1'") or die(mysqli_error($con));
if(mysqli_num_rows($bancheck) >= 1){
    echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Your account is banned!</p>
                </div>";
                session_destroy();
        header("refresh:2; url=https://trinityseal.me/dashboard");
                die();
}
while($row = mysqli_fetch_array($result)){
        $isbannedbruh = $row['banned'];
      }
if($isbannedbruh == 1){
echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>This program is banned!</p>
                </div>";
        header("refresh:2; url=https://trinityseal.me/dashboard");
                die();
}
if(mysqli_num_rows($result) < 1){      
 echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Invalid program ID, redirecting...</p>
                </div>";
        header("refresh:2; url=https://trinityseal.me/dashboard");
                die();
}
?>
<?php
$kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
              $idbruh = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
              $epicbreh = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek' AND `id` = '$idbruh'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($epicbreh)){
              $coolepicwin = $row['authtoken'];
              }
?>
        
            <div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <div class="col-md-3"><b><strong><font color="white">Only unused tokens will be shown here!</font></strong></b></div>
                <h2 class="ui inverted dividing header">Raw Tokens</h2>
                <l><b>Lifetime Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '99999' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
                <br><br><l><b>3 Month Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '93' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
                <br><br><l><b>1 Month Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '31' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
                <br><br><l><b>3 Week Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '21' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
                 <br><br><l><b>1 Week Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '7' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
                 <br><br><l><b>3 Day Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '3' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
                 <br><br><l><b>1 Day Tokens</b></l><br>
                <l><b>--------------------</b></l>
                <?php
$lifetime = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin' AND `days` = '1' AND `used` = '0'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($lifetime)){
                echo "<br>".$row["token"]."";
              }
                ?>
                
            </div>
            

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    </body>
<?php
function xss_clean($data)
  {
     return strip_tags($data);
  }
?>
</html>