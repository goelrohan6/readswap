<?php 
session_start();
$user=$_SESSION['user'];	

if (!isset($_SESSION['user']))
		header("location:login.php");



if (isset($_SESSION['user']))
{ // DONT FORGET TO CLOSE THIS BRACE AT THE END OF </HTML> TAG .....


	//Connect to database
require_once('config.php');

if (mysqli_connect_errno()) {
	echo "connection failed bitch";
}

if (!empty($_GET['issued_novel'])){
$selected_novel=$_GET['issued_novel'];
$query2="DELETE FROM isseud_novel WHERE username_from='$user' AND novel_name='$selected_novel' ";
mysqli_query($connection,$query2);
$query3="DELETE FROM novel_info WHERE name='$selected_novel' AND username='$user' ";
mysqli_query($connection,$query3);

header("location:user_home.php");

}
}

?>