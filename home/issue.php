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

	if (!empty($_GET['available_novel'])) 
	{
		$selected_novel=$_GET['available_novel'];
		
		$query4="SELECT username from novel_info where name='$selected_novel'";
		$result4=mysqli_query($connection,$query4);
		$row4=mysqli_fetch_assoc($result4);
		$user_from=$row4['username'];

		//$query5="DELETE FROM novel_info WHERE name='$selected_novel' AND username='$user_from' ";

		$query3="INSERT INTO isseud_novel(username_to,username_from,novel_name) VALUES ('$user','$user_from','".$_GET['available_novel']."')";
		$result3=mysqli_query($connection,$query3);

		$query1="UPDATE novel_info SET is_issued=1 WHERE name='$selected_novel' AND username='$user_from' ";

		if ($result3) {
			if (isset($selected_novel)) {
				$query6="UPDATE points SET total_points=total_points-1 WHERE username='$user' ";
				mysqli_query($connection,$query6);
			}

			mysqli_query($connection,$query1);
		}
	}	
	header("location:user_home.php");

}
?>

