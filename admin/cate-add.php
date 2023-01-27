<?php
include("../resource/variable.php");
function encode($string = '', $skey = 'cxphp')
{
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key < $strCount && $strArr[$key] .= $value;
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
$sql = "select password from `rapidcmsadmin` where username=\"admin\"";
$result = mysqli_query($link, $sql);
$pass = mysqli_fetch_row($result);
$pa = $pass[0];

if ($_COOKIE["admin"] != encode('admin',$pa)) {
    Header("Location: login.php"); 
}
?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <title>RapidCMS管理后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon"" href=" ../../../../../resource/img/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../../../../../../resource/css/mdui.min.css" />
    <link rel="stylesheet" href="../../../../../../resource/css/mtu.min.css">
    <link rel="stylesheet" href="../../../../resource/css/style.css">
    <link rel="stylesheet" href="../../../../../template/default/theme.css">
    
</head>

<body class=" mdui-appbar-with-toolbar mdui-theme-accent-indigo mdui-theme-primary-deep-purple mdui-text-color-white mdui-drawer-body-left" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
        <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
        <span class="mdui-typo-title">RapidCMS 管理后台</span>
    </div>

    <? include("drawer.php"); ?>
<script>
    function randomString(length,) {
        var chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    var result = '';
    for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}
function resetnum(){
    document.getElementById("ranid").value=randomString(10);
}
window.onload = function () {
    resetnum()
}


    </script>
    <style>
        * {
            font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">分类设置</div>
            </div>
           
                <m-scrollbar style="height: 800px;width:900px;text-align:left ">
                <div id="login" class="mc-account mc-login mdui-dialog mdui-dialog-open " style="overflow: hidden;z-index:999;display: block; top: 150.104px; height: 700px;">
                <button class="mdui-btn mdui-btn-icon close" onclick="window.location.href='category.php'"><i class="mdui-icon material-icons">close</i></button>
 
<div class="mdui-dialog-title">新增</div>
<form method="post" action="cate-add-run.php">

    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">唯一ID（10位字符）</label>
    <input class="mdui-textfield-input" style="width:90%" type="text" name="id" id="ranid" value="onload" required="">
  <i   style="cursor:pointer;position: absolute;left: 92%" onclick="resetnum(10)" class="mdui-icon material-icons">&#xe5d5;</i>
</div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">名称</label>
    <input class="mdui-textfield-input" type="text" name="name" required=""></div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">图标ID（在MDUI中获取&#XXXX;）</label>
    <input class="mdui-textfield-input" style="width:90%" type="text" name="pic" required="">
    <i   style="cursor:pointer;position: absolute;left: 92%" onclick="window.open('https://www.mdui.org/docs/material_icon')" class="mdui-icon material-icons">&#xe250;</i>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">权重（大的在前面）</label>
    <input class="mdui-textfield-input" type="number" name="num" required=""></div>

    <div class="actions mdui-clearfix">
       <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button>
    </div>
</form>
</div>
                </m-scrollbar>
  
        </div>

    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>



