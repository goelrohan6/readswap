<?php 
session_start();
$user=$_SESSION['user'];
if (!isset($_SESSION['user']))
  header("location:login.php");
if (isset($_SESSION['user']))
{ // DONT FORGET TO CLOSE THIS BRACE AT THE END OF </HTML> TAG .....
  //Connect to database
  require_once('config.php');

  $query="UPDATE wish SET likes=likes+1";
  mysqli_query($connection,$query);

    if (mysqli_connect_errno()) {
    echo "connection failed bitch";
  }
}
  ?>
