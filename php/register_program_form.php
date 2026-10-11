<?php
session_start();

if (empty($_SESSION["login"])) {
    header("location: ../pages/sign_in.php");
} else {

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $date = $_POST["date"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $program = $_POST["programs"];

    $new_application = [
        "name"      => $name,
        "surname"   => $surname,
        "date"      => $date,
        "phone"     => $phone,
        "email"     => $email,
        "programs"  => $program
    ];
    
    $data = file_get_contents("../data/applications.json");
    $applications = json_decode($data, true) ?? [];
    
    // save new application
    $applications[] = $new_application;
    
    // save the list of applications
    $json_data = json_encode($applications, JSON_PRETTY_PRINT);
    file_put_contents("../data/applications.json", $json_data);
    
}
header("location: ../pages/index.php");
?>