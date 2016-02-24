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
        if (isset($_GET['name'])){
        $novel_name=$_GET['name'];
        $query="INSERT INTO wish(novel_name,username,visible) VALUES('".$_GET['name']."','$user',1)";
        mysqli_query($connection,$query);
    }
}
header('location:user_home.php')
    ?>