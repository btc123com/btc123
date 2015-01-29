<?php /* Smarty version 2.6.18, created on 2012-06-20 15:45:47
         compiled from admin/truncate.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="box">
<div class="right">
<script type="text/javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
function alertmsg(){
	if(confirm("确定要清空所有站点数据？建议您先备份相应表!"))
		return true;
	else
		return false;
}
</script>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>站点数据清空</h1></td>
    <td>提示:本功能将清空所选站点数据表,推荐在操作前先<font color=red>备份</font>要清空的表数据,以免造成数据损失。<a href="backupController.php" style="color:red">数据库备份</a>
    </td>
    </tr>
	</table>
<form action='restoreController.php?a=truncate' method='post' onsubmit="return alertmsg()">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
<tr><td colspan="3" align="right">
     <input class="button" name="sub" type="submit" style="width:auto;" value="清空所选表数据"/>
   </td></tr>
    <tr>
     <td class="tr1">数据库表名</td>
     <td class="tr1">表用途</td>
     <td class="tr1">选择<input type="checkbox" style="width:auto; border:none" onclick="chooseall(this,'tables[]')"></td>
   </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
site</td>
     <td class="tr_a">收录网址表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='site' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
site_cool</td>
     <td class="tr_a">酷站网址表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='site_cool' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
site_famous</td>
     <td class="tr_a">名站网址表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='site_famous' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
site_foot</td>
     <td class="tr_a">页脚导航网址表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='site_foot' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
site_tool</td>
     <td class="tr_a">实用网址表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='site_tool' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
type_cool</td>
     <td class="tr_a">酷站分类表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='type_cool' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
type_foot</td>
     <td class="tr_a">页脚导航分类表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='type_foot' /></td>
    </tr>
   <tr>
     <td class="tr_a"><?php echo @DBPREFIX; ?>
type_site</td>
     <td class="tr_a">收录网址类别表</td>
     <td class="tr_a"><input style="width:auto; border:none" type='checkbox' name='tables[]' value='type_site' /></td>
    </tr>
    <tr><td colspan="3" align="right">
     <input class="button" name="sub" type="submit" style="width:auto;" value="清空所选表数据"/>
   </td></tr>
</table></form>

  <div class="clear"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>