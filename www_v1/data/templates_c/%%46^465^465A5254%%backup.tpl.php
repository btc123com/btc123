<?php /* Smarty version 2.6.18, created on 2012-06-20 15:27:03
         compiled from admin/backup.tpl */ ?>
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
    	if(confirm("您确定本次操作吗？"))
    		return true;
    	else
    		return false;
    }
</script>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>数据备份</h1>
      <div class="search">数据库总大小:<?php echo $this->_tpl_vars['total_size']; ?>
</div></td>
    </tr>
	</table>
<form action='backupController.php?a=backup' method='post' onsubmit="return alertmsg()">


	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="tb1">
		<tr><td colspan="9" align="right"><input type="submit" class="button" style="width:auto;" name="backup" value="备份" />&nbsp;
        <input type="submit" class="button" style="width:auto;" name="repair" value="修复" />&nbsp;
        <input type="submit" class="button" style="width:auto;" name="optimize" value="优化" />&nbsp;</td></tr>
    <tr>
     <td class="tr1">数据库表名</td>
     <td class="tr1">表用途</td>
     <td class="tr1">表类型</td>
     <td class="tr1">记录数</td>
     <td class="tr1">数据大小</td>
     <td class="tr1">索引大小</td>
     <td class="tr1">碎片</td>
     <td class="tr1">数据表大小</td>
     <td class="tr1">选择<input type="checkbox" style="width:auto; border:none" onclick="chooseall(this,'table_list[]')"></td>
      </tr>
	<?php $_from = $this->_tpl_vars['output']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['output'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['output']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['current_row']):
        $this->_foreach['output']['iteration']++;
?>
   <tr>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['table_name']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['table_use']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['Engine']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['Rows']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['Data_length']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['Index_length']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['Data_free']; ?>
</td>
     <td class="tr_a"><?php echo $this->_tpl_vars['current_row']['size']; ?>
</td>
     <td class="tr_a"><input style="width:auto;border:none" type='checkbox' name='table_list[]' value='<?php echo $this->_tpl_vars['current_row']['table_name']; ?>
' /></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
      <tr><td colspan="9" align="right"><input type="submit" class="button" style="width:auto;" name="backup" value="备份" />&nbsp;
        <input type="submit" class="button" style="width:auto;" name="repair" value="修复" />&nbsp;
        <input type="submit" class="button" style="width:auto;" name="optimize" value="优化" />&nbsp;</td></tr>
     </table>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>