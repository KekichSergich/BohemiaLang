var submitButton = document.getElementById("submitButton");

submitButton.addEventListener("click", checkIfUserIsRegistered);

function checkIfUserIsRegistered(){
    let login = document.getElementById("h4_login");
    if (!login){
        alert("You have to be registered!");
    }
}