<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// 定义变量并默认设置为空值
$nameErr =$pwdErr =$repwdErr = $emailErr = $phoneErr = $nicknameErr = "";
$name = $pwd = $repwd = $email = $phone =$nickname= "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "名字是必需的";
    }
    else {
        $name = test_input($_POST["name"]);
        // 检测名字是否只包含字母跟空格
        if (preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$name) )
        {
            $nameErr = "只允许输入非中文";
        }
        if(strlen($name)<3){
            $nameErr="至少3位";
        }

    }

    if (empty($_POST["pwd"]))
    {
        $pwdErr= "密码不能为空";
    }
    else
    {
        $pwd = test_input($_POST["pwd"]);
        if(strlen($pwd)>16 || strlen($pwd)<9){
            $pwdErr="密码长度必须为9-16位";
        }
//        这里还学修改，匹配格式
        if(preg_match("/(?=.*[a-z])(?=.*\d)(?=.*[#@!~%^&*])[a-z\d#@!~%^&*]/i",$pwd)){
            $pwdErr="密码必须是数字、字母、特殊字符组合";
        }
    }

    if (empty($_POST["repwd"]))
    {
        $repwdErr = "确认密码必须填写";
    }
    else
    {
        $repwd = test_input($_POST["repwd"]);
        if($repwd!=$pwd){
            $repwdErr="两次密码不相同";
        }
    }

    if (empty($_POST["phone"]))
    {
        $phoneErr = "电话不能为空";
    }
    else
    {
        $phone = test_input($_POST["phone"]);
        if(strlen($phone)!=11){
            $phoneErr="手机号必须11位";
        }
    }

    if (empty($_POST["email"]))
    {
        $emailErr = "邮箱必需填写";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // 检测邮箱是否合法
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
            $emailErr = "非法邮箱格式";
        }
    }

    if (empty($_POST["nickname"]))
    {
        $nicknameErr = "昵称必需填写";
    }
    else
    {
        $nickname = test_input($_POST["nickname"]);
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>用户注册</h2>
<p><span class="error">* 必需字段。</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    名字: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    密码: <input type="text" name="pwd" value="<?php echo $pwd;?>">
    <span class="error">* <?php echo $pwdErr;?></span>
    <br><br>
    确认密码: <input type="text" name="repwd" value="<?php echo $repwd;?>">
    <span class="error">* <?php echo $repwdErr;?></span>
    <br><br>
    手机号: <input type="text" name="phone" value="<?php echo $phone;?>">
    <span class="error">* <?php echo $phoneErr;?></span>
    <br><br>
    邮箱: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    昵称: <input type="text" name="nickname" value="<?php echo $nickname;?>">
    <span class="error">* <?php echo $nicknameErr;?></span>
    <br><br>
    备注: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>