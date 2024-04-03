<?php 
    require "config.php";

    $image = $_FILES['image']['name'];

    $targetDir = "MEDIA/productimgs/";
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
        echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>