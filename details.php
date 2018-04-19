<?php
       session_start();
        include 'sqlDB.php';
        $id = $_GET["id"];
        $sql="select image.id as id,image.url as url,image.date as date,user.username as username,user.H_portrait as H_portrait from image,user where image.uid=user.id and image.id=$id";
        $img= executeQuery($sql);

        function T($time){
            $nowTime =time();
            $t=$nowTime-$time;
         if($t<=10){
             $str="刚刚";
         }
         else if ($t>10 && $t<=60) {
             $str=$t."秒内";
         }
         else if ($t>60 && $t<=60*60){
             $str = floor($t/60)."分钟前";
         } 
         else if ($t>60*60 && $t<=60*60*24) {
                $str = floor($t/(60*60))."小时前";
         }
         else if ($t>60*60*24 && $t<=60*60*24*7) {
                $str = floor($t/(60*60*24))."天前";
         }
         else if ($t>60*60*24*7 && $t<=60*60*24*7*4) {
                $str = floor($t/60*60*24*7)."周前";
         }
        else if ($t>60*60*24*7*4 && $t<=60*60*24*365) {
                $nowM =date('m',$nowTime);
                $m =date('m',$time);
                if($nowTime<$m){
                    $str =12+($nowM-$m)."个月前";
                }
                else{
                     $str =($nowM-$m)."个月前"; 
                }   
         }
         else if($t>60*60*24*365){
             $str=date("Y",$nowTime)-date("Y",$time)."年前";
        }
        return $str;
        }
        
        
        $num=5; // 每页显示条数
        $page = isset($_GET['page'])? $_GET['page']:1; //获取当前页数
        $start =($page-1)*$num; //开始所在条数
        $select_page="select count(*) as c from `comment` where `comment`.iid=$id";
        $rows = executeQuery($select_page);
        $count = $rows[0]['c']; //总行数
        $pagecount = floor(($count-1)/$num)+1; //总页数
        $sql ="select `comment`.id as cmtid,`comment`.conent as conent,`comment`.date as date,`user`.id as uid,`user`.username as username,`user`.H_portrait as h_p from `comment`,`user`
        where `comment`.uid=`user`.id and `comment`.iid=$id order by `comment`.date desc limit $start,$num";
        $comments= executeQuery($sql); //获得所有评论
        $pre = $page-1<1 ? 1:$page-1;
        $next = $page+1>$pagecount?$pagecount:$page+1;


?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        //导航栏
        include 'header.php';
        ?>
        <title>图片详情-花瓣网</title>
        <link rel="stylesheet" href="css/css.css"/>
        <link rel="stylesheet" href="css/details.css"/>
        <link rel="stylesheet" href="css/sweetalert.css"/>
    </head>
    <body>
        </div>
        <div id="content" class="clearBox">
            <div class="content_left">
                <div class="clearBox">
                    <input type="button" id="btnshou" value='收藏'>
                    <input type="button" id="btnback" value='返回'>
                </div>
                <img src="<?php echo $img[0]['url'] ?>" alt="">
             <!--jiathisbuttonbegin-->
             <div id="ckepop">
                 <a href="http://www.jiathis.com/share/" class="jiathis_txt jtico jtico_jiathis" target="_blank">分享到：</a>
                 <a class="jiathis_button_tsina">新浪微博</a>
                 <a class="jiathis_button_qzone">QQ空间</a>
                 <a class="jiathis_button_weixin">微信</a>
                 <a class="jiathis_button_tools_2"></a>
             </div>
             <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
             <!--jiathisbuttonbegin-->
            </div>
            <div class="content_right">
                <div class="content_name clearBox">
                    <div class="content_name_img" style="background: url(<?php echo $img[0]['H_portrait'] ?>)"></div>
                    <div class="content_name_title">
                        <p><?php echo $img[0]['username'] ?></p>
                        <p><?php echo T($img[0]['date']) ?></p>
                    </div>
                </div>
                <!--评论-->
                <?php
                        foreach ($comments as $comment) {
                ?>
                <div class="content_comment">
                    <div class="clearBox">
                        <div id="imgDiv" style="background:url(<?php echo $comment['h_p'];?>)"></div>
                        <span><?php echo $comment['username'];?></span>
                        <span><?php echo T($comment['date']);?></span>
                    </div>
                    <div class="content_comment_content">
                       <?php echo $comment['conent'];?>
                    </div>
                    <?php
                    //当自己发布评论时显示删除
                        if(isset($_SESSION['user']) && $comment['uid']==$_SESSION['user']['id']){
                            echo "<span class='delectcomment'><a style='color:rgba(51,51,51,0.6)' href='deleComment.php?commentid={$comment['cmtid']}&imgid=$id'>删除</a></span>";
                        }
                    ?>
                </div>
                <?php
                }
                ?>
                <!-- 分页-->
           <?php
           if($pagecount>=1){
            ?>
            <div class="content_page">
                <a href="details.php?id=<?php echo $id;?>&page=<?php echo $pre;?>">上一页</a>
            <?php
                    for ($index=1;$index<=$pagecount;$index++){
                        if($index==$page)
                         echo "<a href='details.php?cid=$id&page=$index' style='color:#d44d4e'>$index</a>";
                        else
                          echo "<a href='details.php?id=$id&page=$index'>$index</a>";
                    }
            ?>
                <a href="details.php?id=<?php echo $id;?>&page=<?php echo $next;?>">下一页</a>
            </div>
            <?php
                  }
            ?>
                <!-- //分页-->
                <form action="fb.php" method="post" id="plform">
                    <input type="hidden" name="iid" value="<?php echo $id ?>">
                    <textarea class="content_text" name="txtContent" placeholder="请登陆后发表评论" rows="3"  maxlength="10" onchange="this.value=this.value.substring(0, 20)" onkeydown="this.value=thiszx.value.substring(0, 20)" onkeyup="this.value=this.value.substring(0, 20)" ></textarea>
                    <div>
                        <input type="button" value="评论" id="btnPing">
                    </div>
                </form>
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
         //返回按钮
        $("#btnback").click(function(){
            window.history.go(-1) 
        });
        //收藏
        $("#btnshou").click(function(){
            $.ajax({
                url:"shoucang.php",
                type:"post",
                data:{"iid":<?php echo $img[0]['id'] ?>},
                success:function(data){
                    if(data==4){
                        swal({"title":"未登录",
                              "text":"请先登录",
                              "type":"warning" });
                    }
                    else if(data==1){
                        swal("收藏成功!","请到我的收藏中查看","success");
                    }
                    else if(data==2){
                         swal("收藏失败!","","success");
                    }
                    else if(data==3){
                         swal("不能重复收藏!","","warning");
                    }
                }
            });
        });
        //发表评论
        $("#btnPing").click(function(){
        //动态生成js
        <?php   
                if(empty($_SESSION['user'])){
        ?>
                 swal("请先登陆","","warning");
        <?php
                }
                else{
        ?>
               $("#plform").submit();
        <?php
                }
        ?>
        });
     })
     </script>
</html>
