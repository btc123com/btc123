<?{include file="admin/header.tpl"}?>
<script language="javascript">
function sub(){
var check = confirm('确定要操作吗？');
if(check){
	var action = document.getElementById('action').value;
	var name = document.getElementById('name').value;
	var sort = document.getElementById('sort').value;
	if(action=='' || name=='' || sort==''){
		alert("请确认已全部填写！");
		return false;
	}
}else{
	return false;
}
htmlnotice(1);
return true;
}
</script>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>首页名站首行设置</h1>
</td>
        </tr>
      </table>

<?{if $smarty.get.act == 'update'}?>
<form action="adminMztop.php?act=save" method="post" onSubmit="return sub();">
                <?{if $data.autoID}?><input type="hidden" name="form[autoID]" value="<?{$data.autoID}?>"/><?{else}?><input type="hidden" name="form[autoID]" value="0"/><?{/if}?>
                <div>
                    <table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
                        <tr>
                            <td width="20%" class="tr_a" style="text-align:right">名称：</td>
                            <td width="80%" class="tr_a" style="text-align:left"><input id="name" type="text" name="form[title]" value="<?{$data.title}?>" style="width:auto;"/></td>
                        </tr>
                        <tr>
                            <td width="20%" class="tr_a" style="text-align:right">HTML代码：</td>
                            <td width="80%" class="tr_a" style="text-align:left"><textarea id="action" name="form[content]" style="height:300px;width:500px"><?{$data.content|stripslashes}?></textarea></td>
                        </tr>
                        <tr>
                            <td width="20%" class="tr_a" style="text-align:right">排序：</td>
                            <td width="80%" class="tr_a" style="text-align:left"><input id="sort" type="text" name="form[orders]" value="<?{$data.orders}?>" onkeyup="value=value.replace(/[^\d]/g,'')" /></td>
                        </tr>
                        <tr><td width="20%" class="tr_a" style="text-align:right"></td>
                            <td width="80%" class="tr_a" style="text-align:left"><input type="submit" class="button" name="savebtn" value="提交" /></td>
                        </tr>
                    </table>
                </div>
                </form>
<?{else}?>
 <form action="?act=operate" method="post" onSubmit="if(confirm('确定要操作吗？')){htmlnotice(1);return true;}else{return false;}">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right">
        <input type="button" class="button" value=" 添加首行名站 " style="width:auto;" onclick="location.href='adminMztop.php?act=update'"/>
 		<input type="submit" name="upsub" value=" 提交修改 " class="button" style="width:auto;" /></td>
      </tr>
    </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t" title="双击编辑">
    <tr >
      <td class="tr1" width="5%">排序</td>
      <td class="tr1" width="5%">显示</td>
      <td class="tr1" width="15%">名称</td>
      <td class="tr1" width="65%">HTML代码</td>
      <td class="tr1" width="5%">修改</td>
      <td class="tr1" width="5%">删除</td>
    </tr>
<?{foreach from=$data item=v}?>
<tr ondblclick="location.href='?act=update&autoID=<?{$v.autoID}?>';">
<td class="tr_a"><input type="hidden" name="autoID[]" value="<?{$v.autoID}?>"/><input type="text" name="orders[<?{$v.autoID}?>]" value="<?{$v.orders}?>" style="width:30px"></td>
<td class="tr_a"><input type="checkbox" <?{if $v.status==1}?>checked="checked"<?{/if}?> name="status[<?{$v.autoID}?>]" style="width:auto;border:0"/></td>
<td class="tr_a"><?{$v.title}?></td>
<td class="tr_a"><?{$v.content|stripslashes}?></td>
<td class="tr_a"><a href="?act=update&autoID=<?{$v.autoID}?>"><img src="images/ico_edit.gif" title="修改"></a></td>
<td class="tr_a"><a onclick="if(confirm('确定要删除该项！')){location.href='?act=delete&autoID=<?{$v.autoID}?>'}" href="javascript:;"><img src="images/ico_del.gif" title="删除"></a></td>
</tr>
<?{/foreach}?>
    <tr >
      <td colspan="8" align="right"  class="ly_Rtd"><input type="button" class="button" value=" 添加首行名站 " style="width:auto;" onclick="location.href='adminMztop.php?act=update'"/><input type="submit" name="upsub" value=" 提交修改 " class="button" style="width:auto;" /></td>
    </tr>
  </table>
</form>
<?{/if}?>
<div class="clear"></div>
  </div>
<?{include file="admin/footer.tpl"}?>