<?php
    session_start();
     include 'sqlDB.php';
     //为您推荐
     $sql ="select * from image LIMIT 0,3";
     $tj = executeQuery($sql);
     //原创插画
     $sql ="select * from image LIMIT 3,6";
     $ch = executeQuery($sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>仿花瓣网</title>
        <link rel="stylesheet" href="css/css.css"/>
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="stylesheet" href="css/sweetalert.css"/>
    </head>
    <body style="height: 2000px">
        <div id="header" class="clearBox" >
         <!--顶部导航栏 -->  
         <div id="header_top">             
             <ul class="top_menu" class="clearBox">
                 <li><a href="index.php"><img src="images/logo_wt.svg"></a></li>
                 <li class="menu menu_style"><a href="#" id="faxian">发现</a></li>
                 <li class="menu"><a href="search.php?search=&page=1&date=on">最新</a></li>
                 <li class="menu" ><a href="#" id="meisi">美思</a></li>
                 <li class="menu"><a href="#" id="huodong">活动<span>new</span></a></li>
                 <li class="menu"><a href="#" id="jiaoyu">教育</a></li>
                 <li class="menu"><a href="#"><img class="simg" src="images/menu1_1.png"></a></li>            
             </ul>
             <?php  include 'loginHead.php';?>
         </div>
         <?php include 'header.php';?>
         <!--顶部标题-->
         <div id="header_title">
             <img src="images/head_title.svg">
         </div>
         <!--顶部输入框-->
         <div id="header_input">
             <form id="form" action="search.php">
                 <input type="text" id="searchIndex" name="search" placeholder="搜索你喜欢的内容">
             </form>
         </div>
         <!--顶部搜索词-->
         <div id="header_searchtext">
             <span>热门搜索：</span>&nbsp;<a href="#">oppo!出错了</a>，&nbsp;<a href="#">花瓣LIVE</a>，&nbsp;<a href="#">配色</a>，&nbsp;<a href="#">壁纸哪些事儿</a>
         </div>
         </div>
<!--中部框>-->
        <!--1-->
        <div id="content">
            <div class="content_title">
                <span>大家关注</span>
            </div>
            <?php include 'contentIcon.php';?>
            <div class="content_title">
                <span>为您推荐</span>
            </div>
            <div class="content_content clearBox">
                <a href="details.php?id=<?php  echo $tj[0]['id'] ?>">
                    <div class="content_content_one" style="background:url(<?php echo $tj[0]['url'] ?>);height:250px;"></div>
                </a>
                <div class="content_content_two">
                    <div class="content_content_two_top">
                        <p><?php echo $tj[0]['name'] ?>
                            <br/><span><?php echo $tj[0]['look'] ?></span>观看
                        </p>
                        <i></i>
                    </div>
                    <div class="content_content_two_botton">
                        <p><?php echo $tj[1]['name'] ?>
                            <br/><span><?php echo $tj[1]['look'] ?></span>观看
                        </p>
                        <i></i>
                    </div>
                </div>
                  <a href="details.php?id=<?php  echo $tj[1]['id'] ?>">
                    <div class="content_content_one" style="background:url(<?php echo $tj[1]['url'] ?>);height:250px;"></div>
                </a>
                  <a href="details.php?id=<?php  echo $tj[2]['id'] ?>">
                    <div class="content_content_one" style="background:url(<?php echo $tj[2]['url'] ?>);height:250px;"></div>
                </a>
                <div class="content_content_three">
                    <p><?php echo $tj[2]['name'] ?></p>
                    <p>一<?php echo $tj[2]['brief'] ?>
                    <p><span><?php echo $tj[2]['look'] ?></span>观看</p>
                    <i></i>
                </div>
            </div>
            <!--2-->
            <div class="content_title">
                <span>原创插画</span>
            </div>
            <div class="content_content clearBox">
                <div class="content_content_four">
                    <p><?php echo $ch[0]['name'] ?><br><span><?php echo $ch[0]['look'] ?></span>观看</p>
                    <i></i>
                </div>
                <a href="details.php?id=<?php  echo $ch[0]['id'] ?>">
                    <div class="content_content_one" style="background:url(<?php echo $ch[0]['url'] ?>);height:250px;"></div>
                </a>
                <a href="details.php?id=<?php  echo $ch[1]['id'] ?>">
                    <div class="content_content_one" style="background:url(<?php echo $ch[1]['url'] ?>);height:250px;"></div>
                </a>
                
                 <div class="content_content_two">
                    <div class="content_content_two_top">
                        <p><?php echo $ch[1]['name'] ?>
                            <br/><span><?php echo $ch[1]['look'] ?></span>观看
                        </p>  
                        <i></i>
                    </div>
                    <div class="content_content_two_botton">
                        <p><?php echo $ch[2]['name'] ?>
                            <br/><span><?php echo $ch[2]['look'] ?></span>观看
                        </p>
                        <i></i>
                    </div>
                 </div>
                 <a href="details.php?id=<?php  echo $ch[2]['id'] ?>">
                    <div class="content_content_one" style="background:url(<?php echo $ch[2]['url'] ?>);height:250px;"></div>
                </a>
                <a href="#"><div class="content_content_five">更多</div></a>        
            </div>

            <div class="content_list">
                <div class="content_list_title clearBox">
                    <span class="left">以分类浏览花瓣网</span>
                    <span class="right"><a href="list.php" >所有分类</a></span>
                </div> 

            <div class="content_list_list clearBox">
                <div class="clearBox"><a href="#">工业设计</a><a href="#">工业设计</a><a href="#">工业设计</a><a href="#">工业设计</a><a href="#">工业设计</a></div>
                <div class="clearBox"><a href="#">摄影</a><a href="#">摄影</a><a href="#">摄影</a><a href="#">摄影</a><a href="#">摄影</a></div>
                <div class="clearBox"><a href="#">造型美妆</a><a href="#">造型美妆</a><a href="#">造型美妆</a><a href="#">造型美妆</a><a href="#">造型美妆</a></div>
                <div class="clearBox"><a href="#">美食</a><a href="#">美食</a><a href="#">美食</a><a href="#">美食</a><a href="#">美食</a></div>
                <div class="clearBox"><a href="#">旅游</a><a href="#">旅游</a><a href="#">旅游</a><a href="#">旅游</a><a href="#">旅游</a></div>
                <div class="clearBox"><a href="#">健康舞蹈</a><a href="#">健康舞蹈</a><a href="#">健康舞蹈</a><a href="#">健康舞蹈</a><a href="#">健康舞蹈</a></div>
                <div class="clearBox"><a href="#">手工布衣</a><a href="#">手工布衣</a><a href="#">手工布衣</a><a href="#">手工布衣</a><a href="#">手工布衣</a></div>
            </div>
           </div>
        </div>
        <?php
             include 'footer.php';
             include 'child.php';
        ?>  
      </body>
     <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
     <script type="text/javascript" src="js/public.js"></script>
     <script type="text/javascript" src="js/sweetalert.js"></script>
    <script type="text/javascript">
       $(function(){
          $(window).scroll(function(){
              if($(this).scrollTop()>200){
                  $('#header_top').css("display","none");
                  $('#header_menu').css("display","block");
              }
              else{
                  $('#header_top').css("display","block");
                  $('#header_menu').css("display","none");
              }
          }) 
       
      var j =1;
      setInterval(function(){
          if(j<4){
              j++;
          }
          else{
              j=1;
          }
          var path ="url(images/banner"+j+".jpg"
          $("#header").css("background",path);
          $("#header").css("background-size","cover");
          $("#header").css("background-position","center center");
      },3000);
       })
</script>
</html>
