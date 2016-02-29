<?php
require_once('config.php');


$button_selected=$_POST['button_selected'];
echo $button_selected;

$id=$_POST['id'];
echo $id;

if(isset($_POST['button_selected']) && $_POST['button_selected']=='a') {
	echo "accepted";
	$query="UPDATE novel_info SET verified = 1 WHERE id=$id ";
	mysqli_query($connection,$query);

}else if(isset($_POST['button_selected']) && $_POST['button_selected']=='r') {
	echo "rejected";
	$query="UPDATE novel_info SET verified = 0 WHERE id=$id ";
	mysqli_query($connection,$query);
}

?>