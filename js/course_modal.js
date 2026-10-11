document.addEventListener('DOMContentLoaded', function() {
    var submitButton = document.getElementById("submitButton");
    // var sumbitButtonForm = document.getElementById("sumbitButtonForm");
    var modal_window = document.getElementById("modal_window");
    var close_button = document.getElementById("close");
    // var successMessage = document.getElementById("successMessage");
    // var formCourse = document.getElementById("form-course");

    submitButton.addEventListener('click', function() {
        let login = document.getElementById("h4_login");
        if (!login){
            alert("You have to be registered!");
            window.location.href = "sign_up.php";
        } else {
            modal_window.style.display = 'block';
        }
    });
    close_button.addEventListener('click', function(){
        modal_window.style.display = 'none';
    });
    window.addEventListener('click', function(event){
        if (event.target == modal_window){
            modal_window.style.display = 'none';
        }
    });

    // formCourse.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     let name = document.getElementById("name").value;
    //     let surname = document.getElementById("surname").value;
    //     let date = document.getElementById("date").value;
    //     let phone = document.getElementById("phone").value;
    //     let email = document.getElementById("email").value;

    //     let formData = new FormData();
    //     formData.append('name', name);
    //     formData.append('surname', surname);
    //     formData.append('date', date);
    //     formData.append('phone', phone);
    //     formData.append('email', email);
    //     console.log(formData);
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('POST', "../php/register_program_form.php", true);
    //     xhr.onload = function() {
    //         if (xhr.status === 200) {
    //             modal_window.style.display = 'none';
    //             successMessage.style.display = 'block';
    //         }
    //     };
    //     console.log(formData);
    //     xhr.send(formData);
    // });

    // window.addEventListener('click', function(event){
    //     if (event.target == successMessage){
    //         successMessage.style.display = 'none';
    //     }
    // });

})