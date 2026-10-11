<?php
session_start();

$new_pass = $_POST["new_pass"];
$current_login = $_SESSION["login"];

if (strlen($new_pass) < 4){
    die("Password must be at least 4 characters long");
}
if (strlen($new_pass) > 20){
    die("Password must be no more than 20 characters long");
}

$data = file_get_contents("../data/users.json");
$users = json_decode($data, true) ?? [];

// Find the user with the current login and update the password
foreach ($users as $key => $user){
    if ($user["login"] === $current_login){
        $users[$key]["password"] = password_hash($new_pass, PASSWORD_DEFAULT);
        break;
    }
}

// Save data
$data_to_save = json_encode($users, JSON_PRETTY_PRINT);
file_put_contents("../data/users.json", $data_to_save);

// Redirect the user to the main page
header("location: ../pages/index.php");
?>
