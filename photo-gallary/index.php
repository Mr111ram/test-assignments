<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photo Gallery</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <header>
    <div>
      <a style="display: block;" href="../">back</a>
      <h1>Photo Gallery</h1>
    </div>
	  <div>
      <h2>Add a Image</h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="photo">Upload image:</label>
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Upload">
      </form>
    </div>
  </header>
	<main class="gallery">
<?php

$dir = 'photos/';
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
$files = scandir($dir);

foreach ($files as $file) {
    $file_info = pathinfo($file);

    if (in_array(strtolower($file_info['extension']), $allowed_types)) {
        echo '<img class="image" src="' . $dir . $file . '" alt="' . $file_info['filename'] . '">';
    }
}

?>
  </main>
</body>
</html>