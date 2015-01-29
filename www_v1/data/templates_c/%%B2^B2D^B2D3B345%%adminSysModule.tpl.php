<?php /* Smarty version 2.6.18, created on 2012-06-26 01:04:56
         compiled from admin/adminSysModule.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="box">
<div class="right">

<?php if ($this->_tpl_vars['viewAdminModule'] == 'true'): ?>
<script language="javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
</script>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>模块管理</h1>
	<div class="search"></div></td>
    </tr>
	</table>
	
<form action="?moduleFID=<?php echo $this->_tpl_vars['moduleFID']; ?>
&act=operate&p=<?php echo $this->_tpl_vars['p']; ?>
" method="post" onSubmit="return confirm('确定要操作吗？')">
    
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
	<tr><td align="right" colspan="6"><input type="submit" name="btnUpdate" value=" 修  改 " class="button" <?php if ($this->_tpl_vars['updateAdminModule'] != 'true'): ?>disabled<?php endif; ?> />
	   &nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button" <?php if ($this->_tpl_vars['delAdminModule'] != 'true'): ?>disabled<?php endif; ?> /></td></tr>
	<tr>
	  <td class="tr1" >模块名称</td>
	  <td class="tr1">模块页面</td>
	  <td class="tr1">模块顺序</td>
	  <td  class="tr1"> 子集模块</td>
	  <td class="tr1"> 锁定<input style="width:auto; border:none" type="checkbox" onclick="chooseall(this,'chkLockID[]')"></td>
	  <td class="tr1"> 删除<input style="width:auto;border:none" type="checkbox" onclick="chooseall(this,'chkDelID[]')"> </td>
	</tr>
	<?php unset($this->_sections['moduleList']);
$this->_sections['moduleList']['name'] = 'moduleList';
$this->_sections['moduleList']['loop'] = is_array($_loop=$this->_tpl_vars['arrModuleList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['moduleList']['show'] = true;
$this->_sections['moduleList']['max'] = $this->_sections['moduleList']['loop'];
$this->_sections['moduleList']['step'] = 1;
$this->_sections['moduleList']['start'] = $this->_sections['moduleList']['step'] > 0 ? 0 : $this->_sections['moduleList']['loop']-1;
if ($this->_sections['moduleList']['show']) {
    $this->_sections['moduleList']['total'] = $this->_sections['moduleList']['loop'];
    if ($this->_sections['moduleList']['total'] == 0)
        $this->_sections['moduleList']['show'] = false;
} else
    $this->_sections['moduleList']['total'] = 0;
if ($this->_sections['moduleList']['show']):

            for ($this->_sections['moduleList']['index'] = $this->_sections['moduleList']['start'], $this->_sections['moduleList']['iteration'] = 1;
                 $this->_sections['moduleList']['iteration'] <= $this->_sections['moduleList']['total'];
                 $this->_sections['moduleList']['index'] += $this->_sections['moduleList']['step'], $this->_sections['moduleList']['iteration']++):
$this->_sections['moduleList']['rownum'] = $this->_sections['moduleList']['iteration'];
$this->_sections['moduleList']['index_prev'] = $this->_sections['moduleList']['index'] - $this->_sections['moduleList']['step'];
$this->_sections['moduleList']['index_next'] = $this->_sections['moduleList']['index'] + $this->_sections['moduleList']['step'];
$this->_sections['moduleList']['first']      = ($this->_sections['moduleList']['iteration'] == 1);
$this->_sections['moduleList']['last']       = ($this->_sections['moduleList']['iteration'] == $this->_sections['moduleList']['total']);
?>
	<tr>
	  <td class="tr_a">
	    <input type="hidden" name="hidModuleID[]" value="<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleID']; ?>
"><input style="width:auto;" type="text" name="tbModuleName[]" value="<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleName']; ?>
" size="16" />
	  </td>
	  <td class="tr_a"><input type="text" style="width:auto;" name="tbModuleLink[]" value="<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleLink']; ?>
" size="30" /></td>
	  <td class="tr_a"><input type="text" style="width:auto;" name="moduleIndex[]" value="<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleIndex']; ?>
" size="5"/></td>
	  <td class="tr_a"><?php if ($this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleFID'] == '0'): ?><a href="?moduleFID=<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleID']; ?>
">子级</a><?php else: ?><a href="?moduleFID=0">无</a><?php endif; ?></td>
	  <td class="tr_a">
	    <label>
		<input type="checkbox" style="width:auto;border:none" name="chkLockID[]" id="chkLockID" value="<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleID']; ?>
" <?php if ($this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleState'] == '0'): ?>checked<?php endif; ?> />
	    </label>
	 </td>
	  <td class="tr_a">
	  <label>
	  <input type="checkbox" style="width:auto;border:none" name="chkDelID[]" id="chkDelID" value="<?php echo $this->_tpl_vars['arrModuleList'][$this->_sections['moduleList']['index']]['moduleID']; ?>
" />
	    </label></td>
	</tr>
    	<?php endfor; endif; ?>
	<tr>
	  <td colspan="6" align="right"  height="32px"><?php echo $this->_tpl_vars['pager']; ?>
<input type="submit" name="btnUpdate" value=" 修  改 " class="button" <?php if ($this->_tpl_vars['updateAdminModule'] != 'true'): ?>disabled<?php endif; ?> />
	   &nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button" <?php if ($this->_tpl_vars['delAdminModule'] != 'true'): ?>disabled<?php endif; ?> /></td>
	</tr>
    </table></td>
  </tr>
</table>
</form>
<?php endif; ?>
<?php if ($this->_tpl_vars['addAdminModule'] == 'true'): ?>
<form action="?moduleFID=<?php echo $this->_tpl_vars['moduleFID']; ?>
&act=add&p=<?php echo $this->_tpl_vars['p']; ?>
" method="post">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>添加新模块</h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
<?php $_from = $this->_tpl_vars['arrNO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['NO']):
?>
  <tr >
		<td width="36%" height="36">模块名称<?php echo $this->_tpl_vars['NO']; ?>
：
		  <input name="tbModuleName[]" id="tbModuleName<?php echo $this->_tpl_vars['NO']; ?>
" value="" type="text" size="20"></td>
	<td width="64%" height="36">模块页面：
	  <input name="tbModuleLink[]" id="tbModuleLink<?php echo $this->_tpl_vars['NO']; ?>
" type="text" value="<?php if ($this->_tpl_vars['moduleFID'] == '0'): ?>left.php<?php endif; ?>" size="30"></td>	
  </tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
     <td height="36"><input value=" 添  加 " type="submit" class="button" <?php if ($this->_tpl_vars['addAdminModule'] != 'true'): ?>disabled<?php endif; ?>></td>
	  </tr>
   </table>
   </td>

</table>
</form>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>