<?php /* Smarty version 2.6.18, created on 2012-06-26 23:51:37
         compiled from admin/adminUser.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/adminUser.tpl', 18, false),array('modifier', 'date_format', 'admin/adminUser.tpl', 51, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['viewUser'] == 'true'): ?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>会员列表</h1>
      <div class="search">
        <select name="searchField" id="searchField">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSearchField'],'selected' => $_GET['searchField']), $this);?>

        </select>
		<input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" />
				状态 <select name="userState" id="userState">
          <option value="">请选择</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrUserState'],'selected' => $_GET['userState']), $this);?>

        </select>
		<input type="submit" value=" 搜 索 " class="button" /></div></td>
        </tr>
        </form>
      </table>

 <form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
  <tr >
      <td colspan="8" align="right"  class="ly_Rtd" style="padding:6px 0;"><input type="submit" name="btnLock" value=" 锁  定 " class="button" <?php if ($this->_tpl_vars['lockUser'] != 'true'): ?>disabled<?php endif; ?> /></td>
    </tr>
    <tr >
      <td  class="tr1" id="sort_userMail"   onClick="SetSort('userMail')">用户名</td>
      <td class="tr1" >地址</td>
      <td class="tr1" >最后登录IP</td>
      <td class="tr1"  id="sort_userLoginTimes"  onClick="SetSort('userLoginTimes')">登陆次数</td>
      <td class="tr1"  id="sort_userLastDate" onClick="SetSort('userLastDate')">最后登陆</td>
      <td class="tr1"  id="sort_userRegDate"  onClick="SetSort('userRegDate')">注册时间</td>
      <td class="tr1">选择<input style="width:auto; border:none"  type="checkbox" onclick="chooseall(this,'chkLockID[]')"></td>
    </tr>
    <?php unset($this->_sections['userList']);
$this->_sections['userList']['name'] = 'userList';
$this->_sections['userList']['loop'] = is_array($_loop=$this->_tpl_vars['arrUserList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['userList']['show'] = true;
$this->_sections['userList']['max'] = $this->_sections['userList']['loop'];
$this->_sections['userList']['step'] = 1;
$this->_sections['userList']['start'] = $this->_sections['userList']['step'] > 0 ? 0 : $this->_sections['userList']['loop']-1;
if ($this->_sections['userList']['show']) {
    $this->_sections['userList']['total'] = $this->_sections['userList']['loop'];
    if ($this->_sections['userList']['total'] == 0)
        $this->_sections['userList']['show'] = false;
} else
    $this->_sections['userList']['total'] = 0;
if ($this->_sections['userList']['show']):

            for ($this->_sections['userList']['index'] = $this->_sections['userList']['start'], $this->_sections['userList']['iteration'] = 1;
                 $this->_sections['userList']['iteration'] <= $this->_sections['userList']['total'];
                 $this->_sections['userList']['index'] += $this->_sections['userList']['step'], $this->_sections['userList']['iteration']++):
$this->_sections['userList']['rownum'] = $this->_sections['userList']['iteration'];
$this->_sections['userList']['index_prev'] = $this->_sections['userList']['index'] - $this->_sections['userList']['step'];
$this->_sections['userList']['index_next'] = $this->_sections['userList']['index'] + $this->_sections['userList']['step'];
$this->_sections['userList']['first']      = ($this->_sections['userList']['iteration'] == 1);
$this->_sections['userList']['last']       = ($this->_sections['userList']['iteration'] == $this->_sections['userList']['total']);
?>
    <tr >
      <input type="hidden" name="hidUserID[]" value="<?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userID']; ?>
">
      <td class="tr_a"   title="<?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userName']; ?>
"><?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userName']; ?>
(<?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['from']; ?>
)</td>
      <td class="tr_a"  ><a target="_blank" href="http://<?php echo @SITE_DOMAIN; ?>
/i/?<?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['domain']; ?>
"><?php echo @SITE_DOMAIN; ?>
/i/?<?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['domain']; ?>
</a></td>
      <td class="tr_a"  ><?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userRegIP']; ?>
</td>
      <td class="tr_a"  ><?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userLoginTimes']; ?>
</td>
      <td  class="tr_a"  title="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userLastDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userLastDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
      <td  class="tr_a"  title="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userRegDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userRegDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>

      <td class="tr_a"><input style="width:auto; border:none"  type="checkbox" name="chkLockID[]" id="chkLockID" value="<?php echo $this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userID']; ?>
" <?php if ($this->_tpl_vars['arrUserList'][$this->_sections['userList']['index']]['userStatus'] == '0'): ?>checked<?php endif; ?> /></td>
    </tr>
    <?php endfor; endif; ?>
    <tr >
      <td colspan="8" align="right"  class="ly_Rtd" style="padding:6px 0;"><?php echo $this->_tpl_vars['pager']; ?>
<input type="submit" name="btnLock" value=" 锁  定 " class="button" <?php if ($this->_tpl_vars['lockUser'] != 'true'): ?>disabled<?php endif; ?> /></td>
    </tr>
  </table>
</form>
<div class="clear"></div>
  </div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>