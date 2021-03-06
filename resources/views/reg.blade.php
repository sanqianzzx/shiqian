<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>时迁</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/css/style.min.css" rel="stylesheet">
    <style>
        #bg{
            background: url('/img/bg.png') no-repeat;
            width: 100%;
            height: 100%;
            background-size: cover;
            position: fixed;
            overflow: hidden;
            z-index: -1;
        }
        #uerror{
            height: 20px;
            line-height: 20px;
            color: red;
        }
        #perror{
            height:20px;
            line-height: 20px;
            color: red;
        }
        #rerror{
            height:20px;
            line-height: 20px;
            color: red;
        }
    </style>
</head>

<body >
<div id="bg"></div>
    <!--Main Navigation-->
    
    <!--Main Navigation-->

    <!--Main layout-->
    
    <main class="pt-5" style="height:100%">
   
        <div class="container" style="height:100%">
        <form method="post" action="/regdo">
            {{ csrf_field() }}
        <div class="modal-dialog" style="margin-top: 10%;">
        <div class="modal-content">
            <div class="modal-header">
 
                <h4 class="modal-title text-center" id="myModalLabel">注册</h4>
            </div>
            <div class="modal-body" id = "model-body">
                <div class="form-group">
                    <label>用户名:</label>
                    <input type="text" id="user" name="user" class="form-control"placeholder="必须字母开头，5-16字符" autocomplete="off">
                </div>
                <div id="uerror" ></div>
                <div class="form-group">
                    <label>密码:</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="以字母开头，6-18字符" autocomplete="off">
                </div>
                <div id="perror"></div>
                <div class="form-group">
                    <label>验证码:</label>
                    <input  type="text" id="rnumber" name="rnumber" class="form-control" width="80%" autocomplete="off">
                    <div id="rerror"></div>
                    <img src="{{ route('rnumber') }}" width="15%" style="margin-top:10px;margin-left:1%;">
                    
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                   <button class="btn btn-primary">注册</button>
                </div>
                <!-- <div class="form-group">
                    <button type="button" class="btn btn-default form-control">注册</button>
                </div> -->
 
            </div>
        </div><!-- /.modal-content -->
    </div>
        </form>
        </div>
    </main>

    <!--Main layout-->

    <!--Footer-->
    
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
    var i1 = false;
    var i2 = false;
    var i3 = false;
    var user = /^[a-zA-Z][a-zA-Z0-9_]{4,15}$/;
    var pwd = /^[a-zA-Z]\w{5,17}$/;
    var ruser;
    var rpwd;
    var rnumber;

    $("#user").blur(function(){
        var v = $(this).val();
        ruser = v;
        var jg
        $.ajaxSettings.async = false;
        $.post("/yz",{'_token':'{{csrf_token()}}','name':v},function(data){
            jg = data;
        })
        $.ajaxSettings.async = true;
        
        if(v == ""){
            $("#uerror").html("用户名不能为空");
            i1 = false;
        }else if(!v.match(user)){
            i1 = false;
            $("#uerror").html("用户名不符合规则");
        }else if(jg != "可以注册"){
            $("#uerror").html("用户名已被注册"); 
            i1 = false;  
        }else{
            $("#uerror").html("");  
            i1 = true;
        }
    })

    $("#pwd").blur(function(){
        var p = $(this).val();
        rpwd = p;
        if(p == ""){
            $("#perror").html("密码不能为空");
            i2 = false;
        }else if(!p.match(pwd)){
            i2 = false;
            $("#perror").html("密码不符合规则");
        }else{
            $("#perror").html("");  
            i2 = true;
        }
    })
    $("#rnumber").blur(function(){
        var n = $(this).val();
        rnumber = n;
        if(n == ""){
            $("#rerror").html("验证码不能为空");
            i3 = false;
        }else{
            $("#rerror").html("");  
            i3 = true;
        }
    })

    $("form").submit(function(){
        $("#user").trigger("blur");
        $("#pwd").trigger("blur");
        $("#rnumber").trigger("blur");
        if(!i1 || !i2 || !i3){
            return false;
        }else{
            $.post("/regdo",{'user':ruser,'pwd':rpwd,'rnumber':rnumber,'_token':'{{csrf_token()}}'},function (data) {
                if(data == "注册失败" || data == "验证码错误"){
                    alert(data);
                }else{
                    location.href = "/";
                }        
            });
            return false;
        }
    })


    
</script>