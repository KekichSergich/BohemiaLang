<?php
// get the data
$passedLogin = json_decode(file_get_contents("php://input"), true);
// define("passedLogin", $inputData["login"]);

$users = json_decode(file_get_contents("../data/users.json"), true);

// using a loop iterates through the array and looks for login similarities
$result = false;
foreach ($users as $user){
    if ($user["login"] == $passedLogin) {
        //if found return true
        $result = true;
    }
}
// passes the value of a variable
echo json_encode($result);

?>