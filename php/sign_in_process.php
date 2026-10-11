<?php
session_start();


// get login and password from the form
$login = $_POST["login"];
$password = $_POST["password"];  



$data = file_get_contents("../data/users.json");
$users = json_decode($data, true);


// function which is searching the user with the same loing in list of users
$user = findUserByLogin($login, $users);

// if user and his pass is ok, then 
if ($user && password_verify($password, $user["password"])) {
    // succeed 
    $_SESSION["logged_in"] = true;
    $_SESSION["login"] = $login;
    $_SESSION["avatar"] = $user["avatar"];

    // check if loged user is admin
    if ($user["login"] == "Admin") {
        $_SESSION["admin"] = true;
    } else {
        $_SESSION["admin"] = false;
    }
    
    // go to the main page
    header("location: ../pages/index.php");

} else {
    echo "Incorrect login or password";
}

// Function to find a user by login
/**
 * Searches for a user in the given list by matching the login.
 *
 * @param string $login The login to search for.
 * @param array $users The array containing user data.
 *
 * @return array|null Returns the user data if found, or null if not found.
 */
function findUserByLogin($login, $users) {
    foreach ($users as $user) {
        if ($user["login"] === $login) {
            return $user;
        }
    }
    return null;
}

?>