<?php

// get the data 
$requestData = json_decode(file_get_contents("php://input"), true);

$login = $requestData["login"];
$password = $requestData["password"];

$users = json_decode(file_get_contents("../data/users.json"), true);

$result = false;

// iterate through the array and look for a match
foreach ($users as $user) {
    if ($user["login"] == $login && password_verify($password, $user["password"])) {
        $result = true;
        break; // exit the loop once a match is found
    }
}

echo json_encode($result);

?>
