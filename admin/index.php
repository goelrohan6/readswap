<?php 
//session_start();
//$user=$_SESSION['user'];

//if (!isset($_SESSION['user']))
//  header("location:login.php");

//if (isset($_SESSION['user']))
//{ // DONT FORGET TO CLOSE THIS BRACE AT THE END OF </HTML> TAG .....

  //Connect to database
  require_once('config.php');

  if (mysqli_connect_errno()) {
    echo "connection failed bitch";
  }

  $query="SELECT * from novel_info ";
  $result=mysqli_query($connection,$query);
  $row=mysqli_fetch_assoc($result);

 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Google Nexus Website Menu</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/update_ajax.js"></script>
		

	</head>
	<body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li><a class="gn-icon gn-icon-article">Verify Novels</a></li>

								<li>
									<a class="gn-icon gn-icon-archive">Review Users</a>
								</li>
								<li><a class="gn-icon gn-icon-cog">Settings</a></li>

								<li><a class="gn-icon gn-icon-help">Help</a></li>

							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a  href=""><span>Admin | Readswap</span></a></li>
			</ul>
			
			<!--Table-->
			<div class="component">
				<table id="tbUser">
					<thead>
						<tr>
							<th>Novels</th>
							<th>Author</th>
							<th>Publisher</th>
							<th>Reference no.</th>
							<th>Username</th>
							<th>Reading #5</th>
							<th>Reading #6</th>
						</tr>
					</thead>
					<tbody>
						<?php
						do{
							
						?>		
							<tr id="<?php echo $row['id']; ?>">
								<th><?php echo $row['id'];?>- <?php echo $row['name'] ; ?></th>
								<td><?php echo $row['author'] ; ?></td>
								<td><?php echo $row['publisher'] ; ?></td>
								<td><?php echo $row['ref_no'] ; ?></td>
								<td><?php echo $row['username'] ; ?></td>
     							<td><button id="<?php echo $row['id']; ?>" class="a btn btn-8 btn-8g selected">Accept</button></td>
          						<td><button id="<?php echo $row['id']; ?>" class="r btn btn-8 btn-8g selected">Reject</button></td>
						<?php
						}while($row=mysqli_fetch_assoc($result));
						?>		
							</tr>
					</tbody>
				</table>
			</div>
			
		</div><!-- /container -->

		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
		
		<!--Table-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>

		<!--Button-->
		<script src="js/button.js" ></script>
	</body>
</html>


<?php
//}
?>