<?php
session_start();
include 'sqlDB.php';
$num=10; // 每页显示条数
$page = isset($_GET['page'])? $_GET['page']:1; //获取当前页数
$start =($page-1)*$num; //开始所在条数
if(empty($_GET['cid'])){
    $cid=1;
}
else{
    $cid = $_GET['cid'];
}
$select_page="select count(*) as c from user,image where image.uid=user.id and cid =$cid";
$rows = executeQuery($select_page);
$count = $rows[0]['c']; //总行数
$pagecount = floor(($count-1)/$num)+1; //总页数


$sql ="select * from classify where id=$cid";
$cls = executeQuery($sql);

$sql="select image.id as id,image.url as url,image.brief as brief,image.date as date,user.username as username,user.H_portrait as H_portrait from image,user where image.uid=user.id and cid=$cid limit $start,$num" ;
$imgs= executeQuery($sql);

$pre = $page-1<1 ? 1:$page-1;
$next = $page+1>$pagecount?$pagecount:$page+1;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $cls[0]['name'];?>-花瓣网</title>
        <link rel="stylesheet" href="css/css.css"/>
        <link rel="stylesheet" href="css/list.css"/>
        <link rel="stylesheet" href="css/sweetalert.css"/>
    </head>
    <body>
        <div>
        <?php
        //导航栏
        include 'header.php';
        ?>
        </div>
        <!--banner-->
        <div id="banner">
            <div class="banner_title"><?php echo $cls[0]['name'];?></div>
            <div class="banner_name"><?php echo $cls[0]['brief'];?></div>
            <div class="banner_people">Ta们已关注</div>
            <div class="banner_icon" class="clearBox">
                <div><img src="images/list_icon1.jpg"></div>
                <div><img src="images/list_icon2.jpg"></div>
                <div><img src="images/list_icon3.jpg"></div>
                <div><img src="images/list_icon4.jpg"></div>
                <div><img src="images/list_icon5.jpg"></div>  
            </div>
        </div>
        <div id="content">
            <div class="content_title">
                <span>大家正在关注</span>
            </div>
            <?php include 'contentIcon.php';?>
            <div class="content_content clearBox">
               <?php
                       foreach ($imgs as $img){
                ?>     

            <div class="content_content_list">
                     <a href="details.php?id=<?php  echo $img['id'] ?>">
                  <div class="iteml">
                      <img src="<?php echo $img['url'];?>" alt="">
                         <span><?php echo $img['brief'];?></span>
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
              </a>
           </div>  
                
                
                <?php
                       }
                ?> 

            </div>
        </div>
        <!--分页显示-->
        <?php
              if($pagecount>=1){
        ?>
        <div class="content_page">
            <a href="list.php?cid=<?php echo $cid;?>&page=<?php echo $pre;?>">上一页</a>
        <?php
                for ($index=1;$index<=$pagecount;$index++){
                    if($index==$page)
                     echo "<a href='list.php?cid=$cid&page=$index' style='color:#d44d4e'>$index</a>";
                    else
                      echo "<a href='list.php?cid=$cid&page=$index'>$index</a>";
                }
        ?>
            <a href="list.php?cid=<?php echo $cid;?>&page=<?php echo $next;?>">下一页</a>
        </div>
        <?php
              }
        ?>
        <?php
            include 'footer.php';
            include 'child.php';
        ?>
    </body>
     <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
     <script type="text/javascript" src="js/public.js"></script>
     <script type="text/javascript" src="js/sweetalert.js"></script>
</html>
