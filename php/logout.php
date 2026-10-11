<?php
session_start();
//unset session

session_destroy();
header("location: ../pages/index.php");
?> 