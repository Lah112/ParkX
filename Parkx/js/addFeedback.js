function addFeedback(){
    const feedback = document.querySelector(`#feedbackInput`).value;
    const userId = "user22";
    const vehicleId = "232";
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './php/add_feedback.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            
        }
    };
    xhr.send(`userId=${userId}&vehicleId=${vehicleId}&feedback=${feedback}`);
    location.reload();
}