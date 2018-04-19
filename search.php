<?php
session_start();
include 'sqlDB.php';
$num=10; // 每页显示条数
$page = isset($_GET['page'])? $_GET['page']:1; //获取当前页数
$start =($page-1)*$num; //开始所在条数
$search = $_GET['search'];
$select_page="select count(*) as c  from user,image where image.uid=user.id and image.brief like '%$search%'";
$rows = executeQuery($select_page);
$count = $rows[0]['c']; //总行数
$pagecount = floor(($count-1)/$num)+1; //总页数
//echo $count;

$sql="select * from user,image where image.uid=user.id and image.brief like '%$search%' limit $start,$num";
$imgs= executeQuery($sql);

$pre = $page-1<1 ? 1:$page-1;
$next = $page+1>$pagecount?$pagecount:$page+1;


//排序功能
$sql2="select * from user,image where image.uid=user.id and image.brief like '%$search%' order by date desc limit $start,$num";
if(empty($_GET['date'])){
    
}
else{
   $imgs= executeQuery($sql2);
}
//*/排序功能
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if(!empty($search)){echo $search;}else{echo '全部';}; ?>的搜索结果</title>
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
        <div class="search_img">
          <div class="search_font">
                国内最优质图片灵感库<br>
                已有数百万出众网友，用花瓣网保存喜欢的图片。
            </div>
        </div>
        <?php
              if($pagecount>=1){
        ?>
        <div class="paixu2">
            排序:<a href="search.php?search=<?php echo $search;?>&page=<?php echo $page;?>&date=on">按日期排序</a>
        </div>
        <?php
              }
        ?>
        <div id="content">
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
            <a href="search.php?search=<?php echo $search;?>&page=<?php echo $pre;?>">上一页</a>
        <?php
                for ($index=1;$index<=$pagecount;$index++){
                    if($index==$page)
                     echo "<a href='search.php?search=$search&page=$index' style='color:#d44d4e'>$index</a>";
                    else
                      echo "<a href='search.php?search=$search&page=$index'>$index</a>";
                }
        ?>
            <a href="search.php?search=<?php echo $search;?>&page=<?php echo $next;?>">下一页</a>
        </div>
        <?php
              }
              else {
                  echo '<p style="text-align: center;">抱歉，未搜索到此关键词。<p>';
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
