<?php

$con = mysqli_connect('localhost', 'root', 'fpem3309', 'study');

//var_dump($con);

mysqli_set_charset($con, "utf8");

$res = mysqli_query($con, "select * from User");
$result = array();

while ($row = mysqli_fetch_array($res)) {
    array_push($result, array(
        'userId' => $row[0], 'userEmail' => $row[1], 'userPassword' => $row[2],
        'userName' => $row[3], 'userBirth' => $row[4]
    ));
}

echo json_encode(array("result" => $result));

mysqli_close($con);
