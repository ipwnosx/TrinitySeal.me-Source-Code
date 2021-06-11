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
		<title>TrinitySeal - Program Settings</title>
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
                <a href="#" class="red active item">Program Settings</a>
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



<div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Current Settings</h2>
                <?php
$result = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$username' AND `id` = '$id'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)){
        $progver = xss_clean($row['version']);
        $progfreemode = xss_clean($row['freemode']);
        $progenabled = xss_clean($row['enabled']);
        $progmessage = xss_clean($row['message']);
        $progdlink = xss_clean($row['downloadlink']);
        $proghash = xss_clean($row['hash']);
        $progfilename = xss_clean($row['filename']);
        $progdevmode = xss_clean($row['developermode']);
        $proghwidlock = xss_clean($row['hwidlock']);
}
                ?>
                <font color="white"><p>Program Version: <?php echo $progver; ?></p></font><br>
                <font color="white"><p>Freemode: <?php echo ($progfreemode == "0" ? "Disabled" : "Enabled"); ?></p></font><br>
                <font color="white"><p>Enabled: <?php echo ($progenabled == "0" ? "False" : "True"); ?></p></font><br>
                <font color="white"><p>Message: <?php echo (empty($progmessage) ? "N/A" : $progmessage); ?></p></font><br>
                <font color="white"><p>Download Link: <?php echo (empty($progdlink) ? "N/A" : $progdlink); ?></p></font><br>
                <font color="white"><p>Program Hash: <?php echo (empty($proghash) ? "N/A" : $proghash); ?></p></font><br>
                <font color="white"><p>File Name: <?php echo (empty($progfilename) ? "N/A" : $progfilename); ?></p></font><br>
                <font color="white"><p>Developer Mode: <?php echo ($progdevmode == "0" ? "False" : "True"); ?></p></font><br>
                <font color="white"><p>HWID Lock: <?php echo ($proghwidlock == "0" ? "False" : "True"); ?></p></font><br>
        </div>
</div>







        <div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <font color = "red"><p><b>Spoofer developers don't need to disable HWID Lock!</b></p></font>
                <h2 class="ui inverted dividing header">Program Settings</h2>
                    <form class="ui form" method="POST" action="">
<?php
if(isset($_POST['updatesettings'])) {
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$freemode = xss_clean(mysqli_real_escape_string($con, $_POST['freemode']));
$enabled = xss_clean(mysqli_real_escape_string($con, $_POST['enabled']));
$message = xss_clean(mysqli_real_escape_string($con, $_POST['message']));
$hash = xss_clean(mysqli_real_escape_string($con, $_POST['hash']));
$filename = xss_clean(mysqli_real_escape_string($con, $_POST['filename']));
$devmode = xss_clean(mysqli_real_escape_string($con, $_POST['devmode']));
$hwidlock = xss_clean(mysqli_real_escape_string($con, $_POST['hwidlock']));

if (!$freemode == 1 && !$freemode == 0){
echo "<div style=\"margin:auto;margin-top:10px;width:900px;\" class=\"ui negative message\">
                    <p>Invalid freemode input!</p>
                </div>";
}
else if (!$enabled == 1 && !$enabled == 0){
echo "<div style=\"margin:auto;margin-top:10px;width:900px;\" class=\"ui negative message\">
                    <p>Invalid freemode input!</p>
                </div>";
}

else if (!$devmode == 1 && !$devmode == 0){
echo "<div style=\"margin:auto;margin-top:10px;width:900px;\" class=\"ui negative message\">
                    <p>Invalid developer mode input!</p>
                </div>";
}
else if (!$hwidlock == 1 && !$hwidlock == 0){
echo "<div style=\"margin:auto;margin-top:10px;width:900px;\" class=\"ui negative message\">
                    <p>Invalid hwid lock input!</p>
                </div>";
}

else {

$addmessage = false;

if(!$message == ""){
  $addmessage = true;
}



if (strlen($message) > 100){
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Message cannot exceed 100 characters!</p>
                </div><br>";
}
else {

if (strlen($hash) > 100) {
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Hash shouldn't exceed 100 characters!</p>
                </div><br>";
}
else {
if (strlen($filename) > 50) {
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>File name shouldn't exceed 50 characters!</p>
                </div><br>";
}
$resultboi = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi) > 0){

if ($addmessage) {
$kekbreh = mysqli_query($con, "UPDATE `programs` SET `freemode` = '$freemode', `enabled` = '$enabled', `message` = '$message', `hash` = '$hash', `filename` = '$filename', `developermode` = '$devmode', `hwidlock` = '$hwidlock' WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if ($kekbreh){
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully updated settings!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='2'; url='".$_SERVER."'>";
                die();
}
}
else {
$epicepic = mysqli_query($con, "UPDATE `programs` SET `freemode` = '$freemode', `enabled` = '$enabled', `message` = '$message', `hash` = '$hash', `filename` = '$filename', `developermode` = '$devmode', `hwidlock` = '$hwidlock' WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if ($epicepic){
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully updated settings!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='2'; url='".$_SERVER."'>";
                die();
}
else{
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div><br>";
}
}
}
}
}
}
}
?>
                    <div class="col-md-3"><strong><font color="white">Freemode:</font></strong></div>
                    <div class="ui action fluid input">
                        <select style="margin:auto; width:970px; margin-bottom: 15px" class="form-control" name="freemode">
                        <option value="0">Disabled</option>
                        <option value="1">Enabled</option>
                      </select>
                    </div>
                    <div class="col-md-3"><strong><font color="white">Enabled:</font></strong></div>
                    <div class="ui action fluid input">
                        <select style="margin:auto; width:970px; margin-bottom: 15px" class="form-control" name="enabled">
                        <option value="1">True</option>
                        <option value="0">False</option>
                      </select>
                    </div>
                    <div class="col-md-3"><strong><font color="white">Developer mode: (disables file hash checks)</font></strong></div>
                    <div class="ui action fluid input">
                        <select style="margin:auto; width:970px; margin-bottom: 15px" class="form-control" name="devmode">
                        <option value="1">True</option>
                        <option value="0">False</option>
                      </select>
                    </div>
                    <div class="col-md-3"><strong><font color="white">HWID Lock: (prevents account sharing)</font></strong></div>
                    <div class="ui action fluid input">
                        <select style="margin:auto; width:970px; margin-bottom: 15px" class="form-control" name="hwidlock">
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                      </select>
                    </div>
                    <div class="col-md-3"><strong><font color="white">Message (leave blank to disable):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="message" placeholder="Message" type="text" value="">
                      </select>
                    </div>
                    <br>
                    <div class="col-md-3"><strong><font color="white">Program Hash (watch tutorial):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="hash" placeholder="Hash" type="text" value="">
                      </select>
                    </div>
                    <br>
                    <div class="col-md-3"><strong><font color="white">File name (e.g. MyProgram.exe):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="filename" placeholder="File name" type="text" value="">
                      </select>
                    </div>
                    <br>
                    <input id="submit" name="updatesettings" type="submit" class="ui fluid red button" value="Apply settings">
                </form>
            </div>
            
            <div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Version Manager</h2>
                    <form class="ui form" method="POST" action="">
<?php

if(isset($_POST['updateversion'])) {
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$download = xss_clean(mysqli_real_escape_string($con, $_POST['downloadlink']));
$version = xss_clean(mysqli_real_escape_string($con, $_POST['version']));

$bop = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($bop) > 0){

$bopp = mysqli_query($con, "UPDATE `programs` SET `version` = '$version', `downloadlink` = '$download' WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if ($bopp){
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully updated version!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='2'; url='".$_SERVER."'>";
}
else{
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div><br>";
}
}
}
?>
                    <div class="col-md-3"><font color="white">**When updating your program, set this to the version in Seal.Initialize() on the new files!**</font></div><br>
                    <div class="col-md-3"><strong><font color="white">Current Version:</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="version" placeholder="Current version" required type="text" value="">
                    </div>
                    <br>
                    <div class="col-md-3"><strong><font color="white">Download link (for your file/dlls in a .zip or .rar):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="downloadlink" placeholder="Download link" required type="text" value="">
                    </div>
                    <br>
                    <input id="submit" name="updateversion" type="submit" class="ui fluid red button" value="Save version">
                </form>
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