<?php 
include ('config.php');

$newtable = "CREATE TABLE IF NOT EXISTS members ( ". 
  "memberid int(10) NOT NULL AUTO_INCREMENT, ".
  "name varchar(36) NOT NULL,".
  "rollnum varchar(36) NOT NULL, ".
  "year int(10) NOT NULL,".
  "branch int(2),".
  "hostel int(2) ,".
  "gender int(2) ,".
  "email varchar(200) NOT NULL, ".
  "mobile int(13) NOT NULL ,".
  "password varchar(36) NOT NULL, ".
  "activation varchar(40) DEFAULT NULL, ".
 
  "time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,".

  "PRIMARY KEY (memberid)".
  ")";
$newtable2 = "CREATE TABLE IF NOT EXISTS events ( ". 
  "eventid int(10) NOT NULL AUTO_INCREMENT, ".
   "name text DEFAULT NULL,".
   "descrip text DEFAULT NULL,".
  "image text DEFAULT NULL,".
  "venue text DEFAULT NULL,".
  "time text DEFAULT NULL,".
  "cost text DEFAULT NULL,".
  "code text DEFAULT NULL,".
  "PRIMARY KEY (eventid)".
  ")";
$run = mysql_query($newtable) or die(mysql_error());
$run2 = mysql_query($newtable2) or die(mysql_error());
$query_insert_user = "INSERT INTO `members` (  'name','rollnum','year','branch','email','mobile','password','activation') VALUES ( 'batman','169696969','1','2', '123','8725825811', '1234', NULL )";
$result_insert_user = mysqli_query($dbc, $query_insert_user);


            
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }
echo "Installation Completed, you may now delete this file";
?>
