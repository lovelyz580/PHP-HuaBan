$(function(){
    //点击登陆
    $(".top_right_login").click(function(){
      $("#login").show();
      $("#register").hide();
    });
     //点击注册
    $(".top_right_reguster,.top_right_reguster_rel").click(function(){
      $("#login").hide();
      $("#register").show();
    });
    //关闭按钮
    $(".close").click(function(){
        $(".div1").hide();
    });
    //加载验证码
    $("#yzm").click(function(){
        $(this).attr("src","code.php");
    });
    //第三方登陆
    $('#threeLogin').click(function(){
       swal("暂不支持第三方登陆");
    });
    //正则表达式判断
     $('#regButton').click(function(){
         var username=$('#reg_username').val(); //得到用户名
         var reg = /^[a-zA-Z][a-zA-Z0-9]{5,10}$/;
         if(!reg.test(username)){
             swal("用户名格式不正确!");
             return;
         }
         var password=$('#reg_password').val(); //得到密码
         var reg = /^[a-zA-Z][a-zA-Z0-9]{7,14}$/;
         if(!reg.test(password)){
             swal("密码格式不正确!");
             return;
         }
         //注册功能
         $.ajax({
            url:"register.php",
            data:{username:$("#reg_username").val(),password:$("#reg_password").val(),yzm:$("#yzmInput").val()},
            type:"post",
            success:function(data){
                if(data==2){
                    swal("验证码错误请重新输入");
                    $("#yzmInput").val('');
                    $("#yzm").attr("src","code.php");
                }
                else if(data==1){
                    swal('注册成功',"","success");
                    $("#reg_username").val('');
                    $("#reg_password").val('');
                    $("#yzmInput").val('');
                    $("#register").hide();
                }
                else if(data==4){
                     swal('用户名重复',"","error");
                }
                else {
                    swal('注册失败',"","error");
                    alert(data);
                }
            }
         });
    });
    //登陆
    $('#loginbutton').click(function(){
        $.ajax({
           url: "login.php",
           type:"post",
           data:{username:$("#username").val(),password:$("#password").val()},
           success:function(d){
               if(d==1){
//方法1.延迟刷新
//                   swal('登陆成功',"","success");
//                   setTimeout(function(){
//                        history.go();
//                   },2000);    
//*/
                   
//方法2.swal功能调用
                 swal(
                        {title:"登陆成功！",  
                          type:"success"
                        },
                         function(){history.go();}        
                        );
               }
//*/
               else{
                   swal('用户名或密码错误',"","error");
               }
           }
        });
    });
    
//发现页面-随机数字
   $('#faxian').click(function(){
      function GetRandomNum(Min,Max)
        {   
        var Range = Max - Min;   
        var Rand = Math.random();   
        return(Min + Math.round(Rand * Range));   
        }   
        var num = GetRandomNum(1,7);   
//        location.replace("list.php?type="+num);
        window.location.href="list.php?cid="+num;
//        location=("list.php?type="+num);
//        document.URL="list.php?type="+num;
   });
});
