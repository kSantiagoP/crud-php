function validateForm() {
    let title = document.getElementById('title').value;
    let date = document.getElementById('date').value;
    let description = document.getElementById('description').value;

    //There are better ways to either show warnings, such as Toastr
    //and better ways to validate fields. In fact most modern web browsers
    //natively enforce and validate input fields. This script was coded
    // for training purposes only.
    if (title === "") {
        alert("The event title is mandatory.");
        return false;
    }
    if (date === "") {
        alert("Event date is mandatory.");
        return false;
    }
    if (description === "") {
        alert("Event description is mandatory");
        return false;
    }

    if(!isValidDate(date)){
        alert("Input date must be valid.");
        return false;
    }

    if(title.length > 255){
        alert("Input title must have less than 255 characters.");
        return false;
    }

    if(description.length > 1000){
        alert("Input description must have less than 1000 characters.");
        return false;
    }

    return true;
}