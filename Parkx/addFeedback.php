<?php
include 'php/config1.php';
?>

<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="css/HeaderFooter.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/addFeedback.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="js/addFeedback.js"></script>
        <?php
            include 'php/fetch_feedback.php';
        ?> 
        <script src="js/deleteFeedback.js"></script>
        <script src="js/updateFeedback.js"></script>
        <title>ParkX.com</title>
	</head>

	<body>

    <div class="feedback-page" style="background-image: url('images/background.jpg');" >
 
    <div class="top-corner">
    <div id="currentDate">Date: </div>
    <div id="currentTime">Time: </div>
    </div>

    
    
  <script>
    function updateDateTime() {
    const dateElement = document.getElementById("currentDate");
    const timeElement = document.getElementById("currentTime");
    const currentDate = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = currentDate.toLocaleDateString('en-US', options);
    
    // Format the time (hours, minutes, seconds)
    const hours = currentDate.getHours();
    const minutes = currentDate.getMinutes();
    const seconds = currentDate.getSeconds();
    const formattedTime = `${hours}:${minutes}:${seconds}`;

    dateElement.textContent ="Date:"+ formattedDate;
    dateElement.style.color = "red";
    dateElement.style.textAlign= "left";
    timeElement.textContent = "Time:"+ formattedTime;
    timeElement.style.textAlign = "left";
    timeElement.style.color= "red";
}

// Call the function to update the date and time when the page loads
updateDateTime();

// Update the date and time every second
setInterval(updateDateTime, 1000);
</script>




    <?php
            include 'php/header.php';
    ?> 
    
    <div class="d-flex flex-column p-5" style="z-index:3;">
        <h1>Add Feedback</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Enter Your Feedback</label>
                <textarea class="form-control" id="feedbackInput" name="feedbackInput" rows="3"
                    style="width: 100%;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary"  onclick="addFeedback()">ADD FEEDBACK</button>
        </form>
    </div>

     
            <?php
            if ($feedbacks->num_rows > 0) {
                while ($row = $feedbacks->fetch_assoc()) {
                    echo '<div class="card w-100 my-4" style="width: 18rem;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["userId"] . '</h5>';
                    echo '<div class="feedback-container">';
                    if ($row["userId"] === "user22") {
                        // Display feedback edit form
                        echo '<p class="card-text feedback-text" id="feedback-text-' . $row["id"] . '">'
                            . $row["feedback"] . '</p>';
                        echo '<form class="edit-feedback-form" style="display: none;" id="edit-feedback-form-' . $row["id"] . '">';
                        echo '<input type="hidden" name="feedbackId" value="' . $row["id"] . '">';
                        echo '<textarea class="form-control" id="editedFeedback-' . $row["id"] . '" rows="3">' . $row["feedback"]
                            . '</textarea>';
                        echo '<button type="button" class="btn btn-primary" onclick="updateFeedback(' . $row["id"] . ')">Update</button>';
                        echo '</form>';
                        echo '<button class="btn btn-success my-3 edit-feedback-button" onclick="editFeedback(' . $row["id"]
                            . ')">Edit</button>';

                        echo '<button class="btn btn-danger my-3 edit-feedback-button" onclick="deleteFeedback('. $row["id"] .')">Delete</button>';
                        
                    } else {
                        // Display feedback text (not editable)
                        echo '<p class="card-text feedback-text" id="feedback-text-' . $row["id"] . '">'
                            . $row["feedback"] . '</p>';
                    }
                    echo '</div>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">Added on ' . $row["added_date"] . '</h6>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No feedbacks yet.";
            }
            ?>
        </ul>
        </div>
        </div>
    

        </div>
        <?php
            include 'php/footer.php';
        ?> 
    </body>
</html>