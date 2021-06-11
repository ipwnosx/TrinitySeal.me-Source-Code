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
		<title>TrinitySeal - Users</title>
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
                    <a href="#" class="red active item">Users</a>
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
<?php 
if (isset($_POST['generatetoken'])) {
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$type = xss_clean(mysqli_real_escape_string($con, $_POST['type']));
$level = xss_clean(mysqli_real_escape_string($con, $_POST['level']));
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$tokenn = GenerateToken();

$resultboi = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$username' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi) > 0){

      while($row = mysqli_fetch_array($resultboi)){
        $bruhtoken = $row['authtoken'];
      }
}
else{
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid program ID or session username!</p>
                </div>";
}



if ($type == "1"){
  $type = 1;
}
else if ($type == "2"){
  $type = 3;
}
else if ($type == "3"){
  $type = 7;
}
else if ($type == "4"){
  $type = 21;
}
else if ($type == "5"){
  $type = 31;
}
else if ($type == "6"){
  $type = 93;
}
else if ($type == "7"){
  $type = 99999;
}
else{
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid token type!</p>
                </div>";
  die();
}

if ($level > 10 || $level <= 0){
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid token level!</p>
                </div>";
  die();
}
$epicc2 = mysqli_query($con, "SELECT * FROM `tokens` WHERE `program` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($epicc2) >= 100) {     
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You cannot generate more than 100 tokens! Purchase premium to remove this limit.</p>
                </div>";
}
else {

$epicc1 = mysqli_query($con, "SELECT * FROM `programs` WHERE `id` = '$id'") or die(mysqli_error($con));

if(mysqli_num_rows($epicc1) < 1){      
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid program ID!</p>
                </div>";
}
else{
$insertlol = mysqli_query($con, "INSERT INTO `tokens` (id, token, owner, program, days, used, used_by, level, programtoken) 
  VALUES ('', '$tokenn', '$owner', '$id', '$type', 0, '', '$level', '$bruhtoken')") or die(mysqli_error($con));
if ($insertlol){
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Success! Token: ". $tokenn ."</p>
                </div>";
                echo "<meta http-equiv='Refresh' Content='3'; url='".$_SERVER."'>";
                die();
}
else{
  echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div>";
}
}
}
}



function GenerateToken() {
    for($i = 0; $i < 1; $i++) {
      $randomString = "";
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
  }
?>

                <?php
if (isset($_POST['deletetoken'])){
                $boi = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                $epicfortnitewinmoment = xss_clean(mysqli_real_escape_string($con, $_POST['secret']));
                $bruhmoment = mysqli_query($con, "DELETE FROM `tokens` WHERE `owner` = '$boi' AND `token` = '$epicfortnitewinmoment'") or die(mysqli_error($con));
                if ($bruhmoment){
                  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully deleted token!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='1'; url='".$_SERVER."'>";
                }
                else{
                  echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div><br>";
                }
              }
                ?>
            <tr>
              <?php
              $kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
              $idbruh = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
              $epicbreh = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek' AND `id` = '$idbruh'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($epicbreh)){
              $coolepicwin = $row['authtoken'];
              }

              $grabprograms = mysqli_query($con, "SELECT * FROM `tokens` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($grabprograms)){
              {
                if ($row['used_by'] == ""){
                  $kekloll = "N/A";
                }
                else{
                  $kekloll = $row['used_by'];
                }
              }
              }
              ?>

        <div class="ui container">
            <?php
                        if (isset($_POST['resethwid'])){
                  $epicusername = xss_clean(mysqli_real_escape_string($con, $_POST['username']));
                  $bruhmoment = mysqli_query($con, "UPDATE `users` SET `hwid` = 'RESET' WHERE `username` = '$epicusername' AND `programtoken` = '$coolepicwin'") or die(mysqli_error($con));
                  if ($bruhmoment){
                      echo "<div style=\"margin:auto;margin-top:10px;width:1000px;\" class=\"ui positive message\">
                    <p>Success! HWID will reset on the next login from the client.</p>
                </div><br>";
                  }
                  else{
                      echo "<div style=\"margin:auto;margin-top:10px;width:1000px;\" class=\"ui negative message\">
                    <p>Unable to reset HWID!</p>
                </div><br>";
                  }
              }
                        ?>
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Manage Users</h2>
<?php

if (isset($_POST['banuser'])) {
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$username = xss_clean(mysqli_real_escape_string($con, $_POST['username']));
$faghggo = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek' AND `id` = '$idbruh'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($faghggo)){
              $brehxd = $row['authtoken'];
              }
$resultboi = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi) > 0){
$resultboi = mysqli_query($con, "UPDATE `users` SET `banned` = '1' WHERE `username` = '$username' AND `programtoken` = '$brehxd'") or die(mysqli_error($con));
if ($resultboi){
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully banned user!</p>
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

if (isset($_POST['unbanuser'])) {
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$username = xss_clean(mysqli_real_escape_string($con, $_POST['username']));
$faghggo = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek' AND `id` = '$idbruh'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($faghggo)){
              $brehxd = $row['authtoken'];
              }
$resultboi = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi) > 0){
$resultboi = mysqli_query($con, "UPDATE `users` SET `banned` = '0' WHERE `username` = '$username' AND `programtoken` = '$brehxd'") or die(mysqli_error($con));
if ($resultboi){
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully unbanned user!</p>
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
                    <form class="ui form" method="POST" action="">
                    <div class="ui action fluid input">
                      <table class="w3-table w3-striped w3-bordered">
          <thead>
            <tr class="w3-red">
              <th>Username</th>
              <th>Email</th>
              <th>Expires</th>
              <th>Level</th>
              <th>Manage</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
              $idbruh = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
              $epicbreh = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$kek' AND `id` = '$idbruh'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($epicbreh)){
              $bruhhhhh = $row['authtoken'];
              }

              $grabprograms = mysqli_query($con, "SELECT * FROM `users` WHERE `programtoken` = '$bruhhhhh'") or die(mysqli_error($con));

              $today = date("Y-m-d");
              $today_dt = new DateTime($today);
              while($row = mysqli_fetch_array($grabprograms)){
              {
                $expire_dt = new DateTime($row['expires']);
                $expired = false;
                if ($expire_dt < $today_dt) { $expired = true; } else { $expired = false; }
                $kekboibanhim = $row['username'];
                $kekid = $row['id'];
                echo '
                <form class="ui form" method="POST" action="">
                <tr>
                <td class="gtext">'.$row['username'].'</td>
                <td class="gtext">'.$row['email'].'</td>
                '.($expired ? "<td class = 'w3-text-red'>Expired(". $row['expires'] .")</td>" : "<td class = 'w3-text-red'>".$row['expires']."</td>") .'
                <td class="gtext">'.$row['level'].'</td>
                <input class="w3-input" type="hidden" name="username" value="'.$kekboibanhim.'">
                '.($row['banned'] == "1" ? "<td class=\"gtext\"><input id=\"submit\" name=\"unbanuser\" type=\"submit\" class=\"ui red button\" value=\"Unban\"></td>" : "<td class=\"gtext\"><input id=\"submit\" name=\"banuser\" type=\"submit\" class=\"ui red button\" value=\"Ban\"></td>").'
                <td class="gtext"><a class="ui red button" href="https://trinityseal.me/dashboard/programs/edituser.php?id='.$id.'&user='.$kekid.'">Edit User</a></td>
                <td>
                </form>
                '
                ;
              }
              }

              if (isset($_POST['deletetoken'])){
                $boi = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                $epicfortnitewinmoment = xss_clean(mysqli_real_escape_string($con, $_POST['secret']));
                $bruhmoment = mysqli_query($con, "DELETE FROM `tokens` WHERE `owner` = '$boi' AND `token` = '$epicfortnitewinmoment'") or die(mysqli_error($con));
                if ($bruhmoment){
                  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully deleted token!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='2'; url='".$_SERVER."'>";
                }
                else{
                  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div><br>";
                }
              }
              ?>
            </tr>
          </tbody>
        </table>
                    </div>
                    <br>
                </form>
            </div>
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