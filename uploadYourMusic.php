<?php

include 'includes/header.php';

include("includes/handlers/file-upload-handler.php");

 ?>

 <form action="uploadYourMusic.php" method="post" enctype="multipart/form-data" class="uploadMusicForm">
   <div class="fileInfo">
     <div class="container">
       <h2>Upload Your Song</h2>
       <input type="text" class="songName" name="songName" placeholder="Song name">
       <input type="text" class="artistName" name="artistName" placeholder="Artist name">
       <input type="text" class="albumName" name="albumName" placeholder="Album name">
       <input type="text" class="year" name="year" placeholder="Year">
       <input type="text" class="genre" name="genre" placeholder="Genre">
       <input type="file" class="fileToUpload" name="fileToUpload">
       <button class="button" type="submit" name="submit">UPLOAD</button>
     </div>
   </div>
 </form>

<?php

include 'includes/footer.php';

 ?>
