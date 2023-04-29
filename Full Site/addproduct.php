<?php

require('config/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $image = $_FILES["file"]["name"];
    $imageTmp = $_FILES["file"]["tmp_name"];
    $description = $_POST["desc"];
    $price = $_POST["price"];
    $name = $_POST["name"];
    $sellStatus = $_POST["sell_status"];
    
    $user_id= $_SESSION['username'];

    // Upload the image file to a desired directory
    $targetDir = "images/";
    $targetFile = $targetDir . basename($image);
    move_uploaded_file($imageTmp, $targetFile);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO products (image, description, price, sell_status, name, user_id) VALUES ('$image', '$description', '$price', '$sellStatus', '$name', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
