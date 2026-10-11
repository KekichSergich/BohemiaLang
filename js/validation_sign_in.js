const errorMessageLoginArea = document.getElementById("login_error_text");
var loginInput = document.getElementById("login");
var submitButton = document.getElementById("submitButton");
var form = document.querySelector("form");



form.addEventListener("submit", async function(event){
    event.preventDefault();
    let checkUserResult = await checkUser();

    if (checkUserResult == true){
        form.submit();
    }
})


async function checkUser(){
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;

    let userExists = await checkIfUserExists(login, password);
    console.log(userExists);
    if (userExists == false){
        errorMessageLoginArea.innerText = "Your login or password is not correct!";
        return false;
    } else {
        errorMessageLoginArea.innerText = "";
        return true;
    }
}

async function checkIfUserExists(login, password){
    return fetch("../php/validation_sign_in.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({login, password})
    })
    .then(response => {
        if(!response.ok){
            throw new Error("Error during singing in");
        }
        return response.json();
    })
    .catch(error => {
        console.log(`Error during signing in ${error}`);
        return false;
    });
}

// async function signIn() {
//     let login = "Nikita"; // Замените на фактический логин
//     let password = "1111"; // Замените на фактический пароль

//     let result = await checkIfUserExists(login, password);

//     if (result == true) {
//         console.log("Login successful. Login:", login);
//     } else {
//         console.log("Login unsuccessful");
//     }
// }

// // Вызов функции signIn
// signIn();