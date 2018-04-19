<?php
session_start();
    if(empty($_SESSION['user'])){
        header("location:index.php");
    }
    include 'sqlDB.php';
    $user = $_SESSION['user'];
    $user2 = $user['username'];

     //分页功能
    $num=10; // 每页显示条数
    $page = isset($_GET['page'])? $_GET['page']:1; //获取当前页数
    $start =($page-1)*$num; //开始所在条数
    $select_page="select count(*) as c from user,image,collection where image.id=collection.iid and collection.uid=user.id and user.username='$user2'";
    $rows = executeQuery($select_page);
    $count = $rows[0]['c']; //总行数
    $pagecount = floor(($count-1)/$num)+1; //总页数
    $pre = $page-1<1 ? 1:$page-1;
    $next = $page+1>$pagecount?$pagecount:$page+1;
    
    //收藏的图片
    $sql="select user.id as id,collection.iid as iid,image.url as url,image.brief as brief,image.date as date,user.username as username,user.H_portrait as H_portrait from image,user,collection where image.id=collection.iid and collection.uid=user.id and user.username='$user2' limit $start,$num" ;
    $imgs= executeQuery($sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>我的信息-花瓣网</title>
        <link rel="stylesheet" href="css/css.css"/>
        <link rel="stylesheet" href="css/person.css"/>
        <link rel="stylesheet" href="css/details.css"/>
        <link rel="stylesheet" href="css/list.css"/>
        <link rel="stylesheet" href="css/sweetalert.css"/>
        <style type="text/css">
    .delete{
        display: inline-block;
        height: 30px;
        width: 50px;
        position: relative;
        top: 50px;
        font-size: 16px;
        line-height: 30px;
        text-align: center;
        cursor: pointer;
        background: #D44D4E;
        color: #FFF;
         float: right;
        margin-right: 16px;
        border-radius: 4px;
    }
    </style>
    </head>
    <body>
        <?php
        //导航栏
        include 'header.php';
        ?>
        
        <div id="content">
<!-- 头像 -->
            <div class="content_name">
                <?php echo $user['username'];?>
                 <div class="content_img">
                     <img src="<?php echo $user['H_portrait'];?>" alt="">
                </div>
            </div>
<!-- 选项卡 -->
            <div class="content_menu">
                <a href="javascript:" id="infor">个人信息</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:" id="like">我的收藏</a>
            </div>
<!-- 个人信息 -->
            <div class="content_infor" id="content_infor">
                <div class="clearBox">
                    <span>登陆名:</span>
                    <input style=" border:0px !important;" type="text" value="<?php echo $user['username'];?>" disabled/>
                </div>
                <div class="clearBox">
                    <span>密码:</span>
                    <input type="text" class="pwd" value="<?php echo $user['pwd'];?>">
                    <a href="javascript:" onclick="xiugai('pwd')">修改</a>
                </div>
                <div class="clearBox">
                    <span>性别:</span>
                    <input type="radio" class="sex" name="sex" value="男" <?php echo $user['sex']=='男'?'checked':'';?>>男
                    <input type="radio" class="sex" name="sex" value="女" <?php echo $user['sex']=='女'?'checked':'';?>>女
                    <a href="javascript:" onclick="xiugai('sex')">修改</a>
                </div>
                <div class="clearBox">
                    <span>头像:</span>
                    <div id="imgDiv" style="background-image:url(<?php echo $user['H_portrait'];?>)"></div>
                    <form id="uploadForm" method="post" enctype="multipart-form-data" style="display:inline-block">
                        <input type="hidden" name="id" value="<?php echo $user['id']?>">
                        <input type="file" id="file" name="file" hidden>
                    </form>
                    <a href="javascript:" onclick="xiugaiFile()">修改</a>
                </div>
                <div class="clearBox">
                    <span>所在地区:</span>
                    <input type="text" class="city" value="<?php echo $user['city'];?>" >
                    <a href="javascript:" onclick="xiugai('city')">修改</a>
                </div>
                <div class="clearBox">
                    <span>电话号码:</span>
                    <input type="text" class="phone" value="<?php echo $user['phone'];?>" >
                    <a href="javascript:" onclick="xiugai('phone')">修改</a>
                </div>
                <div class="clearBox">
                    <span>个人签名:</span>
                    <input type="text" class="brief" value="<?php echo $user['brief'];?>">
                    <a href="javascript:" onclick="xiugai('brief')">修改</a>
                </div>
            </div>
<!-- 我的收藏 -->          
            <div class="content_content clearBox" id="content_content">
           <!--我的收藏-->
           <?php     if(empty($imgs)){echo "<h2>你还没有收藏(ง •_•)ง</h2>";}?>
            <div class="content_content clearBox">
               <?php
                       foreach ($imgs as $img){
                ?>     
            <div class="content_content_list">
                  <div class="iteml">
                      <span class='delete' onclick='del(this)'><input type='hidden' id='iid' value='<?php echo $img['iid'];?>'><input type='hidden' id='uid' value='<?php echo $img['id'];?>'>删除</span>
                      <a href="details.php?id=<?php  echo $img['iid'] ?>">
                      <img src="<?php echo $img['url'];?>" alt="">
                       </a>
                      <span class="list_span"><?php echo $img['brief'];?></span>
                  </div>      
                  <div class="item2" clearBox>
                    <div class="item2_1">
                        <div class="item2_2" style="background:url(<?php echo $img['H_portrait'];?>);"></div>
                        <div class="item2_3">
                          <div class="item2_4">来自<?php echo $img['username'];?></div>
                          <div class="item2_5"><?php
                          $date = $img['date'];
                          $date = date('Y,m.d',$date);
                          echo $date;
                          ?></div>
                     </div>
                  </div>
                </div>
           </div>  
                
                
                <?php
                       }
                ?> 

            </div>
           <!--分页显示-->
        <?php
              if($pagecount>=1){
        ?>
        <div class="content_page">
            <a href="person.php?type=2&page=<?php echo $pre;?>">上一页</a>
        <?php
                for ($index=1;$index<=$pagecount;$index++){
                    if($index==$page)
                     echo "<a href='person.php?type=2&page=$index' style='color:#d44d4e'>$index</a>";
                    else
                      echo "<a href='person.php?type=2&page=$index'>$index</a>";
                }
        ?>
            <a href="person.php?type=2&page=<?php echo $next;?>">下一页</a>
        </div>
        <?php
              }
        ?>
           
          <!--//我的收藏-->
        </div>
         <?php
        //底部栏
        include 'footer.php';
        ?>
    </body>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/public.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script>
    <script type="text/javascript">
        function xiugaiFile(){
            var formData = new FormData($("#uploadForm")[0]);
            $.ajax({
               url:"personhead.php",
               type:"post",
               data:formData,
               async:false,
               cache:false,
               contentType:false,
               processData:false,
               success:function(d){
             // alert(d);
                  d=parseInt(d);
                  switch(d){
                      case 1:
                            swal({title:"修改成功！请退出重新登录",type:"success"});
                          break;
                      case 2:
                          swal("修改失败","","error");
                          break;
                      case 3:
                          swal("请重新选择头像","","warning");
                          break;
                      case 4:
                          swal("头像类型不符合要求","","warning");
                          break;
                  }
               }
            });
        }
        //点击头像
        $("#imgDiv").click(function(){
            $("#file").trigger("click");
        });
        function getObjectUrl(file){
            var url=null;
            if(window.createObjectURL!=undefined){
                url =window.createObjectURL(file); 
            }
            else if(window.URL!=undefined){
                url = window.URL.createObjectURL(file); //firefox mozilla
            }
            else if(window.webitURL!=undefined){
                url = window.webitURL.createObjectURL(file); //webkit or chrome
            }
            return url;
        }
        //更新信息
        $("#file").change(function(){
            var objurl=getObjectUrl(this.files[0]);
            //console.log(this.files[0].name);
            $("#imgDiv").css("backgroundImage","url("+objurl+")")
        });
        
        
        
        
        
        
        function xiugai(col){
           var data; 
           if(col=="sex"){
                data =$(".sex:checked").val();
            }
            else{
                data =$("."+col).val();
            }
            $.ajax({
               url:"updatePerson.php",
               type:"post",
               data:{id:<?php echo $user['id']?>,column:col,data:data},
               success:function(d){
                   if(d=1){
                       swal({title:"修改成功！请重新登陆",type:"success"});
                  //$("."+col).val(data);
                   }
                   else{
                       swal("修改失败","","success");
                   }
               }
            });
        }
       
         $(function(){
            $("#infor").click(function(){
               $("#content_infor").show();
               $("#content_content").hide();
               $(this).css("color","rgb(212,77,78)");
               $("#like").css("color","#333333");
            }); 
            
           $("#like").click(function(){
               $("#content_infor").hide();
               $("#content_content").show();
               $(this).css("color","rgb(212,77,78)");
               $("#infor").css("color","#333333");
            });
            <?php
            $type=$_GET["type"];
            if($type==1){
            ?>
                    $("#infor").trigger("click");
            <?php
            }
            else{
            ?>
                    $("#like").trigger("click");
            <?php
            }
            ?>
         });
         
         
         function del(obj){
        var iid = $(obj).find('#iid').val();
        var uid = $(obj).find('#uid').val();
        $.ajax({
            url:'delete.php',
            type:'post',
            data:{iid:iid,uid:uid},
            success:function(data){
                if(data==1){
                   swal({
                       type:'success',
                       title:'删除成功!'
                   },function(){
                    window.location.href="person.php?type=2";
                   });       
                }else{
                    swal('删除失败！','','error');
                    alert(uid);
                    alert(iid);
                }
            }
        })
       }
    </script>
</html>
