<?{include file="admin/header.tpl"}?>
<script language="javascript">
function changes(obj)
{
    if(obj.value == "") return;
    location.href = "adminSearch.php?classid=" + obj.value;
}
function sub(){
var check = confirm('确定要操作吗？');
if(check){
	var search_select = document.getElementById('search_select').value;
	var action = document.getElementById('action').value;
	var name = document.getElementById('name').value;
	var img_url = document.getElementById('img_url').value;
	var sort = document.getElementById('sort').value;
	if(search_select=='' || action=='' || name=='' || img_url=='' || sort==''){
		alert("有必填项未填写！");
		return false;
	}
}else{
	return false;
}
htmlnotice(1);htmlnotice(4);
return true;
}
</script>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>首页搜索引擎设置</h1>
</td>
        </tr>
      </table>

<?{if $smarty.get.act == 'update'}?>
<form action="adminSearch.php?act=save" method="post" onSubmit="return sub();">
                <?{if $data.id}?><input type="hidden" name="form[id]" value="<?{$data.id}?>"/><?{/if}?>
                <div>
                    <table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
                        <tr>
                            <td width="20%" class="tr_a" style="text-align:right">搜索栏分类：</td>
                            <td width="80%" class="tr_a" style="text-align:left">
                                <select name=form[class] style="width:70px;">
                                    <?{html_options options=$options selected=$data.class}?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">名称*：</td>
                            <td class="tr_a" style="text-align:left"><input id="search_select" type="text" name="form[search_select]" value="<?{$data.search_select}?>" /> radio按钮的名称</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">接口地址*：</td>
                            <td class="tr_a" style="text-align:left"><input id="action" type="text" name="form[action]" value="<?{$data.action}?>" /> 表单的action值</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">搜索字段名*：</td>
                            <td class="tr_a" style="text-align:left"><input id="name" type="text" name="form[name]" value="<?{$data.name}?>" /> 输入框的name</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">LOGO连接：</td>
                            <td class="tr_a" style="text-align:left"><input type="text" name="form[url]" value="<?{$data.url}?>" /> 点搜索logo时跳转的地址</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">LOGO图片*：</td>
                            <td class="tr_a" style="text-align:left"><input id="img_url" type="text" name="form[img_url]" value="<?{$data.img_url}?>" /> 规格为105*35px，请使用绝对路径</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">LOGO描述：</td>
                            <td class="tr_a" style="text-align:left"><input type="text" name="form[img_text]" value="<?{$data.img_text}?>" /> 搜索LOGO的图片alt描述</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">按钮文字：</td>
                            <td class="tr_a" style="text-align:left"><input type="text" name="form[btn]" value="<?{$data.btn}?>" /> 搜索按钮上的文字</td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="text-align:right">排序*：</td>
                            <td class="tr_a" style="text-align:left"><input id="sort" type="text" name="form[sort]" value="<?{$data.sort}?>" onkeyup="value=value.replace(/[^\d]/g,'')" /></td>
                        </tr>
                        <tr>
                            <td class="tr_a" style="vertical-align:top;text-align:right">补充参数：</td>
                            <td valign="top">
                            	<table>
                                <tr>
                                	<td valign="top"><textarea style="height:120px;" name="form[params]"><?{$data.params}?></textarea> </td>
                                    <td valign="top">对隐藏的input，或额外参数补充，没有可不填，如:<br />
								<p style="color:red">
                                &lt;input type="hidden" name="tn" value="1" /&gt; <br />
								&lt;input type="hidden" name="ch" value="2" /&gt;
                                </p>则填写:
                                <p style="color:red"> tn:1,ch:2</p>注意：多个参数用<font color=red>,</font>分隔，参数名与值用<font color=red>:</font>分隔，若参数中包含<font color=red>冒号</font>，用<font color=red>%3A</font>替换</td>
                                </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td class="tr_a" style="text-align:right"></td>
                            <td class="tr_a" style="text-align:left"><input type="submit" class="button" name="savebtn" value="提交" /></td>
                        </tr>
                    </table>
                </div>
                </form>
<?{else}?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right"><div style="float:left">选择分类:
		<select name="classid" onchange="changes(this)" style="width:70px;">
        <?{html_options options=$options selected=$classid}?>
        </select></div>
 <form action="?act=operate" method="post" onSubmit="if(confirm('确定要操作吗？')){htmlnotice(1);htmlnotice(4);return true;}else{return false;}">
        <input type="button" class="button" value=" 添加搜索引擎 " onclick="location.href='adminSearch.php?act=update'"/><input type="submit" name="upsub" value=" 修改默认排序 " class="button" style="width:auto;margin:2px;" />
         </td>
      </tr>
    </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t" title="双击编辑">
    <tr >
      <td class="tr1" width="50">排序</td>
      <td class="tr1" width="50">默认</td>
      <td class="tr1" width="50">显示</td>
      <td class="tr1" width="50">名称</td>
      <td class="tr1" width="50">分类</td>
      <td class="tr1" width="430">接口地址</td>
      <td class="tr1" width="50">修改</td>
      <td class="tr1" width="50">删除</td>
    </tr>
<?{foreach from=$data item=v}?>
<tr ondblclick="location.href='?act=update&id=<?{$v.id}?>';">
<td class="tr_a"><input type="hidden" name="id[]" value="<?{$v.id}?>"/><input type="text" name="sort[<?{$v.id}?>]" value="<?{$v.sort}?>" style="width:30px"></td>
<td class="tr_a"><input type="radio" name="is_def" value="<?{$v.id}?>" <?{if $v.is_default ==1}?>checked<?{/if}?> style="width:auto; border:none"></td>
<td class="tr_a"><input type="checkbox" name="is_show[<?{$v.id}?>]" <?{if $v.is_show}?>checked<?{/if}?> style="width:auto; border:none"/></td>
<td class="tr_a"><?{$v.search_select}?></td>
<td class="tr_a"><?{$v.classname}?></td>
<td class="tr_a"><?{$v.action}?></td>
<td class="tr_a"><a href="?act=update&id=<?{$v.id}?>"><img src="images/ico_edit.gif" title="修改"></a></td>
<td class="tr_a"><a onclick="if(confirm('确定要删除该项！')){location.href='?act=delete&classid=<?{$v.class}?>&id=<?{$v.id}?>'}" href="javascript:;"><img src="images/ico_del.gif" title="删除"></a></td>
</tr>
<?{/foreach}?>
    <tr >
      <td colspan="8" align="right"  class="ly_Rtd"  style="padding:6px 0;"><input type="button" class="button" value=" 添加搜索引擎 " onclick="location.href='adminSearch.php?act=update'"/><input type="submit" name="upsub" value=" 修改默认排序 " class="button" style="width:auto;margin:2px;" /></td>
    </tr>
  </table>
</form>
<?{/if}?>
<div class="clear"></div>
  </div>
<?{include file="admin/footer.tpl"}?>
