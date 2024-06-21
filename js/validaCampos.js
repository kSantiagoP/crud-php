function validateForm() {
    var title = document.getElementById('title').value;
    var date = document.getElementById('date').value;
    var description = document.getElementById('description').value;

    if (title === "") {
        alert("O título é obrigatório.");
        return false;
    }
    if (date === "") {
        alert("A data é obrigatória.");
        return false;
    }
    if (description === "") {
        alert("A descrição é obrigatória.");
        return false;
    }

    if(!isValidDate(date)){
        alert("O campo data deve representar uma data válida.");
        return false;
    }

    if(title.length > 255){
        alert("O título deve ter no máximo 255 caracteres.");
        return false;
    }

    if(description.length > 1000){
        alert("A descrição não pode superar 1000 caracteres.");
        return false;
    }

    return true;
}