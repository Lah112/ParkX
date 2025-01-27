function deleteFeedback(feedbackId) {
    if (confirm("Are you sure you want to delete this feedback?")) {
        // Make an AJAX request to delete the feedback
        const xhr = new XMLHttpRequest();
        xhr.open('POST', './php/delete_feedback.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
            }
        };
        xhr.send(`feedbackId=${feedbackId}`);

    }
    location.reload();
}