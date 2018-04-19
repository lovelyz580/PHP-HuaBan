<?php
include 'sqlDB.php';
$id = $_GET['commentid'];
$imgid = $_GET['imgid'];
$sql = "delete from comment where id=$id";
executeUpdate($sql);
header("location:details.php?id=$imgid");