<?php
include 'sqlDB.php';
$iid = $_POST['iid'];
$uid = $_POST['uid'];
$sql ="delete from collection where iid=$iid and uid=$uid;";
if(executeUpdate($sql)){
    echo 1;
}
else{
    echo 2;
}