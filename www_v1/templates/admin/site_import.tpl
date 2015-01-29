<?{include file="admin/header.tpl"}?>
<style type="text/css">
#selectTab ol{
	overflow-x:hidden;
	overflow-y:auto;
	width:180px;
	height:260px;
	border:1px solid #9AAF55;
}
#selectTab li{
	font-size:13px;
	text-align:left;
	line-height:20px;
	cursor:pointer;
	padding-left:8px;
}
.actLi{
	background-color:#ccc;
}
</style>
<script language="javascript">
var count=1;
function getSubLanmu(sid,obj){
	$('#hidstpID').val(sid);
	$('#'+obj.id).parent().find("li").removeClass("actLi");
	$('#'+obj.id).addClass("actLi");
	$('#'+obj.id).parent().parent().nextAll("td").remove();
	$.getJSON("adminAjax.php?stpParentID=" + sid, function(json){
		var str = '<td id="selectTab" valign="top" style="padding:0 8px;"><ol>';
		for(var key in json){
			str += '<li id="count_'+(count++)+'" onclick="getSubLanmu('+json[key].stpID+',this)">'+json[key].stpName+'</li>';
		}
		str+='</ol></td>';
		if (json.length != 0) {
			$('#'+obj.id).parent().parent().after(str);
		}
		})
	}
</script>
<div id="box">
<div class="right">
<form action="?act=import" method="post"  enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
    <tr >
      <td><table width="100%" height="28" border="0" cellspacing="0" cellpadding="0" background="images/mid.gif">
          <tr>
            <td class="title_edit"><h1>批量导入：粘贴一段html代码</h1></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td colspan="2" class="edit_main"><p style=" line-height:30px">请选择分类:</p>
            <table cellspacing="1" cellpadding="1"><tr>
            <td id="selectTab" valign="top" style="padding:0 8px;"><ol>
            <?{foreach name=arrAllRow from=$arrAllRow item=list}?>
            <li id="selLi_<?{$list.stpID}?>" onclick="getSubLanmu(<?{$list.stpID}?>,this)"><?{$list.stpName}?></li>
            <?{/foreach}?>
            </ol></td><input type="hidden" id="hidstpID" name="stpID"></tr></table></td>
          </tr>
          <tr>
           <td colspan="2" class="edit_main">
            <p style=" line-height:30px">请将html代码粘贴到文本框:</p>
            <table cellspacing="1" cellpadding="1"><tr>
            <td id="selectTab" valign="top" style="padding:0 8px;">
            <textarea name='sites' style="height:150px; width:580px;"></textarea><br />获取html代码方法：用浏览器打开要收录的页面，点击鼠标右键，选择“查看源文件”，然后复制源文件。本程序会将类似这样的代码收录到分类下：&lt;a href="http://www.5w.com"&gt;5w网址导航&lt;/a&gt;</td></tr></table>
           </td>
          </tr>
          <!--<tr>
            <td width="19%" height="36"><div align="right">请将html代码粘贴到文本框:</div></td>
            <td width="81%" height="66"><textarea name='sites' style="height:150px; width:580px;"></textarea><br />获取html代码方法：用浏览器打开要收录的页面，点击鼠标右键，选择“查看源文件”，然后复制源文件。本程序会将类似这样的代码收录到分类下：&lt;a href="http://www.5w.com"&gt;5w网址导航&lt;/a&gt;</td>
          </tr> -->

          <tr>
                  <td height="36">&nbsp;&nbsp;&nbsp;<input type="submit" name="btnSubmit" id="btnSubmit" value="导入" class="button" style="width:auto"/></td>
            <td height="36">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
  <div class="clear"></div>
  </div>
<?{include file="admin/footer.tpl"}?>
