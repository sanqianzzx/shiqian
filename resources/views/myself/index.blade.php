<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>时迁</title>
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/css/style.min.css" rel="stylesheet">
    <style>
        
        #left{
            background: white;
            min-height: 60%;
            width: 20%;
            border: solid 1px #ddd;;
            float: left;
        }
        #right{
            background: white;
            margin-left: 5%;
            min-height: 80%;
            width: 75%;
            border: 1px solid #ddd; 
            float: left;
        }
        .left_li{
            color: black;
            /* cursor: pointer; */
            width: 100%;
            height: 100px;
            line-height: 100px;
            text-align: center;
            font-size: 18px;
        }
        .left_li_d{
            /* cursor: pointer; */
            color: #23b8ff;
            /* background: #e5e5e5; */
            width: 100%;
            height: 100px;
            line-height: 100px;
            text-align: center;
            font-size: 18px;
        }
        .r_head{
            text-align: center;
        }
        .r_content{
            width: 90%;
            margin-left: 4%;
        }
        
        #email{
            width: 70%;
            
        }
        .form-control{
            display: inline;
        }
        .active{
            display: block;
        }
        #pwd{
            width: 70%;
        }
        #npwd{
            width: 70%;
        }
    </style>
</head>

<body>

    <!--Main Navigation-->
    <header>
    <div id="bg"></div>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="/">
                    <strong class="blue-text">时迁</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link waves-effect" href="/">主页
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/gg">关于 时迁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/fankui" >联系博主</a>
                        </li>
                        
                    </ul>

                    <!-- Right -->
                    @if(!session()->has('username'))
                    <ul class="navbar-nav nav-flex-icons">
                        
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/login">登录</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/reg">注册</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                        <a class="nav-link waves-effect" href="#" >{{ session()->get('username') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link waves-effect" href="/uset" >登出</a>
                        </li>
                    </ul>
                    @endif
                </div>

            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5 pt-5" style="height:100%">
    
        <div class="container" style="height:100%">
        
            <div id="left">
                <ul class="list-unstyled">
                    <a href="/myindex"><li class="left_li_d">更改密码</li></a>
                    <a href="/mygood"><li class="left_li">我的收藏</li></a>
                    <a href="/myhistory"><li class="left_li">浏览历史</li></a>
                    <a href="/mymessage"><li class="left_li">站内信</li></a>
                </ul>
            </div>
            <div id="right">

                @if( !$email )
                <div class="r_head"><h2>如果您想要更改密码需要先绑定邮箱</h2></div>
                <div class="r_content">
                    <form method="post" action="/mail/do" id="sendE">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">邮箱地址 :</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="邮箱地址">
                            <button class="btn btn-default" id="sendEmail">发送验证码</button>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">邮箱验证码 :</label>
                            <input type="text" class="form-control" name="pwd" id="pwd" placeholder="邮箱验证码">                
                        </div>
                        <button class="btn btn-default">进行绑定</button>
                    </form>
                </div>
                @else
                <div class="r_content">
                    <form method="post" action="/mail/pwd" id="sendE">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">您的邮箱地址为 :</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $email }}" disabled>
                            <button class="btn btn-default" id="sendEmail">发送验证码</button>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">邮箱验证码 :</label>
                            <input type="text" class="form-control" name="pwd" id="pwd" placeholder="邮箱验证码">                
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">新密码 :</label>
                            <input type="password" class="form-control" name="npwd" id="npwd" placeholder="以字母开头，6-18字符">                
                        </div>
                        <button class="btn btn-default">进行绑定</button>
                    </form>
                </div>
                @endif
            </div>

          
            
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
        
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2020 sq.com 
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
</body>

</html>

<script>
    var flag = false;
    var time = 60;
    var email;
    var code;
    var pwd = /^[a-zA-Z]\w{5,17}$/;
    var rpwd;

    $(".left_li").mouseover(function(){
      
        // alert($(this).text());
        $(this).css({"background": "#e5e5e5"});
    })
    $(".left_li").mouseout(function(){
        // alert(1);
        $(this).css({"background": "white"});
        $(this).removeAttr("style");
    })
    $(".left_li_d").mouseover(function(){
      
        // alert($(this).text());
        $(this).css({"background": "#e5e5e5"});
    })
    $(".left_li_d").mouseout(function(){
        // alert(1);
        $(this).css({"background": "white"});
        $(this).removeAttr("style");
    })

    $("#sendEmail").click(function(){
        time = 60;
        var a= $(this);
        
        email = $("#email").val()
        if( !flag && email){
            $.ajaxSettings.async = false;
            $.get("/mail/send",{'email':email},function(data){
                code = data;
            })
            $.ajaxSettings.async = true;
            flag = true;
            a.text(time);
            $(this).attr("disabled", true); 
            var t = setInterval(function(){
                time--;
                a.text(time);
                if(time <= 0){
                    clearInterval(t);
                    a.attr("disabled", false); 
                    a.text("发送验证码");
                    flag = false;
                }
            },1000)
            
        }else{
            alert("请输入邮箱");
        }

        return false;
    })

    $("#sendE").submit(function(){
        var p = $("#npwd").val();
        rpwd = p;

        if( code != $("#pwd").val() ){
            alert("邮箱验证码错误");
            return false;
        }else if(p == ""){
            alert("密码不能为空");
            return false;
        }else if(!p.match(pwd)){
            alert("密码不符合规则");
            return false;
        }


    })

    
</script>
