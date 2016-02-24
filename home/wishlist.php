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

  if (!empty($_POST['available_novel'])) 
  {
    $selected_novel=$_POST['available_novel'];
    $query4="SELECT username from novel_info where name='$selected_novel'";
    $result4=mysqli_query($connection,$query4);
    $row4=mysqli_fetch_assoc($result4);
    $user_from=$row4['username'];

    //$query5="DELETE FROM novel_info WHERE name='$selected_novel' AND username='$user_from' ";

    $query3="INSERT INTO isseud_novel(username_to,username_from,novel_name) VALUES ('$user','$user_from','".$_POST['available_novel']."')";
    $result3=mysqli_query($connection,$query3);

    $query1="UPDATE novel_info SET is_issued=1 WHERE name='$selected_novel' AND username='$user_from' ";
    if ($result3) {
      if (isset($selected_novel)) {
        $query6="UPDATE points SET total_points=total_points-1 WHERE username='$user' ";
        mysqli_query($connection,$query6);
      }
              //mysqli_query($connection,$query5);
      mysqli_query($connection,$query1);
    }
  } 
  $query="SELECT total_points from points WHERE username = '$user'  ";
  $result=mysqli_query($connection,$query);
  $row=mysqli_fetch_assoc($result);
  $total_points=$row['total_points'];

  if (isset($_GET['search'])) {
    $query2="SELECT DISTINCT novel_name FROM wish where visible=1 AND name Like '".$_GET['search']."' ";
  }else {
    $query2="SELECT DISTINCT novel_name FROM wish where visible=1";
  }

  $result2=mysqli_query($connection,$query2);
  $row2=mysqli_fetch_assoc($result2);

  $query3="SELECT  username FROM wish where visible=1 AND novel_name='".$row2['novel_name']."' ";
  $result3=mysqli_query($connection,$query3);
  $row3=mysqli_fetch_assoc($result3);

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
    <link rel="stylesheet" type="text/css" href="bootstrap.min (4).css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
    <script src="js/modernizr.custom.js"></script>
  </head>
  <body>
    <div class="container" style="margin-top:60px;">
      <ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
          <a class="gn-icon  menu_items gn-icon-menu"><span>Menu</span></a>
          <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
              <ul class="gn-menu">

                <li><a   href="user_home.php" class="gn-icon  menu_items gn-icon-home">Home</a></li>
                <li><a   href="novel_upload.php"  class="gn-icon  menu_items gn-icon-societies">Upload Novels</a>
                  <li><a   href="delete_novel.php" class="gn-icon  menu_items gn-icon-calendar">Delete Novels</a>
                    <li><a   href="novel_confirm.php" class="gn-icon  menu_items gn-icon-blog">Got Your Novel?Confirm It </a></li>
                    <li><a   href="notification.php" class="gn-icon  menu_items gn-icon-pictures">Notification </a></li>
                    <li><a   href="logout.php" class="gn-icon  menu_items gn-icon-exit">Log Out</a></li>
                  </ul>
                </div><!-- /gn-scroller -->
              </nav>
            </li>

            <li class="hero"><a class="codrops-icon codrops-icon-prev" href="http://thaparexpress.in"><span><h3>BOOKHUBB</h3></span></a></li>
            <li />
            

          <!--new addition 2-->  <li>   

          <a style="color:white; font-size:2em; cursor:pointer;" title="Make a wish for yourself" ng-hide="authenticated" data-toggle="modal" data-target="#myModal" class="">
            <i class="fa fa-2x fa-sign-in" style="font-size:32px;"></i><sup></sup></a>
          </li>
        </ul>

      </ul>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-57016004-1', 'auto');
        ga('send', 'pageview');

      </script>

      <div class="row">
        <div class="col-sm-12">
          <h2></h2>
        </div>

        <hr>
      </div>
      <div class="row" style="margin-right:0px;">

      </div>
      <div class="col-md-12">
       <div class="row" >  

        <?php 
        do
        { $novel_name=$row2['novel_name'];

        $images = $novel_name;
        $images .=  " book";
        $image = rawurlencode($images);
        $query9 = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".$image."&imgsz=large&as_filetype=jpg";
        $json = file_get_contents($query9);
        $obj = json_decode($json);

        ?>
          <!--<img src="<?php
          //echo $obj->responseData->results[1]->url;?>" />-->

          <div class="col-xs-6 col-sm-3 " style="padding-right:5px;padding-left:5px;">
            <div class="thumbnail box-shadow">

              <img style="width:150px;height:150px" ng-src="<?php echo $obj->responseData->results[1]->url;?>" alt="<?php echo $novel_name; ?>" title="<?php echo $novel_name; ?>" class="productimg" imageonload="" src="<?php echo $obj->responseData->results[1]->url;?>">
              <div class="everything">
                <div class="caption" style="padding-top:0px">
                  <h4 class="name ng-binding"><?php echo $novel_name; ?> </h4>
                </div>
                <div class="ratings">
                  <center>
                   <p style="margin-bottom:1px;" class="ng-binding">
                    <a onclick="alert('Confirm?')" type="button" href="issue.php?available_novel=<?php echo $novel_name ; ?>" class="btn btn-success btn-xs" >Issue</a>   
                    <!-- Modal -->

                  </p></center>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" style="width:50% height:50%" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">

              <!-- Modal content-->
              <div class="modal-content">

                <div class="modal-header" style="background-color:#339933;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <center><h3 class="modal-title"><font color="white">Make a Wish</font></h3></center>
                </div>

                <div class="modal-body">
                  <form class="form-horizontal" name="wish" method="get" action="wish.php?name=<?php echo $novel_name ; ?>">
                    <form-element label="name">
                    <input required class="form-control" type="text" name="name" placeholder="Novel name"    />
                  </form-element>
                  
                </div>

                <div class="modal-footer">
                  <input onclick="alert('Confirm?')" type="submit" class="btn btn-default btn-success" data-dismiss="modal" value="wish" >
                </form>
              </div>

            </div>

          </div>
        </div>
        <?php

      }while ($row2 = mysqli_fetch_assoc($result2));
      ?>
    </div>
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