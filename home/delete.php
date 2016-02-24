<?php 
session_start();
$user=$_SESSION['user']
?>
<?php
if (!isset($_SESSION['user']))
	header("location:login.php");

?>
<?php

if (isset($_SESSION['user']))
{ // DONT FORGET TO CLOSE THIS BRACE AT THE END OF </HTML> TAG .....

?>
<?php
//Connect to database
require_once('config.php');

if (mysqli_connect_errno()) {
	echo "connection failed bitch";
}
?>
<?php

if (!empty($_GET['checked_novel'])) 
{
$selected_novel=$_GET['checked_novel'];
$query2="DELETE FROM novel_info WHERE name='$selected_novel' AND username='$user' ";
$result2=mysqli_query($connection,$query2);
if ($result2) {
$query2="UPDATE points SET total_points=total_points-1 WHERE username='$user' ";
mysqli_query($connection,$query2);
}
header("location:user_home.php");

}

}
?>