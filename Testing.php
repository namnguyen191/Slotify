<?php
include 'includes/config.php';

date_default_timezone_set('America/Toronto');

$current_date = date('Y/m/d H:i:s');

echo $current_date."<br>";

$query = mysqli_query($con, "INSERT INTO users  VALUES('','testing','John','Doe','johndoe@testmail.ca','123456','$current_date','testing image')");

if($query){
  echo "Insert successful";
} else {
  echo "Insert fail";
}

 ?>
