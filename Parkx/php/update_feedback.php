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
    if (isset($_POST["editedFeedback"]) && isset($_POST["feedbackId"])) {
        echo '<script>alert("Form submitted successfully!");</script>';
        $feedbackId = (int)$_POST["feedbackId"]; // Cast to integer
        $editedFeedback = $conn->real_escape_string($_POST["editedFeedback"]);

        $sqlUpdateFeedback = "UPDATE feedbacks SET feedback = '$editedFeedback' WHERE id = $feedbackId"; // Use $feedbackId directly
        if ($conn->query($sqlUpdateFeedback) === true) {
            // Feedback updated successfully
            location.reload();
            header("Location: your-feedback-page.php"); // Redirect to your feedback page
        } else {
            echo "Error updating feedback: " . $conn->error;
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
