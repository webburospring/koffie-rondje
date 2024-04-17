<?php
require './inc/database.php';

// Define the target directory
if ($_SERVER['REQUEST_METHOD']) {
    $target_dir = "../afbeeldingen/";

    // Check if the form was submitted
    if (isset($_POST["submit"])) {
        $naam = $_POST['naam'];
        
        // Get the temporary file path
        $file_tmp = $_FILES["file"]["tmp_name"];
        
        // Get the file name
        $file_name = basename($_FILES["file"]["name"]);
        
        // Construct the destination path
        $target_path = $target_dir . $file_name;
        $sqltarget_path = './afbeeldingen/' . $file_name; 
        // Check for errors
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"];
            exit();
        } else {
            // Check if the file already exists
            if (file_exists($target_path)) {
                echo "File already exists.";
                exit();
            } else {
                // Attempt to move the uploaded file
                if (move_uploaded_file($file_tmp, $target_path)) {
                    echo "The file " . $file_name . " has been uploaded.<br>";
                    echo '<a href="../bestel.php">Bestel pagina</a><br>';
                    echo '<a href="upload.php">Upload pagina</a>';
                    
                    // Insert the file details into the database
                    $sql = "INSERT INTO foto (naam, fotopath) VALUES ('$naam', '$sqltarget_path')";
                    $result = mysqli_query($conn, $sql);
                } else {
                    echo "Error uploading file.";
                    exit();
                }
            }
        }
    }
  


} else {
    header('Location: aanmelden.php');
}

if (isset($_POST["buttonValue"])) {
    $inputValue = $_POST["buttonValue"]; 
    $foto = $_POST['fotoValue'];
    echo $inputValue;
    echo $foto;
    // $sql = "DELETE FROM foto (naam, fotopath) VALUES ('$naam', '$sqltarget_path')";
    // $result = mysqli_query($conn, $sql);
}