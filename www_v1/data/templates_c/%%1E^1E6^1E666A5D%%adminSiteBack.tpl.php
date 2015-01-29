<?php /* Smarty version 2.6.18, created on 2012-06-20 16:27:59
         compiled from admin/adminSiteBack.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>网址回收</h1>
</td>
        </tr>
        </form>
      </table>

 <form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
  <tr >
      <td colspan="8" align="right"  class="ly_Rtd"><input type="submit" name="btnBack" value=" 恢 复 " class="button"  /><input type="submit" name="btnDelete" value=" 永久删除 " class="button"  /></td>
    </tr>
    <tr >
      <td  class="tr1">名称</td>
      <td class="tr1" >网址</td>
      <td class="tr1" >原分类</td>
      <td class="tr1">选择<input style="width:auto; border:none"  type="checkbox" onclick="chooseall(this,'chkSiteID[]')"></td>
    </tr>
    <?php unset($this->_sections['userList']);
$this->_sections['userList']['name'] = 'userList';
$this->_sections['userList']['loop'] = is_array($_loop=$this->_tpl_vars['arrSiteList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <td class="tr_a"   title="<?php echo $this->_tpl_vars['arrSiteList'][$this->_sections['userList']['index']]['siteName']; ?>
"><?php echo $this->_tpl_vars['arrSiteList'][$this->_sections['userList']['index']]['siteName']; ?>
</td>
      <td class="tr_a"  ><a target="_blank" href="<?php echo $this->_tpl_vars['arrSiteList'][$this->_sections['userList']['index']]['siteUrl']; ?>
"><?php echo $this->_tpl_vars['arrSiteList'][$this->_sections['userList']['index']]['siteUrl']; ?>
</a></td>
      <td class="tr_a"  ><?php echo $this->_tpl_vars['arrSiteList'][$this->_sections['userList']['index']]['stpName']; ?>
</td>
      <td class="tr_a"><input style="width:auto;border:none"  type="checkbox" name="chkSiteID[]" id="chkSiteID" value="<?php echo $this->_tpl_vars['arrSiteList'][$this->_sections['userList']['index']]['siteID']; ?>
" /></td>
    </tr>
    <?php endfor; endif; ?>
    <tr >
      <td colspan="8" align="right"  class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>
<input type="submit" name="btnBack" value=" 恢 复 " class="button"  /><input type="submit" name="btnDelete" value=" 永久删除 " class="button"  /></td>
    </tr>
  </table>
</form>
<div class="clear"></div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>