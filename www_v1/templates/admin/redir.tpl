<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3;url=<?php echo $jumpurl;?>">
<title>操作提示</title>
<style type="text/css">
<!--
#zj { width:450px;margin:0 auto; text-align:center;margin-top:150px;float:none;clear:both;border:4px solid #57abff; background:#edf6ff; }
#zj ul  { margin-top:25px;}
#zj ul li {  line-height:20px;font-size:14px; padding:8px 0;color:#333333;}
#zj ul li a { color:#333333;}
#zj ul li a:hover  { color:#0066cc;}
#zj ul dd { color:#666666; }
#zj .span{ color:#0066cc;font-size:14px;font-weight:bold;}
#zj .span a:link,#zj .span a:visited,#zj .span a:hover,#zj .span a:active{ color:#0066cc;text-decoration:underline;}
ul {list-style-type: none; padding:0; margin:0;}
-->
</style>
</head>


<body>
<?php
echo $script;
?>
<div id="zj">
<ul>

<li><?php echo $title?></li>
<li><img src="http://www.5w.com/static/images/loading.gif"></li>
<li>如果浏览器没有自动跳转，请<a href="<?php echo $jumpurl;?>" class="span">点这里</a></li>
</ul>
</div>
</body>
</html>