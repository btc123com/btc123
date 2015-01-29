<?{include file="admin/header.tpl"}?>
  <!--  <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
	  <tr>
	    <td class="title_edit">
	     <h1 style="float:left">补丁更新信息</h1>
	   </td>
	  </tr>
	<tr ><td class="edit_main">
<div id="update" style="display:none;overflow-x:hidden;overflow-y:auto;">
	<?{if $upvers=='' && $updatavers==''}?>
		<font color=red>当前无更新补丁！</font>
	<?{else}?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
		<tr><td width="50%" class="tr1"><div align="left">&nbsp;&nbsp;当前可用的更新有：</div></td>
			<td width="50%" class="tr1"><div align="left">&nbsp;&nbsp;</div></td></tr>
		<tr>
		<td class="tr_a" style="background-color:#FFFFCC" valign="bottom">
		<?{if $upvers==''}?>
			<font color=red>当前无安全更新补丁！</font>
		<?{else}?>
			<form action="adminUpdate.php?a=download" method="POST">
				  <table border="0" cellspacing="0" cellpadding="0">
					<tr><td class="tr_c" align="center">
					  <ul class="gx">
						  <?{foreach name=upvers item=row from=$upvers}?>
						  <li>【安全更新】<input type="hidden" name="uptime[]" value="<?{$row.time}?>"/><?{$row.time}?>，更新说明：<?{$row.text}?></li>
					   <?{/foreach}?>
					  </ul></td></tr>
					 <tr><td class="tr_c"><input type="submit" class="button" style="cursor: pointer;width:auto" value=" 点击此下载所有更新文件，然后选择安装 " name="sub">&nbsp;&nbsp;&nbsp;<input type="submit" class="button" style="cursor: pointer;width:auto" value="忽略以上补丁更新" name="misssub"></td>
			</tr></table></form>
		<?{/if}?></td>
		<td class="tr_a" style="background-color:#FFFFCC" valign="bottom">
		<?{if $updatavers ==''}?>
			<font color=red>当前无数据更新补丁！</font>
		<?{else}?>
			<form action="adminUpdate.php?a=downloaddata" method="POST">
				  <table border="0" cellspacing="0" cellpadding="0">
					<tr><td class="tr_c" align="center">
					  <ul class="gx">
					  <?{foreach name=updatavers item=row from=$updatavers}?>
						 <li>【数据更新】<input type="hidden" name="updata[]" value="<?{$row.time}?>"/><?{$row.time}?>，更新说明：<?{$row.text}?></li>
						 <?{/foreach}?>
					  </ul></td></tr>
			<tr><td class="tr_c"><input type="submit" class="button" style="cursor: pointer;width:auto" value=" 点击此下载数据更新文件，然后选择安装 " name="submit">&nbsp;&nbsp;&nbsp;<input type="submit" class="button" style="cursor: pointer;width:auto" value="忽略以上数据更新" name="misssub"></td>
			</tr></table></form>
		<?{/if}?></td>
		</tr></table>
	<?{/if}?>
</div></td></tr>
</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
	  <tr>
	    <td class="title_edit">
	     <h1 style="float:left">5w.com网址导航新闻</h1><span style="float:right;line-height:30px;padding-right:42px;"><a href="http://bbs.5w.com/forum-post-action-newthread-fid-36.html" target="_blank">提交问题</a></span>
	   </td>
	  </tr>
	<tr ><td class="edit_main">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td width="50%" class="tr1">最新动态</td>
        <td width="50%" class="tr1">BUG反馈</td></tr>
      <tr><td class="tr_a" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <?{foreach name=versionList item=row from=$news}?>
      <tr><td class="tr_a" width="20%"><?{$row.createDate}?></td><td class="tr_a"><a href="http://bbs.5w.com/thread-<?{$row.mid}?>-1-1.html" target="_blank"><?{$row.title}?></a></td></tr>
      <?{/foreach}?>
      </table>
      </td>
      <td class="tr_a" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <?{foreach name=versionList item=row from=$question}?>
      <tr><td class="tr_a" width="20%"><?{$row.cdate}?></td><td class="tr_a"><a href="http://bbs.5w.com/thread-<?{$row.news_id}?>-1-1.html" target="_blank"><?{$row.news_title}?></a></td></tr>
      <?{/foreach}?>
      </table>
      </td>
      </tr>
</table></td></tr>
</table> -->
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
	  <tr>
	    <td class="title_edit">
	     <h1>基本信息统计</h1>
	   </td>
	  </tr>
	  <tr ><td class="edit_main">
	 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td class="tr_a" width="50%"><div align="center">SYSTEM:<font color=red><?{$sysContent.sysinfo}?></font></div></td>
        <td class="tr_a" width="50%"><div align="center">Server IP:
	          <font color=red><?{$sysContent.serverip}?></font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Mysql Version:
	          <font color=red><?{$sysContent.dbversion}?></font></div></td>
        <td class="tr_a"><div align="center">Display_errors:
	          <font color=red><?{$sysContent.dispalyerror}?></font></div></td>
      </tr>
            <tr>
        <td class="tr_a"><div align="center">PHP Version:
	          <font color=red><?{$sysContent.phpversion}?></font></div></td>
        <td class="tr_a"><div align="center">iconvsp:
	          <font color=red><?{$sysContent.iconvsp}?></font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">WEB_SERVER:<font color=red><?{$webSer}?></font></div></td>
        <td class="tr_a"><div align="center">Session Support:
	          <font color=red><?{$sysContent.sessionsp}?></font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Server Api:
	          <font color=red><?{$sysContent.serverapi}?></font></div></td>
        <td class="tr_a"><div align="center">Cookie Support:
	          <font color=red><?{$sysContent.sessionsp}?></font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Max postsize:
	          <font color=red><?{$sysContent.maxpostsize}?></font></div></td>
        <td class="tr_a"><div align="center">Max upsize:
	          <font color=red><?{$sysContent.maxupsize}?></font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Max exectime:
	          <font color=red><?{$sysContent.maxexectime}?></font></div></td>
        <td class="tr_a"><div align="center">Php Safe:
	          <font color=red><?{$sysContent.phpsafe}?></font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">JSON Support:
	          <font color=red><?{$sysContent.json}?></font></div></td>
        <td class="tr_a"><div align="center">Data Size:
	          <font color=red><?{$sysContent.datasize}?></font></div></td>
      </tr></table>
	</td></tr>
</table>
<script type="text/javascript">
$(document).ready(function(){
	$('#update').slideDown('slow');
})
</script>
<?{include file="admin/footer.tpl"}?>
