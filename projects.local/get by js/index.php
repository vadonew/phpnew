<?php

$dbc = mysqli_connect('MySql-8.0','root','','userinfo');

$data = json_decode(file_get_contents('php://input'), true);
$user_name = $data['user_name'];
$phone = $data['phone'];
$email = $data['email'];

$query = "INSERT INTO userinfo ( user_name,phone,email) VALUES('$user_name','$phone','$email')"; 

$result = mysqli_query($dbc,$query);

http_response_code('201');
header('Content-type: application/json');
print json_encode(array('message' => ' you are registered'));

mysqli_close($dbc);
