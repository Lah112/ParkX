<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ParkX";
    $port="3308";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch feedbacks from the database
$sqlSelectFeedbacks = "SELECT * FROM feedbacks ORDER BY added_date DESC";
$feedbacks = $conn->query($sqlSelectFeedbacks);
?>