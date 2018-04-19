<?php
include 'sqlDB.php';
$id = $_POST['id'];
$column =$_POST['column'];
$data =$_POST['data'];
$sql ="update `user` set $column='$data' where id=$id;";
if(executeUpdate($sql)){
    echo 1;
}
else{
    echo 2;
}