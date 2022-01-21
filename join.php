<?php
    $con = mysqli_connect("localhost", "root", "fpem3309", "study");
    mysqli_query($con,'SET NAMES utf8');

    $userId = $_POST["userId"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userName = $_POST["userName"];
    $userBirth = $_POST["userBirth"];

    $statement = mysqli_prepare($con, "INSERT INTO User VALUES (?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "sssi", $userId, $userEmail, $userPassword, $userName, $userBirth);
    mysqli_stmt_execute($statement);


    $response = array();
    $response["success"] = true;


    echo json_encode($response);
