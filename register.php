<?php
session_start();
error_reporting(0);
      include 'sqlDB.php';
      function test_input($data){
          $data=trim($data);
          $data= htmlspecialchars($data); //防止html注入
          $data= addslashes($data); //防止sql注入
          return $data;
      }
      $username = test_input($_POST['username']);
      $password = test_input($_POST['password']);
      $yzm = test_input($_POST['yzm']);
      //判断重名
      $sql0="select * from user where username='$username'"; 
      $sql1=executeQuery($sql0);
      $sql2= $sql1[0]['username'];
      //*/判断重名
      if($yzm!=$_SESSION['code']){
          echo 2;
          return;
      }
      else if($username==$sql2){  //当输入用户名等于数据库中的用户名
          echo 4;
          return;
      }
      else {    
          $sql= "insert into user(username,pwd,H_portrait,city,phone,brief) values('$username','$password','./uploads/111.png','未填写','未填写','未填写')";
          if(executeUpdate($sql)){
              echo 1;
          }
          else{
              echo 3;
          }
      }