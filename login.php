<?php
session_start();
require_once('config.php');
if (mysqli_connect_errno()) {
  echo "Connection failed bitch";
}
?>
<?php
$user=$pass="";
if(isset($_POST["username"])){
  if ($_POST["username"]){
    $user = $_POST["username"];
  }else {
   echo "no username supplied";
  }
  if ($_POST["password"]){
    $pass = $_POST["password"];
  }else {
    echo "no password supplied";
  }
  $query2="SELECT * FROM login_info WHERE username = '$user' AND password='$pass'";
  $result2=mysqli_query($connection,$query2);
  $row2=mysqli_fetch_assoc($result2);
  if ($row2) {
  $_SESSION['user']=$user;
  header("location:home/user_home.php");
  }else{
    echo "Wrong Username or Password ";
  }
}
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    
    <link href="css1/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <div class="login-card">
    <h1>Log-in</h1><br>
  <form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="signup.php">Register</a> • <a href="#">Forgot Password</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>