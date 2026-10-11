document.addEventListener('DOMContentLoaded', function() {
    var editButton = document.getElementById('editButton');
    var modal = document.getElementById('myModal');
    var closeButton = document.getElementsByClassName('close')[0];
    var editLoginButton = document.getElementById('edit_login_button');
    var editPasswordBbutton = document.getElementById('edit_password_button');
    var loginForm = document.getElementById("edit_login");

    var errorLoginArea = document.getElementById("errorLogin");
    var errorPassArea = document.getElementById("errorPass");
    var loginInput = document.getElementById("login");

    // Event listener for the login input to check the length of the login
    loginInput.addEventListener("keyup", checkLogin);

    // Event listener for the login form submission
    loginForm.addEventListener("submit", async function(event) {
        event.preventDefault(); 

        // Check the login before submitting the form
        let result = await checkLogin();
        if (result === true){
            loginForm.submit();
        }

    });
    // Asynchronous function to check the length of the login
    async function checkLogin() {
        var login = loginInput.value;
        let result = false;
        let loginExists = await checkIfLoginExists(login);

        if (login.length < 4 || login.length > 20) {
            errorLoginArea.innerText = "Login must be between 4 and 20 characters";
            result = false;
        } else if (loginExists === true) {
            errorLoginArea.innerText = "This login is already taken!";
            result = false;
        } else {
            errorLoginArea.innerText = "";
            result = true;
        }
        return result
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

// PASWORD

    var passForm = document.getElementById("edit_password");    
    var repPasswordInput = document.getElementById("new_pass");

    passForm.addEventListener('submit', async function(event){
        event.preventDefault();
        let result = await checkPassword();
        
        if (result === true){
            passForm.submit();
        }
    });   

    // Event listener for the repeat password input to check its length
    repPasswordInput.addEventListener("keyup", checkPassword);

    // Function to check the length of the repeat password
    async function checkPassword() {
        var repPassword = repPasswordInput.value;
        if (repPassword.length < 4 || repPassword.length > 20) {
            errorPassArea.innerText = "Password must be between 4 and 20 characters";
            return false;
        } else {
            errorPassArea.innerText = "";
            return true;
        }
    }


    // Show the modal when the edit button is clicked
    if (editButton){
        editButton.addEventListener('click', function() {
            modal.style.display = 'block';
        });
    }
    
    editLoginButton.addEventListener('click', function() {
        loginForm.style.display = 'flex';
        passForm.style.display = 'none';
    });
    editPasswordBbutton.addEventListener('click', function() {
        loginForm.style.display = 'none';
        passForm.style.display = 'flex';
    });
    // Close the modal when the close button (×) is clicked
    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close the modal if the user clicks outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});