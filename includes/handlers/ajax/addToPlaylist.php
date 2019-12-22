<?php

include '../../config.php';

if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
  $playlistId = $_POST['playlistId'];
  $songId = $_POST['songId'];
  //Return the highest playlist order and add 1
  $orderQuery = mysqli_query($con,"SELECT IFNULL(MAX(playlistOrder)+1,0) as playlistOrder FROM playlistSongs WHERE playlistId = '$playlistId'");
  $row = mysqli_fetch_array($orderQuery);
  $order = $row['playlistOrder'];

  $query = mysqli_query($con, "INSERT INTO playlistSongs VALUES('','$songId','$playlistId','$order')");
} else {
  echo "Playlist id or song id was not passsed into addToPlaylist.php";
}

 ?>
