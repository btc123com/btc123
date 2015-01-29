<?{include file="admin/header.tpl"}?>
<html>
	<head>
		<style>
		<!--
		.f1 {
			color: #395169;
			text-decoration: none;	
		}
		.f1:link {
			color: #395169;
			text-decoration: none;	
		}
		.f1:visited {	
			color: #395169;
			text-decoration:none ;	
		}
		.f:hover {
		   
			color: #395169;
			text-decoration:none ;	
		}
		-->
		</style>
	</head>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
	    <tr class="tr_title">
	      <td align="center">用户名</td>
	      <td align="center">注册时间</td>
	      <td align="center">登陆次数</td>
	      <td align="center">操作次数</td>
	      <td align="center">最后登陆</td>
	    </tr>
   	  <?{section name=userList loop=$data}?>
   	  <tr class="tr_content">
	      <td align="center"><a href="http://<?{$data[userList].userName}?>.5w.com" target="_blank" class="f1"><?{$data[userList].userName}?></a></td>
	      <td align="center" ><?{$data[userList].userRegDate|date_format:"%Y-%m-%d %H:%M"}?></td>
	      <td align="center"><?{$data[userList].userLoginTimes}?></td>
	      <td align="center"><?{$data[userList].useTime}?></td>
	      <td align="center"><?{$data[userList].userLastDate|date_format:"%Y-%m-%d %H:%M"}?></td>
	  </tr>
	  <?{/section}?>
	  <tr class="tr_title">
      <td colspan="16" align="right" valign="middle"><?{$pager}?></td>
    </tr>	    	   
	  </table>
	<br />
	<br />
</html>
<?{include file="admin/footer.tpl"}?>