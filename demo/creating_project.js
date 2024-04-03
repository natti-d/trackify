const colors = ["red-bg", "orange-bg", "yellow-bg", "lime-bg", "lightgreen-bg", "green-bg", "blue-bg", "purple-bg", "pink-bg"];

var name_of_project = null;
var background = 'blue-bg';
var description = null;
var create_btn = document.getElementById('create-project-btn');

/*Селектира се цветовата гама на проект*/
function selectedColor(color) {
    colors.forEach(item => {
        if (item != color) {
            let other = document.getElementById(item);
            other.classList.add('opacity-50');
            other.innerHTML = 'A';
        }
    });
    let select = document.getElementById(color);
    select.innerHTML = '<i class="bi bi-check"></i>';
    select.classList.remove('opacity-50');
    document.getElementById('project-pattern').src = ("./images/patterns for projects/" + (color + "2.png"));
    background = color;
}

/*Верифицира се, че данните не са празни*/
function verificateData(){
    name_of_project = document.getElementById('name-of-project').value;
    description = document.getElementById('description').value;

    if (!(/[a-zA-Z]/.test(name_of_project) && /[a-zA-Z]/.test(description))) {
        create_btn.disabled = false;
    }
}

/*Рестартиране на модала за създаване*/
function restartCreateModal() {
    $('#create').modal('hide');

    setTimeout(function () {
        $('#name-of-project').val('');
        $('#description').val('');
        create_btn.disabled = true;
        colors.forEach(item => {
            let color_block = document.getElementById(item);
            color_block.classList.remove('opacity-50');
            color_block.innerHTML = 'A';
        });
        document.getElementById('project-pattern').src = ("./images/patterns for projects/blue_bg2.png");
    }, 1000);

}