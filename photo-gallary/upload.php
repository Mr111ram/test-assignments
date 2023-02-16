<?php

$path = "photos/";
$currentFile = $path . basename($_FILES["photo"]["name"]);
$imageFileType = strtolower(pathinfo($currentFile, PATHINFO_EXTENSION));
$uploadSuccess = true;

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);

    if ($check === false) {
        echo "Not an image.";
        $uploadSuccess = false;
    }
}

if ($_FILES["photo"]["size"] > 5000000) {
    echo "File is too big!";
    $uploadSuccess = false;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Format is not supported!";
    $uploadSuccess = false;
}

if ($uploadSuccess && move_uploaded_file($_FILES["photo"]["tmp_name"], $currentFile)) {
    echo "Image " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " uploaded. <br/> <a href='/photo-gallary/'>Go back</a>";
}
