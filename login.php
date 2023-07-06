<?php
require "db.php";

$db = new DataBase();
$username=$_POST['username'];
$password=$_POST['password'];

if (!isset($username) || !isset($password)){
    echo "All fields are required";
    return;
}

$db_result = $db->login($username, $password);

if (!$db_result['password'] || !password_verify($password, $db_result['password'])) {
    echo "Username or Password wrong";
}
echo "Login Success";
      
?>