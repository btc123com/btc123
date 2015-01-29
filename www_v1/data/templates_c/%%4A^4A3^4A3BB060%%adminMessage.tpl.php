<?php /* Smarty version 2.6.18, created on 2012-06-25 23:59:20
         compiled from admin/adminMessage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/adminMessage.tpl', 18, false),array('modifier', 'date_format', 'admin/adminMessage.tpl', 48, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['viewMessage'] == 'true'): ?>
<script language="javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
</script>
  <div class="right">
   <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <form method="get" action="?">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>留言管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSearchField'],'selected' => $_GET['searchField']), $this);?>

		</select><input name="keyWord" type="text" id="keyWord" size="12" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" />
		<input name="keyWord" type="text" id="keyWord" size="40" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" /><input type="hidden" value="1" name="search" />
		<input type="submit" value=" 搜 索 " class="button"><?php if ($_GET['search']): ?><input type="button" onclick="location.href='adminMessage.php';" class="button" value="取消搜索" /><?php endif; ?></div></td>
        </tr>
        </form>
  </table>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
    <tr>
        <td colspan="7" align="right"><?php if ($this->_tpl_vars['delMessage'] == 'true'): ?>
        <input type="submit" name="btnReply" value=" 回 复 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"><?php endif; ?></td>
      </tr>
      <tr>
		<td width="10%" class="tr1">板块</td>
		<td width="15%" class="tr1">标题</td>
		<td width="22%" class="tr1">内容</td>
		<td width="23%" class="tr1">回复</td>
		<td width="10%" class="tr1">联系方式</td>
		<td width="10%" class="tr1">提交日期</td>
		<td width="10%" class="tr1">选择<input style="width:auto;border:none" type="checkbox" onclick="chooseall(this,'chkDelID[]')"></td>
      </tr>
      <?php $_from = $this->_tpl_vars['arrMessage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['arrMessage'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arrMessage']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['arrMessage']['iteration']++;
?>
      <tr>
<input type="hidden" name="hidMid[]" value="<?php echo $this->_tpl_vars['list']['mid']; ?>
">
		<td class="tr_a"><div align="center"><?php if ($this->_tpl_vars['list']['urlfrom']): ?><?php echo $this->_tpl_vars['list']['urlfrom']; ?>
<?php else: ?>未知<?php endif; ?></div></td>
		<td class="tr_a"><div align="center"><?php echo $this->_tpl_vars['list']['title']; ?>
</div></td>
		<td class="tr_a"><div align="center"><textarea style="width:100%; height:80px;"><?php echo $this->_tpl_vars['list']['content']; ?>
</textarea></div></td>
		<td class="tr_a"><div align="center"><textarea style="width:100%; height:80px;" name="reply[<?php echo $this->_tpl_vars['list']['mid']; ?>
]"><?php echo $this->_tpl_vars['list']['reply']; ?>
</textarea></div></td>
		<td class="tr_a"><div align="center"><?php echo $this->_tpl_vars['list']['contact']; ?>
</div></td>
		<td class="tr_a"><div align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['createDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</div></td>
		<td class="tr_a"><div align="center"><input type="checkbox" name="chkDelID[]" id="chkDelID" value="<?php echo $this->_tpl_vars['list']['mid']; ?>
" style="width:auto;border:none"/></div></td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
      <tr>
        <td colspan="7" align="right"><?php echo $this->_tpl_vars['pager']; ?>
<?php if ($this->_tpl_vars['delMessage'] == 'true'): ?>
        <input type="submit" name="btnReply" value=" 回 复 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"><?php endif; ?></td>
      </tr>
      </form>
 </table>
   <div class="clear"></div>
  </div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>