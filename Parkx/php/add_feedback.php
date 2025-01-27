<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ParkX";
    $port="3308";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["userId"]) && isset($_POST["vehicleId"]) && isset($_POST["feedback"])) {
        
        echo '<script>alert("Form submitted successfully!");</script>';

        $userId =$_POST["userId"];
        $vehicleId = $_POST["vehicleId"];
        $feedback = $_POST["feedback"];

        // Create the database if it doesn't exist
    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS parkingreservation";
    if ($conn->query($sqlCreateDB) === true) {
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Select the database
    $conn->select_db($dbname);

    // Create the feedback table if it doesn't exist
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS feedbacks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        userId TEXT,
        vehicleId TEXT,
        feedback TEXT,
        added_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($sqlCreateTable) === true) {
    } else { 
        echo "Error creating table: " . $conn->error;
    }

        // Use an INSERT INTO statement to add a new feedback record
        $sqlInsertFeedback = "INSERT INTO feedbacks (userId, vehicleId, feedback) VALUES ('$userId', '$vehicleId', '$feedback')";

        if ($conn->query($sqlInsertFeedback) === true) {
            // Feedback added successfully
            echo '<script>location.reload();</script>'; // Reload the page
        } else {
            echo "Error adding feedback: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
