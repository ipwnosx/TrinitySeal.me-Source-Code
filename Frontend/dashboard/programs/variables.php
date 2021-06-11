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
		<title>TrinitySeal - Variables</title>
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
                   <a href="#" class="red active item">Variables</a>
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

function xss_clean($data)
  {
     return strip_tags($data);
  }
?>
        
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
        $key1 = $row['authtoken'];
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
                <h2 class="ui inverted dividing header">Create Variable</h2>
<?php
if(isset($_POST['createvar'])) {
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$varname = xss_clean(mysqli_real_escape_string($con, $_POST['varname']));
$varvalue = xss_clean(mysqli_real_escape_string($con, $_POST['varvalue']));
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));

if(empty(trim($varname)) || empty(trim($varvalue))){
     echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You cannot input empty values!</p>
                </div><br>";
}
else {


if(strlen($varname) > 30){
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Variable name too long! Max length is 30 characters</p>
                </div><br>";
}
else if(strlen($varvalue) > 2000){
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Variable value too long! Max length is 2000 characters</p>
                </div><br>";
}
else {

$namecheckboii = mysqli_query($con, "SELECT * FROM `vars` WHERE `owner` = '$owner' AND `name` = '$varname'") or die(mysqli_error($con));
if(mysqli_num_rows($namecheckboii) > 0){
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Variable name already exists!</p>
                </div><br>";
}
else {

$resultboi = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi) > 0){

      while($row = mysqli_fetch_array($resultboi)){
        $bruhtoken = $row['authtoken'];
      }
      
      $insertlol = mysqli_query($con, "INSERT INTO `vars` (id, name, value, programtoken, owner) 
  VALUES ('', '$varname', '$varvalue', '$bruhtoken', '$owner')") or die(mysqli_error($con));
      if($insertlol){
          echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully created variable!</p>
                </div><br>";
      }
    
}
else{
  echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Invalid program ID or session username!</p>
                </div><br>";
}
}
}
}
}

if (isset($_POST['deletevar'])){
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$varname = xss_clean(mysqli_real_escape_string($con, $_POST['secret']));;
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));

$lgbtcheck = mysqli_query($con, "SELECT * FROM `vars` WHERE `owner` = '$owner' AND `name` = '$varname'") or die(mysqli_error($con));
if(mysqli_num_rows($lgbtcheck) == 0){
    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Variable name doesn't exist!</p>
                </div><br>";
}
else{

$resultboi = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi) > 0){

      while($row = mysqli_fetch_array($resultboi)){
        $bruhtoken = $row['authtoken'];
      }
      
      $bruhmoment = mysqli_query($con, "DELETE FROM `vars` WHERE `owner` = '$owner' AND `programtoken` = '$bruhtoken' AND `name` = '$varname'") or die(mysqli_error($con));
      if ($bruhmoment){
          echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully deleted variable!</p>
                </div><br>";
      }
      else{
          echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Failed to delete variable!</p>
                </div><br>";
      }
}

else{
     echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Program doesn't exist!</p>
                </div><br>";
}

}

}

?>
                    <form class="ui form" method="POST" action="">
                    <div class="col-md-3"><strong><font color="white">Variable name (e.g. MySecretVariable):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="varname" placeholder="Variable name" type="text" value="">
                      </select>
                    </div>
                    <br>
                    <div class="col-md-3"><strong><font color="white">Variable value (e.g. My string value):</font></strong></div>
                    <div class="ui action fluid input">
                        <input id="text" name="varvalue" placeholder="Variable value" type="text" value="">
                    </div>
                    <br>
                    <input id="submit" name="createvar" type="submit" class="ui fluid red button" value="Create Variable">
                </form>
            </div>
            
              <div class="ui container">
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Manage Secret Key</h2>
<?php
if(isset($_POST['generatesecretkey'])){
$id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
$owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
$key = GenerateToken();

$resultboi1 = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
if(mysqli_num_rows($resultboi1) > 0){
     while($row = mysqli_fetch_array($resultboi1)){
        $bruhtoken = $row['authtoken'];
      }
      
      $updatekey = mysqli_query($con, "UPDATE `programs` SET `variablekey` = '$key' WHERE `owner` = '$owner' AND `id` = '$id' AND `authtoken` = '$bruhtoken'") or die(mysqli_error($con));
      if ($updatekey){
          echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully generated a new key!</p>
                </div><br>";
      }
      else{
          echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Failed to generate key!</p>
                </div><br>";
      }
}
else{
echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Program doesn't exist!</p>
                </div><br>";
}
}
?>
                 <form class="ui form" method="POST" action="">
                     <?php
                     $id = xss_clean(mysqli_real_escape_string($con, $_GET['id']));
                     $owner = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                   
                     $resultboi11 = mysqli_query($con, "SELECT * FROM `programs` WHERE `owner` = '$owner' AND `id` = '$id'") or die(mysqli_error($con));
                     
                     if(mysqli_num_rows($resultboi11) > 0){
                      while($row = mysqli_fetch_array($resultboi11)){
                        $varkey = $row['variablekey'];
                       }
                     }
                     else{
                         die("<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Program doesn't exist!</p>
                </div><br>");
                     }
                     
                     ?>
                     <div class="col-md-3"><font color="white">Secret Key: <?php echo $varkey ?></font></div>
                    <br>
                    <input id="submit" name="generatesecretkey" type="submit" class="ui fluid red button" value="Generate Key">
                </form>
            </div>

            <div class="ui container">
            <div style="margin:auto; width:1500px; margin-bottom: 15px; margin-left: -185px;" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Manage Variables</h2>
               <table class="w3-table w3-striped w3-bordered">
          <thead>
            <tr class="w3-red">
              <th>Variable</th>
              <th>Value</th>
              <th>Edit Value</th>
              <th></th>
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
              $coolepicwin = $row['authtoken'];
              }

              $grabvars = mysqli_query($con, "SELECT * FROM `vars` WHERE `owner` = '$kek' AND `programtoken` = '$coolepicwin'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($grabvars)){
              {
                  $kekid = $row['id'];
              echo '
              <form class="ui form" method="POST" action="">
                <tr>
                <td class="gtext">'.xss_clean($row['name']).'</td>
                <td class="gtext">'.xss_clean($row['value']).'</td>
                <input class="w3-input" type="hidden" name="secret" value="'.xss_clean($row['name']).'">
                <input class="w3-input" type="hidden" name="varid" value="'.xss_clean($row['id']).'">
                <td class ="gtext"><a class="ui red button" href="https://trinityseal.me/dashboard/programs/editvariable.php?id='.$id.'&varid='.$kekid.'">Edit</a></td>
                <td class="gtext"><input id="submit" style="float: right" name="deletevar" type="submit" class="ui red button" value="Delete"></td>
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
            

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    </body>
<?php
function GenerateToken() {
    for($i = 0; $i < 1; $i++) {
      $randomString = "";
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      for ($i = 0; $i < 25; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
  }


?>
</html>