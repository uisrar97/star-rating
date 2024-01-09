<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rating";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function getRatingFunc($conn)
{
    $sql = "SELECT * FROM ratings WHERE product_id=5";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $ratingVal = (isset($row['rating_value'])) ? $row['rating_value'] : 0;

    return $ratingVal;
}


?>