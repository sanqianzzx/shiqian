
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>管理员登陆</title>
    <link rel="stylesheet" href="./static/common/layui/css/layui.css">
    <link rel="stylesheet" href="./static/admin/css/login.css">
    <script src="./static/common/layui/layui.js"></script>
</head>

<body id="login">
<div class="login">
    <h2>时迁后台</h2>
    <form  method="post" action="adminlogindo">
        {{ csrf_field() }}
        <div class="layui-form-item">
            <input type="username" name="user" placeholder="用户名" class="layui-input">
            <i class="layui-icon input-icon">&#xe66f;</i>
        </div>
        <div class="layui-form-item">
            <input type="password" name="pwd" placeholder="密码"  class="layui-input">
            <i class="layui-icon input-icon">&#xe673;</i>
        </div>
        
        <div class="layui-form-item">
            <button style="width: 100%" class="layui-btn" lay-submit lay-filter="login">立即登录</button>

        </div>
    </form>

    <script>


        // layui.use('form', function () {
        //     var form = layui.form,
        //         layer = layui.layer,
        //         $ = layui.jquery;


            

        //     form.on('submit(login)', function (data) {
        //         sessionStorage.isLgoin = 1; //模拟登录状态,实际使用时请删除掉

        //         layer.load({
        //             shade: 0.5,
        //             time: 0,
        //         });
        //         setTimeout(function () {
        //             window.location.href = 'adminindex';
        //         },1000)

        //         return false;
        //     });
        // });



        //************************************************************ */
        $("form").submit(function(){
            alert(2);
        })

    </script>
</div>
</body>

</html>


