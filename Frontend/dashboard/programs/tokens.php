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
		<title>TrinitySeal - Tokens</title>
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
                   <a href="#" class="red active item">Tokens</a>
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
                <h2 class="ui inverted dividing header">Generate Token</h2>
                    <form class="ui form" method="POST" action="">
<?php 
if (isset($_POST['generatetoken'])) {
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$type = xss_clean(mysqli_real_escape_string($con, $_POST['type']));
$level = xss_clean(mysqli_real_escape_string($con, $_POST['level']));
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$loopcount =  xss_clean(mysqli_real_escape_string($con, $_POST['loopcount']));
$prefix =  xss_clean(mysqli_real_escape_string($con, $_POST['prefix']));

if (strlen($prefix) > 20){
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Your token prefix must be 20 characters or less!</p>
                </div>";
                 echo "<meta http-equiv='Refresh' Content='2'; url='".$_SERVER."'>";
                die();
}
else if (count(explode(' ', $prefix)) > 1) {
   echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Your token prefix must not contain any spaces!</p>
                </div>";
                 echo "<meta http-equiv='Refresh' Content='2'; url='".$_SERVER."'>";
                die();
}

if ($loopcount > 0 && $loopcount <= 50){
}
else{
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid amount to generate!</p>
                </div>";
                echo "<meta http-equiv='Refresh' Content='3'; url='".$_SERVER."'>";
                die();
}

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

$grabinfo = mysqli_query($con, "SELECT * FROM `owners` WHERE `username` = '$username'") or die(mysqli_error($con));
            while($row = mysqli_fetch_array($grabinfo)){
            $subscription = $row['premium']; 
            }

$epicc21 = mysqli_query($con, "SELECT * FROM `users` WHERE `programtoken` = '$bruhtoken'") or die(mysqli_error($con));
$boolcheck1 = 1;
if ($subscription == "0") {
if(mysqli_num_rows($epicc21) > 50) {     
$boolcheck1 = 0;
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You cannot have more than 50 users! Purchase premium to remove this limit.</p>
                </div><br>";
}
}

if ($subscription == "1") {
if(mysqli_num_rows($epicc21) > 5000) {     
$boolcheck1 = 0;
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You cannot have more than 5000 users!</p>
                </div><br>";
}
}

if ($boolcheck1 == 1) {


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

$gaycheck = 1;
$epicc2 = mysqli_query($con, "SELECT * FROM `tokens` WHERE `program` = '$id'") or die(mysqli_error($con));
if ($subscription == "0") {
if(mysqli_num_rows($epicc2) >= 100 || $loopcount + mysqli_num_rows($epicc2) > 100) {     
$gaycheck = 0;
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You cannot generate more than 100 tokens! Purchase premium to remove this limit.</p>
                </div>";
}
}

if ($subscription == "1") {
if(mysqli_num_rows($epicc2) >= 10000) {     
$gaycheck = 0;
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You cannot generate more than 10,000 tokens! Purchase premium to remove this limit.</p>
                </div>";
}
}

if ($gaycheck == 1) {

$epicc1 = mysqli_query($con, "SELECT * FROM `programs` WHERE `id` = '$id'") or die(mysqli_error($con));

if(mysqli_num_rows($epicc1) < 1){      
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid program ID!</p>
                </div>";
}
else{
    //GenerateToken()
    
    for($i = 0; $i < $loopcount; $i++){
        $tokennn = GenerateToken();
if (!empty($prefix)) {
$insertlol = mysqli_query($con, "INSERT INTO `tokens` (id, token, owner, program, days, used, used_by, level, programtoken) 
  VALUES ('', '$prefix-$tokennn', '$owner', '$id', '$type', 0, '', '$level', '$bruhtoken')") or die(mysqli_error($con));
}
else{
    $insertlol = mysqli_query($con, "INSERT INTO `tokens` (id, token, owner, program, days, used, used_by, level, programtoken) 
  VALUES ('', '$tokennn', '$owner', '$id', '$type', 0, '', '$level', '$bruhtoken')") or die(mysqli_error($con));
}
    }
if ($insertlol){
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Success! Please wait...</p>
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
                    <div class="ui action fluid input">
                      <div class="col-md-9">
                      <div class="col-md-3"><strong><font color="white">Time:</font></strong></div>
                      <select style="margin:auto; width:970px; margin-bottom: 15px" class="form-control" name="type">
                        <option value="1">1 Day</option>
                        <option value="2">3 Days</option>
                        <option value="3">1 Week</option>
                        <option value="4">3 Weeks</option>
                        <option value="5">1 Month</option>
                        <option value="6">3 Months</option>
                        <option value="7">Lifetime</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-3"><strong><font color="white">Level:</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="number" name="level" placeholder="Minimum 1, maximum 10.." required type="number" value="", min="1", max="10">
                    </div>
                    <br>
                    <div class="col-md-3"><strong><font color="white">Amount to generate:</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="number" name="loopcount" placeholder="Minimum 1, maximum 50.." required type="number" value="", min="1", max="50">
                    </div>
                    <br>
                    <div class="col-md-3"><strong><font color="white">Prefix (optional):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="prefix" placeholder="ExamplePrefix" value="">
                    </div>
                    <br>
                    <input id="submit" name="generatetoken" type="submit" class="ui fluid red button" value="Generate">
                </form>
            </div>
            <div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Manage Tokens</h2>
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
                    <table class="w3-table w3-striped w3-bordered">
          <thead>
            <tr class="w3-red">
              <th>Token</th>
              <th>Days</th>
              <th>Used?</th>
              <th>Used by?</th>
              <th>Manage</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <center><a href="<?php echo "https://trinityseal.me/dashboard/programs/rawtokens.php?id=".$id.""; ?>" class="ui fluid red button">View Raw Tokens</a></center><br>
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
                echo '
                <form class="ui form" method="POST" action="">
                <tr>
                <td class="gtext">'.$row['token'].'</td>
                <td class="gtext">'.$row['days'].'</td>
                '.($row['used'] == "1" ? "<td class = 'w3-text-red'>Used</td>" : "<td class = 'w3-text-red'>Not Used</td>") .'
                
                <td class="gtext">'.$kekloll.'</td>
                <input class="w3-input" type="hidden" name="secret" value="'.$row['token'].'">
                <td class="gtext"><input id="submit" name="deletetoken" type="submit" class="ui red button" value="Delete"></td>
                <td>
                </form>
                '
                ;
              }
              }
              ?>
            </tr>
          </tbody>
        </table>
            </div>
            
            <br>
            
             <div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Token Purger</h2>
                <?php
if (isset($_POST['deleteused'])){
                $boi = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                $bruhmoment = mysqli_query($con, "DELETE FROM `tokens` WHERE `owner` = '$boi' AND `used` = '1'") or die(mysqli_error($con));
                if ($bruhmoment){
                  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully deleted used tokens!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='1'; url='".$_SERVER."'>";
                }
                else{
                  echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div><br>";
                }
              }
              
              if (isset($_POST['deleteunused'])){
                $boi = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                $bruhmoment = mysqli_query($con, "DELETE FROM `tokens` WHERE `owner` = '$boi' AND `used` = '0'") or die(mysqli_error($con));
                if ($bruhmoment){
                  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully deleted un-used tokens!</p>
                </div><br>";
                echo "<meta http-equiv='Refresh' Content='1'; url='".$_SERVER."'>";
                }
                else{
                  echo "<div style=\"margin:auto;margin-top:10px;width:700px;\" class=\"ui negative message\">
                    <p>Error!</p>
                </div><br>";
                }
              } 
              
              if (isset($_POST['deleteall'])){
                $boi = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                $bruhmoment = mysqli_query($con, "DELETE FROM `tokens` WHERE `owner` = '$boi'") or die(mysqli_error($con));
                if ($bruhmoment){
                  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully deleted all tokens!</p>
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
                    <form class="ui form" method="POST" action="">
                    <input id="submit" name="deleteused" type="submit" class="ui fluid red button" value="Delete Used Tokens">
                    <br>
                    <input id="submit" name="deleteunused" type="submit" class="ui fluid red button" value="Delete Un-Used Tokens">
                    <br>
                    <input id="submit" name="deleteall" type="submit" class="ui fluid red button" value="Delete All Tokens">
                        </form>
            </div>
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