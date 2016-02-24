<?php 
session_start();
$user=$_SESSION['user'];
if (!isset($_SESSION['user'])){
	header("location:login.php");
}
if (isset($_SESSION['user']))
{ // DONT FORGET TO CLOSE THIS BRACE AT THE END OF </HTML> TAG .....
//Connect to database
	require_once('config.php');

	if (mysqli_connect_errno()) {
		echo "connection failed bitch";
	}
	$query="SELECT * FROM novel_info WHERE username = '$user' AND is_issued=0 ";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_assoc($result);

	$query3="SELECT * FROM isseud_novel WHERE username_from = '$user' ";
	$result3=mysqli_query($connection,$query3);
	$row3=mysqli_fetch_assoc($result3);

	$query4="SELECT * FROM isseud_novel WHERE username_to = '$user' ";
	$result4=mysqli_query($connection,$query4);
	$row4=mysqli_fetch_assoc($result4);

	if (!$row || !$row3) {

		echo "You have not uploaded any novels BITCH ";

	}
	$query2="SELECT * FROM novel_info WHERE username != '$user' ";
	$result2=mysqli_query($connection,$query2);
	$row2=mysqli_fetch_assoc($result2);

	$query5="SELECT * FROM isseud_novel WHERE username_to='$user' AND exceeded=1";
	$result5=mysqli_query($connection,$query5);
	$row5=mysqli_fetch_assoc($result5);
	$days=$row5['days'];

	$query7="SELECT novel_name FROM wish where username ='$user' " ;
	$result7=mysqli_query($connection,$query7);
	$row7=mysqli_fetch_assoc($result7);
	?>

	<!DOCTYPE html>
	<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Bookhubb | Home</title>
		<meta name="description" content="One stop for all of Thapar. THAPAR EXPRESS" />
		<meta name="keywords" content="thapar express,thapar university,thaparexpress,thapar,express,all,of,thapar,events,thapar,societies,timetable,food in patiala,restaurants in patiala " />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/timeline.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
	<div class="container" style="margin-top:116px;">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon  menu_items gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">

								<li><a   href="user_home.php" class="gn-icon  menu_ite	ms gn-icon-home">Home</a></li>
								<li><a   href="upload_novel.php"  class="gn-icon  menu_items gn-icon-societies">Upload Novels</a></li>
									<li><a   href="delete_novel.php" class="gn-icon  menu_items gn-icon-calendar">Delete Novels</a>

									</li>
									<li><a   href="confirm.php" class="gn-icon  menu_items gn-icon-blog">Got Your Novel?Confirm It </a></li>
									<li><a   href="notification.php" class="gn-icon  menu_items gn-icon-pictures">Notification </a></l>
									<li><a   href="logout.php" class="gn-icon  menu_items gn-icon-exit">Log Out</a></li>
								</ul>
							</div><!-- /gn-scroller -->
						</nav>
					</li>
					<li class="hero"><a class="codrops-icon codrops-icon-prev" href="http://thaparexpress.in"><span><h3>BOOKHUBB</h3></span></a></li>
					<li />

				</ul>
				<script>
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

					ga('create', 'UA-57016004-1', 'auto');
					ga('send', 'pageview');

				</script>

				<div class="panel panel-danger" style="box-shadow: 10px 10px 5px #888888;">
  <!-- Default panel contents -->
  <div class="panel-heading"><center><h2>Notifications</h2></center></div>
  <div class="panel-body">
  </div>
  <?php
  if (isset($days)){
  	while ($row5 = mysqli_fetch_assoc($result5)){

  		?>
  		<!-- List group -->
  		<ul class="list-group">
  		<li class="list-group-item">You have exceeded by <strong><?php echo $row5['days']; ?> </strong>days novel name being <b><u><?php echo $row5['novel_name']; ?></u></b>.</li>
  		</ul>
  		<?php

  	}
  }else{
  	echo "No new Notifications";
  }
  ?>
 <ul class="list-group">
  <?php
  	while ($row7 = mysqli_fetch_assoc($result7)){
  	$novel_wished=$row7['novel_name'];
  	$query6="SELECT * FROM novel_info where name='$novel_wished' AND username!='$user' AND is_issued=0 ";
  	$result6=mysqli_query($connection,$query6);
  	$row6=mysqli_fetch_assoc($result6);
  	}
  ?>
  <li class="list-group-item">You can check out your wished novel <b><u><?php echo $row6['name']; ?></u></b>.</li>
  </ul>
</div>
  </div>


			<script src="js/classie.js"></script>

			<script>
				new gnMenu( document.getElementById( 'gn-menu' ) );
			</script>
		</body>
		</html>

		<?php
	}
	?>