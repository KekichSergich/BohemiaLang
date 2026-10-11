<?php 
//start session
session_start();

//get the data from the file and decode it
$data = file_get_contents("../data/users.json");
$users = json_decode($data, true);

//check if user_id has the value. if does, then write this value in the new variable
if (isset($_POST["user_id"])) {
    $id = $_POST["user_id"];
} else {
    echo "ID wasn't found";
}

//delete user from the array if it was found by id
$index_to_delete = null;
foreach($users as $index => $user){
    if ($user["id"] === $id){
        $index_to_delete = $index;
        break;
    }
}
if (isset($index_to_delete)) {
    unset($users[$index_to_delete]);
}
// reindex the array
$users = array_values($users);
//save users
$users_to_save = json_encode($users, JSON_PRETTY_PRINT);
file_put_contents("../data/users.json", $users_to_save);

//// after all code redirects the user to the page he/she was on 
$users_list_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../pages/users.php';
header("location: $users_list_page");

?>