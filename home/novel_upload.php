<?php
session_start();
$user=$_SESSION['user'];
if (!isset($_SESSION['user']))
    header("location:login.php");
if (isset($_SESSION['user']))
{
  //Connect to database
  require_once('config.php');

  if (mysqli_connect_errno()) {
    echo "connection failed bitch";
}
if (isset($_POST['name'])){
  $query="INSERT INTO novel_info(name,publisher,category,ref_no,author,date_purchase,edition,username) VALUES('".$_POST['name']."','".$_POST['publisher']."','".$_POST['category']."','".$_POST['ref_no']."','".$_POST['author']."','".$_POST['date_purchase']."','".$_POST['edition']."','".$_SESSION['user']."')";
  $result=mysqli_query($connection,$query);
  header("location:user_home.php");
  $query2="UPDATE points SET total_points=total_points+1 WHERE username='$user' ";
  mysqli_query($connection,$query2);
}

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// define variables and set to empty values
$name = $publisher = $category = $ref_no = $author = $date_purchase = $branch = $edition =  "";
$nameErr = $publisherErr = $categoryErr = $ref_noErr = $authorErr = $date_purchaseErr = $branchErr = $editionErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["ref_no"])) {
    $ref_noErr = "Reference number is required";
  } else {
    $ref_no = test_input($_POST["ref_no"]);
    if (!preg_match("/^[0-9]*$/",$ref_no)) {
      $ref_noErr = "Invalid Reference number"; 
    }
  }

  if (empty($_POST["edition"])) {
    $editionErr = "Edition is required";
  } else {
    $edition = test_input($_POST["edition"]);
    if (!preg_match("/^[0-9]*$/",$edition)) {
      $editionErr = "Invalid Edition"; 
    }
  }

  if (empty($_POST["name"])) {
    $nameErr = "Novel name is required";
  } else {
    $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["publisher"])) {
    $publisherErr = "Novel publisher is required";
  } else {
    $publisher = test_input($_POST["publisher"]);
     // check if publisher only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$publisher)) {
      $publisherErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["category"])) {
    $categoryErr = "Novel category is required";
  } else {
    $category = test_input($_POST["category"]);
     // check if category only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$category)) {
      $categoryErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["author"])) {
    $authorErr = "Novel author is required";
  } else {
    $author = test_input($_POST["author"]);
     // check if author only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$author)) {
      $authorErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["date_purchase"])) {
    $date_purchaseErr = "Date of purchase is required";
  } else {
    $date_purchase = test_input($_POST["date_purchase"]);
    }
  }

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
		<div class="container">
<ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
          <a class="gn-icon  menu_items gn-icon-menu"><span>Menu</span></a>
          <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
              <ul class="gn-menu">

                <li><a   href="user_home.php" class="gn-icon  menu_items gn-icon-home">Home</a></li>
                <li><a   href="upload_novel.php"  class="gn-icon  menu_items gn-icon-societies">Upload Novels</a>
                                <li><a   href="delete_novel.php" class="gn-icon  menu_items gn-icon-calendar">Delete Novels</a>
                
           
                <li><a   href="confirmation.php" class="gn-icon  menu_items gn-icon-blog">Got Your Novel?Confirm It </a></li>
                <li><a   href="notification.php" class="gn-icon  menu_items gn-icon-pictures">Notification </a></li>
                <li><a   href="#" class="gn-icon  menu_items gn-icon-exit">Log Out</a></li>
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
<div style="margin-top:120px ">
<form class="form-horizontal" name="novel_upload" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <form-element label="name" >
      <div class="form-group"><input class="form-control" required type="text" name="name" placeholder="Novel name"    /></div>
    </form-element>
</br>

    <form-element label="publisher" >
      <div class="form-group"><input class="form-control" required type="text" name="publisher" placeholder="Publisher"    /></div>
    </form-element>
</br>

    <form-element label="category" >
      <div class="form-group"><input class="form-control" required type="text" name="category" placeholder="Category"    /></div>
    </form-element>
</br>

    <form-element label="ref_no" >
      <div class="form-group"><input class="form-control" required type="number" name="ref_no" placeholder="Ref No"    /></div>
    </form-element>
</br>

    <form-element label="author" >
      <div class="form-group"><input class="form-control" required type="text" name="author" placeholder="Author"    /></div>
    </form-element>
</br>

    <form-element label="date_purchase" >
      <div class="form-group"><input class="form-control" required type="date" name="date_purchase" placeholder="Date of purchase"    /></div>
    </form-element>

</br>

    <form-element label="edition" >
      <div class="form-group"><input class="form-control" required type="number" name="edition" placeholder="Edition"    /></div>
    </form-element>
</br>

      <input type="reset" class="btn btn-danger" value="Reset">  
      <input type="submit" onclick="alert('Confirm?')" class="btn btn-success"> 

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