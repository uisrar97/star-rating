<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rating";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM ratings WHERE product_id=5";

    if ($conn->query($sql) === TRUE) {
        echo "Rating deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>