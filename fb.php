<?php
session_start();
include 'sqlDB.php';
$uid =$_SESSION['user']['id'];
$iid = $_POST["iid"];
$txtContent = $_POST['txtContent'];
$date = time();
$sql ="insert into comment values(null,$uid,$iid,'$txtContent',$date,0)";
executeUpdate($sql);
header("location:details.php?id=$iid");
//if(executeUpdate($sql))
//{
//    echo '1';
//}
//else{
//    echo '2';
//}
?>