// LOGIN

const errorMessageLoginArea = document.getElementById("login_error_text");
const errorMessageAvatarArea = document.getElementById("errorMessageAvatarArea");
var loginInput = document.getElementById("login");
var submitButton = document.getElementById("submitButton");
var form = document.getElementById("form");

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
// check the avatar
function checkAvatar() {
    var avatar = document.getElementById("file").value;
    var avatarInput = document.getElementById("file");
    var allowedExtensions = ["jpg", "jpeg", "png"];
    var avatarFileExtension = avatar.split('.').pop().toLowerCase();

    if (avatar !== "") {
        if (!allowedExtensions.includes(avatarFileExtension)) {
            errorMessageAvatarArea.innerText = "Avatar must be only jpeg, jpg or png";
            avatarInput.value = "";  // Clear the input value if invalid
            return false;
        } else {
            errorMessageAvatarArea.innerText = "";
            return true;
        }
    }
}

//dont send the form before checking the data 

form.addEventListener("submit", async function(event){
    event.preventDefault();
    let loginFunctionResult = await checkLogin();
    let passwordFunctionResult = await checkPassword();
    let avatarResult = checkAvatar();  

    if (loginFunctionResult === true && passwordFunctionResult === true && avatarResult === true) {
        form.submit();
    }
})


//fetch
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

// PASSWORDS

const errorMessageRepassArea = document.getElementById("repass_error_text");
const errorMessagePassArea = document.getElementById("pass_error_text");
var reppaswordInput = document.getElementById("reppasword");

reppaswordInput.addEventListener("keyup", checkPassword);

async function checkPassword(){
    var password = document.getElementById("password").value;
    var reppasword = document.getElementById("reppasword").value;
    if (reppasword != ""){
        if (password != reppasword){
            errorMessageRepassArea.innerText = "Your passwords are different!";
            errorMessagePassArea.innerText = "Your passwords are different!";
            return false;    
        } else {
            errorMessageRepassArea.innerText = "";
            errorMessagePassArea.innerText = "";
            return true;
        }
    }  
}
