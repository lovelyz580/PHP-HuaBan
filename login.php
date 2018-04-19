<?php
session_start();
include 'sqlDB.php';
function test_input($data){
    $data=trim($data);
    $data= htmlspecialchars($data); //防止html注入
    $data= addslashes($data); //防止sql注入
    return $data;
}
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$sql = "select * from user where username='$username' and pwd='$password'";
$users = executeQuery($sql);
if(empty($users)){
    echo 2;
}
else {
     //成功
     $_SESSION['user']=$users[0];
     echo 1;
}