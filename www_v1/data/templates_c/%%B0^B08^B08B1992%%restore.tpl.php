<?php /* Smarty version 2.6.18, created on 2012-06-20 15:27:03
         compiled from admin/restore.tpl */ ?>
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
</script>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>数据恢复</h1>
      <div class="search">
      提示：本功能在恢复备份数据的同时,将覆盖原有数据,请确定是否需要恢复,以免造成数据损失。 <br />
数据库备份目录/data/backup/
      </div></td>
    </tr>
	</table>
	
<form action='restoreController.php?a=delete_backup_file' method='post'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="tb1">
	<tr><td colspan="4" align="right"><input type="submit" class="button" style="width:auto;" value="删除" /></td></tr>
    <tr>
      <td class="tr1">文件名</td>
      <td class="tr1">备份时间</td>
      <td class="tr1">操作</td>
      <td class="tr1">选择<input type="checkbox" style="width:auto;border:none" onclick="chooseall(this,'file[]')"></td>
    </tr>
    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row_id'] => $this->_tpl_vars['current_row']):
?>
    <tr>
      <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['name']; ?>
</td>
      <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['time']; ?>
</td>
      <td class="tr_a"><a href='restoreController.php?a=restore&pre=<?php echo $this->_tpl_vars['current_row']['pre']; ?>
'>导入</a></td>
      <td class="tr_a"><input style="width:auto;border:none;" type='checkbox' name='file[]' value='<?php echo $this->_tpl_vars['current_row']['name']; ?>
' /></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <tr><td colspan="4" align="right"><input type="submit" class="button" style="width:auto;" value="删除" /></td></tr>
  </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>