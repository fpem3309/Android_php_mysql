<?php
$con = mysqli_connect("localhost", "root", "fpem3309", "study", "3306");
mysqli_query($con, 'SET NAMES utf8');

$userEmail = isset($_POST["userEmail"]) ? $_POST["userEmail"] : "";
$userPassword = isset($_POST["userPassword"]) ? $_POST["userPassword"] : "";

$statement = mysqli_prepare($con, "SELECT * FROM user WHERE userEmail = ? AND userPassword = ?");
mysqli_stmt_bind_param($statement, "is", $userEmail, $userPassword);
mysqli_stmt_execute($statement);


mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userId, $userEmail, $userPassword, $userName, $userBirth);

$response = array();
$response["success"] = false;

while (mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["userId"] = $userId;
    $response["userEmail"] = $userEmail;
    $response["userPassword"] = $userPassword;
    $response["userName"] = $userName;
    $response["userBirth"] = $userBirth;
}

echo json_encode($response);
