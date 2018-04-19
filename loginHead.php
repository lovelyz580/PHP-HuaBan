<?php
//登陆状态的显示
echo '<div class="top_right">';
if(isset($_SESSION['user'])){
    echo "<div class='top_login'>";
    echo "<img src='{$_SESSION['user']['H_portrait']}'>";
    echo '<div class="sitting" id="sitting">';
    echo '<a href="person.php?type=1"><img src="images/persion-icon.png">个人信息</a>';
    echo '<a href="person.php?type=2"><img src="images/like-icon.png">我的收藏</a>';
    echo '<a href="logout.php"><img src="images/quit-icon.png">退出登陆</a>';
    echo "</div>";
    echo "</div>";
}
else{
    echo '<a class="top_right_reguster" href="javascript:">注册</a>';
    echo '<a class="top_right_login"    href="javascript:">登录</a>';
}
echo '</div>';

?>
