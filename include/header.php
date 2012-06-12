<?php
error_reporting(E_ALL);
require_once("lib.php");
$LIB->cls_getsettings();
if(!isset($_SESSION['ID'])) {
    $_SESSION['readforce']=0;
    $_SESSION['ID']=0;
}

function gethead($head,$check,$title,$userid=0) {
    global $SET,$cfg,$LIB;
    /*if(!$_SESSION['ID'])
        if($_COOKIE['User']) if($_COOKIE['cojs_login'])
            header("location: ".路径("user/dologin.php"));*/
    if($head > 0) {
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="Shortcut Icon" href="<?=路径("style/favicon.ico")?>" />
<!--<link rel=stylesheet href="<?=路径("style/".$SET['style_profile'])?>" />-->
<link rel=stylesheet href="<?=路径("style/cogs.css")?>" />
<?背景图片($userid ? $userid : $_SESSION['ID']);?>
<?php $LIB->tradsimp(); ?>
<link rel=stylesheet type="text/css" href="<?=路径("style/bootstrap/css/bootstrap.min.css")?>" />
<script type="text/javascript" src="<?=路径("include/jquery.js")?>"></script>
<script type="text/javascript" src="<?=路径("include/sortTable.js")?>"></script>
<script type="text/javascript" src="<?=路径("style/bootstrap/js/bootstrap.min.js")?>"></script>
<title><?php echo $title." - ".$SET['global_sitename'] ?></title>
</head>
<body>
<div id="alltext">
<?
$p=new DataAccess();
if($check=="sess") $check="普通用户";
else if($check=="admin") $check="管理用户";
else if($check=="advadmin") $check="超级用户";
if(!有此权限($check)) 异常("没有权限 $check !");

include(路径("include/navigation.php"));
if($head != 8) Navigation($p);
?>

<div id="body">
<?php
    }
}
?>