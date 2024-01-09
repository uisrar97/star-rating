<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rating";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $product_id = $_POST['product_id'];
    $rating_value = $_POST['rating_value'];

    $sql = "INSERT INTO ratings (product_id, rating_value) VALUES ($product_id, $rating_value)";

    if ($conn->query($sql) === TRUE) {
        echo "Rating submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>