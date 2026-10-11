<?php
session_start();

//get the data from the form
$new_login = $_POST["login"];
if (strlen($new_login) < 4){
    die("Login must be at least 4 characters long");
}
if (strlen($new_login) > 20){
    die("Login must be no more than 20 characters long");
}
//get the current login from the session
$current_login = $_SESSION["login"];

//get the list of users
$data = file_get_contents("../data/users.json");
$users = json_decode($data, true) ?? [];

foreach ($users as $key => $user){
    if ($user["login"] === $current_login) {
        foreach($users as $key => $user){
            if ($user["login"] === $new_login){
                $result = false;
            } else {
                $users[$key]["login"] = $new_login;
                $result = true;
        break;
            }
        }  
    }
}

$_SESSION["login"] = $new_login;
//save data
$data_to_save = json_encode($users, JSON_PRETTY_PRINT);
file_put_contents("../data/users.json", $data_to_save);
// after all code redirects the user to the main page
header("location: ../pages/index.php");

?>
