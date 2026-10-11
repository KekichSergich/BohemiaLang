<?php
session_start();

$login = htmlspecialchars($_POST["login"]);
$password = htmlspecialchars($_POST["password"]);
$confirm_password = htmlspecialchars($_POST["reppasword"]);
$id = uniqid();

/**
 * Add a new user to the system.
 *
 * @param string $login User's login.
 * @param string $password User's password.
 * @param string $confirm_password Confirmation of the user's password.
 * @param string $avatarFilename Filename of the user's avatar.
 * @param string $id Unique identifier for the user.
 * @return void This function does not return a value.
 */
function addUser($login, $password, $confirm_password, $avatarFilename, $id) {
    // Get a list of existing users
    $allUsers = listUsers();

    // Validate login length
    if (strlen($login) < 4) {
        die("Login must be at least 4 characters long");
    }

    // Validate password length
    if (strlen($password) < 4) {
        die("Password must be at least 4 characters long");
    }

    // Check if passwords match
    if ($password != $confirm_password) {
        die("Your passwords are different! Try again!");
    }

    // Check if the login already exists
    if (!empty($allUsers)) {
        foreach ($allUsers as $user) {
            if ($user['login'] == $login) {
                echo "Login already exists";
                exit;
            }
        }
    }

    // Create a new user
    $new_user = [
        "login"          => $login,
        "password"       => password_hash($password, PASSWORD_DEFAULT),
        "avatar"         => $avatarFilename,
        "id"             => $id
    ];

    // Add the new user to the list
    $allUsers[] = $new_user;

    // Save the updated list of users
    saveUsers($allUsers);
}


// Save the avatar
$file_folder = '../data/uploads/';
$avatarFilename = "";

if ($_FILES["avatar"]["error"] != UPLOAD_ERR_NO_FILE) {
    $avatarFileExtension = pathinfo(basename($_FILES["avatar"]["name"]), PATHINFO_EXTENSION);

    // Validate avatar file extension
    $allowedExtensions = ["jpg", "jpeg", "png"];
    if (!in_array(strtolower($avatarFileExtension), $allowedExtensions)) {
        die("Avatar must be only jpeg, jpg or png");
    }

    $avatarFilename = $id . "." . $avatarFileExtension;
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $file_folder . $avatarFilename);
} 


/**
 * Retrieve the list of users from a JSON file.
 *
 * @return array The list of users, decoded from the JSON file.
 */
function listUsers() {
    $data = file_get_contents("../data/users.json");
    return json_decode($data, true) ?? [];
}

/**
 * Save the list of users by encoding it in JSON format and writing it to a file.
 *
 * @param array $users The list of users to be saved.
 */
function saveUsers($users) {
    $json_data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents("../data/users.json", $json_data);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addUser($login, $password, $confirm_password, $avatarFilename, $id);
}

$_SESSION["registered"] = true;
$_SESSION["login"] = $login;
$_SESSION["avatar"] = $avatarFilename; 
if ($login == "Admin"){
    $_SESSION["admin"] = true;
} else {
    $_SESSION["admin"] = false;
}

header("location: ../pages/index.php");
exit; 

?>