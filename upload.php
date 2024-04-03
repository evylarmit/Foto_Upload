<?php

require "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file input is not empty
    if (!empty($_FILES["image"]["name"])) {
        // File upload directory
        $targetDir = "media/uploadedImages/";
        // Get the filename
        $fileName = basename($_FILES["image"]["name"]);
        // Set the target file path
        $targetFilePath = $targetDir . $fileName;
        // Get the file extension
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // Check if the file is an image
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                echo "The file " . $fileName . " has been uploaded.";
                $event = $_POST['event'];
                $query = "INSERT INTO `Upload` (`fotonaam`, `eventnaam`) VALUES ('$fileName', '$event')";
                echo $query;
                $mysqli->query($query);

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>