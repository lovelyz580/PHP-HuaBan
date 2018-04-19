<?php
function  sqlConnection(){
     $conn=mysqli_connect("127.0.0.1","root","root");
           if(!$conn){
               die("数据库连接失败".mysqli_connect_error());
           }
           mysqli_set_charset($conn,"utf8");
           mysqli_select_db($conn,"huaban");
           return $conn;
}

function executeQuery($sql){
    $conn= sqlConnection();
    $result= mysqli_query($conn, $sql);
    $rows= array();
    while ($row= mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    mysqli_close($conn);
    return $rows;
}

function executeUpdate($sql){
    $conn= sqlConnection();
    $result= mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
?>