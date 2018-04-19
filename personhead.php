<?php
include 'sqlDB.php';
$id= $_POST['id'];
$file= $_FILES['file'];
if(!empty($file['name']))
{
    $name = iconv("UTF-8","GB2312",$file['name']);
//    $name = $file['name'];
    //做文件类型检查 123.123.png
    $type = strtolower(substr($name, strrpos($name,".")+1));//获取后缀
    $allow_type=array("jpg","jpeg","png","png");
    if(!in_array($type, $allow_type)){
        echo 4; //类型不符合
    }
    else{
        //完成文件的保存
        $date = time();//产生新的文件名
        //        $newPath = $date.$name; 
        $upload_path ="./uploads/".$date;
        if(move_uploaded_file($file['tmp_name'],$upload_path)){
            $sql = "update user set H_portrait='$upload_path' where id=$id";
            if(executeUpdate($sql)){
                echo 1; //更新数据库成功
            }
        }
        else {
            echo 2;//上传失败
        }
    }
}
else{
    echo 3;//没有选择上传的文件
}
