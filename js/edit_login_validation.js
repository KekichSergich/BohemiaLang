const errorMessageLoginArea = document.getElementById("errorLogin");
var form = document.getElementById("edit_login").value;
var loginInput = document.getElementById("login");

loginInput.addEventListener("keyup", checkLogin);

async function checkLogin(){    
    var login = document.getElementById("login").value;
    let loginExists = await checkIfLoginExists(login);
    if (loginExists == true){
        errorMessageLoginArea.innerText = "This login is alredy exist!";
        return false;
    } else {
        errorMessageLoginArea.innerText = "";
        return true;
    }
}

if(form){
    form.addEventListener("submit", async function(event){
        event.preventDefault();
        let loginFunctionResult = await checkLogin();
        let passwordFunctionResult = await checkPassword();
        let avatarResult = checkAvatar();  
    
        if (loginFunctionResult === true && passwordFunctionResult === true) {
            form.submit();
        }
    });
}

async function checkIfLoginExists(login){
    return fetch("../php/validation_registration.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(login)
    })
    .then(response => {
        if (!response.ok){
            throw new Error("Error during checking login");
        }
        return response.json();
    })
    .catch(error => {
        console.log(`Error during login checking ${error}`);
        return false;
    });
} 