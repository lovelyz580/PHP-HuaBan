<?php 
session_start();
include 'sqlDB.php';
if(isset($_SESSION['user'])){
    $iid = $_POST['iid'];//图片id
    $uid = $_SESSION['user']['id'];//用户的id
    $sql1 = "select count(*) as count from collection where uid=$uid and iid=$iid";
    $row= executeQuery($sql1);
    if($row[0]['count']>=1){
        echo 3;
        return;
    }
    $sql="INSERT INTO collection VALUE(null,$uid,$iid)";
    if(executeUpdate($sql)){
        echo 1;
    }
    else{
        echo 2;
    }
}
else{
    echo 4;//未登录
}
?>