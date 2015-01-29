<?{include file="admin/header.tpl"}?>
<script language="javascript">
$(document).ready(function(){
	var c1=getCookie("htmlnotice1");
	var c2=getCookie("htmlnotice2");
	var c3=getCookie("htmlnotice3");
	var c4=getCookie("htmlnotice4");
	if(c1==1){
		var str='<img src="images/notice.gif" title="你更改了设置，需要重新生成静态页！">';
		$('#checkhtml1 span').html(str);
	}
	if(c2==1){
		var str='<img src="images/notice.gif" title="你更改了设置，需要重新生成静态页！">';
		$('#checkhtml2 span').html(str);
	}
	if(c3==1){
		var str='<img src="images/notice.gif" title="你更改了自定义默认网址，需要清除缓存！">';
		$('#checkhtml3 span').html(str);
	}
	if(c4==1){
		var str='<img src="images/notice.gif" title="你更改了搜索设置，需要清除缓存！">';
		$('#checkhtml4 span').html(str);
	}
	<?{if !$ft}?>str='<img src="images/notice.gif" title="首页不存在，请生成！">';$('#checkhtml1 span').html(str);<?{/if}?>
});
</script>
<style>
.button {width:150px;height:30px;background-color:#eee;margin-top:5px;}
</style>
<?{if $doCache == "true"}?>
<div id="box">
<div class="right">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>静态管理</h1>
   </td>
  </tr>
  <tr>
	<tr ><td class="edit_main">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td width="50%" class="tr1"><span style="float:right;margin-right:100px">生成静态</span></td>
        <td width="50%" class="tr1"><span style="float:left;margin-left:100px">清除缓存</span></td></tr>
<tr><td height="26"><div id="checkhtml1" style="position:relative;width:155px;float:right;margin-right:50px;">
<input class="button" id="button1" type="button" value="生成首页" onclick="if(confirm('确定要重新生成首页吗？')){chtmlnotice(1);location.href='adminCache.php?ctype=index'}" /><span style="position:absolute;top:9px;left:112px;"></span>
</div></td>
<td height="26"><div id="checkhtml3" style="position:relative;width:155px;float:left;margin-left:50px">
<input class="button" type="button" value="清自定义导航缓存" onclick="if(confirm('确定要清自定义导航缓存吗？')){chtmlnotice(3);location.href='adminCache.php?ctype=hc_self'}"><span style="position:absolute;top:14px;left:126px;"></span>
</div></td></tr>
      <tr><td height="26"><div id="checkhtml2" style="position:relative;width:155px;;float:right;margin-right:50px;">
<input class="button" id="button2" type="button" value="生成内容页" onclick="if(confirm('确定要重新生成所有内容导航页吗？请慎重!')){chtmlnotice(2);location.href='adminCache.php?ctype=all'}" /><span style="position:absolute;top:13px;left:112px;"></span>
</div></td>
<td height="26"><div style="width:155px;float:left;margin-left:50px">
<input class="button" type="button" value="清天气预报缓存" onclick="if(confirm('确定要清天气预报缓存吗？')){location.href='adminCache.php?ctype=hc_weather'}">
</div></td></tr>
      <tr><td height="26"><div style="width:155px;float:right;margin-right:50px;">
<input class="button" id="button5" type="button" value="生成其他页" onclick="if(confirm('确定要重新生成其他页吗？')){location.href='adminCache.php?ctype=help'}">
</div></td><td height="26"><div id="checkhtml4" style="position:relative;width:155px;float:left;margin-left:50px">
<input class="button" type="button" value="清首页内页搜索缓存" onclick="if(confirm('确定要清首页内页搜索缓存吗？')){chtmlnotice(4);location.href='adminCache.php?ctype=hc_sosuo'}">
<span style="position:absolute;top:14px;left:132px;"></span></div></td>

</tr>
      <tr><td height="26"><div style="width:155px;float:right;margin-right:50px;">
<input class="button" id="button4" type="button" value="生成全站" onclick="if(confirm('确定要重新生成全站静态页吗？请慎重!')){chtmlnotice(1);chtmlnotice(2);location.href='adminCache.php?ctype=forall'}" />
</div></td><td height="26"><div style="width:155px;float:left;margin-left:50px">
<input class="button" type="button" value="清名站切换栏缓存" onclick="if(confirm('确定要清名站切换栏缓存吗？')){location.href='adminCache.php?ctype=cq_zdyad'}">
</div></td></tr>
</table></td></tr>
</table>

  <div class="clear"></div>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>
