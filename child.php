<div id="login" class="div1">
    <div class="login">
        <div class="close">
            <a href="#">X</a>
        </div>
        <div class="login2">
            <img src="images/logo1.png">
        </div>
        <div class="content">
            使用第三方登陆
        </div>
        <img src="images/ananan.png" alt="" id="threeLogin" style="margin-top:15px;">
        <div class="content">
            使用账号密码登陆
        </div>
        <div class="write">
            <input type="text" id="username" placeholder="输入花瓣网账号">
            <input type="password" id="password" placeholder="输入密码">
            <a href="#" id="loginbutton" class="button">登陆</a>
        </div>
        <span>没有账号？<a href="javascript:" class="top_right_reguster_rel">点击注册</a></span>
    </div>
</div>


<div id="register" class="div1">
    <div class="register">
        <div class="close">
            <a href="#">X</a>
        </div>
        <div class="login2">
            <img src="images/logo1.png">
        </div>
        <div class="content">
            使用用户名注册
        </div>
        <div class="write">
            <input type="text" id="reg_username" placeholder="字母开头字母数6-11位">
            <input type="password" id="reg_password" placeholder="字母数字组合8-15位">
            <div>
                <input type="text" id="yzmInput" placeholder="请输入验证码" class="input">
                <span><img id="yzm" src="code.php" style="width:100%;height:100%;cursor:pointer;" alt=""></span>
            </div>
            <a href="#" id="regButton" class="button">注册</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(this).attr("src","code.php");
</script>