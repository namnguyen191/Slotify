<?php

if (isset($_POST['submit'])) {

  //Retrieve all file infos
  $file = $_FILES['fileToUpload'];
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];

  //Retrieve file extension
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));

  //Check if file is an audio type
  $allowedFileTypes = array('mp3','mp4','flac','wav','aiff','alac','m4a');
  if(!in_array($fileActualExt,$allowedFileTypes)){
    $message = "The file is not an audio file! Filetype: ".$fileActualExt;
    header("Location: uploadYourMusic.php");
    echo "<script>alert('$message');</script>";

  }

  //Check for file size between 1MB and 50MB
  if($fileSize < 1000000 || $fileSize > 200000000){
    $message = "File size must be between 1MB and 200MB. Your file size is: ".($fileSize/1000000)."MB";
    echo "<script>alert('$message');</script>";
    exit();
  }

  //Create a unique file name
  $fileNameNew = uniqid('',true)."-".$fileActualExt;

  //Ready to upload file
  if($fileError ==  0){
    $fileDestination = 'assets/userUploads/'.$fileNameNew;
    if(move_uploaded_file($fileTmpName,$fileDestination)){
      $message = "File Upload Successful!";

      //File uploaded successful, input data to database
      $songName = $_POST['songName'];
      $query = mysqli_query($con, "INSERT INTO songs VALUES('','$songName', '1', '1', '1', '2:32', '$fileDestination', '1','0')");

      if ($query) {
        echo "<script>alert('Success!');</script>";
      } else {
        echo "<script>alert('Something went wrong');</script>";
      }

    } else {
      $message = "Something went wrong. Please try again later.";
      echo "<script>alert('$message');</script>";
    }
  } else {
    $message = "Something went wrong. Please try again later.";
    echo "<script>alert('$message');</script>";
  }
}

 ?>
