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
		<title>TrinitySeal - File Manager</title>
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
                   <a href="#" class="red active item">File Manager</a>
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
            <center><div class="col-md-3"><strong><font color="white">Your files must be compressed in a .zip or .rar archive and 25MB or less!</font></strong></div></center><br>
            <div style="margin:auto; width:1000px; margin-bottom: 15px" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Upload File</h2>
                <?php
                if(isset($_FILES['file'])){
                    
                    $filecountcheck = mysqli_query($con, "SELECT * FROM `uploads` WHERE `owner` = '$username'") or die(mysqli_error($con));
                                    if(mysqli_num_rows($filecountcheck) >= 5){ 
                                        echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You are only allowed to upload 5 files at a time!</p>
                    </div><br>";
                                    }
                                    else {
                    
                    $file = $_FILES['file'];
                    
                    // File properties
                    $file_name = xss_clean(mysqli_real_escape_string($con, $file['name']));
                    $file_tmp = $file['tmp_name'];
                    $file_size = $file['size'];
                    $file_error = $file['error'];
                    
                    // Get file extension
                    $file_ext = explode('.', $file_name);
                    $file_ext = strtolower(end($file_ext));
                    
                    $allowed = array('rar', 'zip');
                    
                    if (in_array($file_ext, $allowed)){
                        if ($file_error === 0){
                            if ($file_size <= 26214400){
                                
                                $secret = generateRandomString();
                                $file_path = 'uploads/' . $secret;
                                $file_destination = 'uploads/' . $secret . '/' . $file_name;
                                /*
                                if(!is_writable($file_destination)){
                                    echo "kek";
                                }
                                */
                                if (!file_exists($file_path)){
                                    mkdir($file_path, 0777);
                                }
                                if(move_uploaded_file($file_tmp, $file_destination)){
                                    $insertlol = mysqli_query($con, "INSERT INTO `uploads` (id, directory, filename, owner) VALUES ('', '$file_destination', '$file_name', '$username')") or die(mysqli_error($con));
                                    if ($insertlol){
                                        echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui positive message\">
                    <p>Successfully uploaded file!</p>
                </div><br>";
                                    }
                                }
                                else{
                                    echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Error when uploading file!</p>
                </div><br>";
                                }
                                
                            }
                            else{
                                echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Your file must be 25MB or lower!</p>
                </div><br>";
                            }
                        }
                        else{
                            echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>Your file has errors!</p>
                </div><br>";
                        }
                    }
                    else{
                        echo "<div style=\"margin:auto;margin-top:10px;width:970px;\" class=\"ui negative message\">
                    <p>You may only upload .rar or .zip files!</p>
                </div><br>";
                    }
                  }
                }
                ?>
                    <form class="ui form" method="POST" action="" enctype="multipart/form-data">
                    <div class="col-md-3"><strong><font color="white">Select your file:</font></strong></div>
                    <div class="ui action fluid input">
                        <input name="file" type="file" value="">
                    </div>
                    <br>
                    <input id="submit" name="uploadfile" type="submit" class="ui fluid red button" value="Upload File">
                </form>
            </div>
            
              <div class="ui container">
            <div style="margin:auto; width:1500px; margin-bottom: 15px; margin-left: -185px;" class="ui inverted segment">
                <h2 class="ui inverted dividing header">Manage Files</h2>
                <?php
                if(isset($_POST['deletefile'])){
                    $kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));
                    $fileid = xss_clean(mysqli_real_escape_string($con, $_POST['fileid']));
                    $delfile = mysqli_query($con, "DELETE FROM `uploads` WHERE `owner` = '$kek' AND `id` = '$fileid'") or die(mysqli_error($con));
                    if ($delfile){
                        echo "<div style=\"margin:auto;margin-left:5px;margin-top:10px;width:1450px;\" class=\"ui positive message\">
                    <p>Successfully deleted file!</p>
                </div><br>";
                    }
                    else{
                        echo "<div style=\"margin:auto;margin-left:5px;margin-top:10px;width:1450px;\" class=\"ui negative message\">
                    <p>Failed to delete file!</p>
                </div><br>";
                     
                    }
                }
                
                ?>
               <table class="w3-table w3-striped w3-bordered">
          <thead>
            <tr class="w3-red">
              <th>File Name</th>
              <th>Download Link</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $kek = xss_clean(mysqli_real_escape_string($con, $_SESSION['username']));

              $grabfiles = mysqli_query($con, "SELECT * FROM `uploads` WHERE `owner` = '$kek'") or die(mysqli_error($con));
              while($row = mysqli_fetch_array($grabfiles)){
              {
                  $kekid = $row['id'];
              echo '
              <form class="ui form" method="POST" action="">
                <tr>
                <td class="gtext">'.$row['filename'].'</td>
                <td class="gtext">https://trinityseal.me/dashboard/programs/'.$row['directory'].'</td>
                <input class="w3-input" type="hidden" name="fileid" value="'.$row['id'].'">
                <td class="gtext"><input id="submit" name="deletefile" type="submit" class="ui red button" value="Delete File"></td>
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
function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function xss_clean($data)
  {
     return strip_tags($data);
  }
?>
</html>