<?php /* Smarty version 2.6.18, created on 2012-06-26 23:51:41
         compiled from admin/adminUserSite.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/adminUserSite.tpl', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['viewSite'] == 'true'): ?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>用户站点管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSearchField'],'selected' => $_GET['searchField']), $this);?>

        </select>
		<input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" />
		用户名:<input type="text" name="userName" value="<?php echo $_GET['userName']; ?>
" />
		<input type="hidden" value="1" name="search" />
		<input type="submit" value=" 搜 索 " class="button"> <?php if ($_GET['search']): ?><input type="button" class="button" onclick="location.href='adminUserSite.php';" value="取消搜索" /><?php endif; ?></div></td>
        </tr>
        </form>
      </table>

     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
	<form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
	<tr >
      <td colspan="5" align="right" class="ly_Rtd" style="padding:6px 0;"><input type="submit" name="btnDelete" value=" 删  除 " class="button" <?php if ($this->_tpl_vars['delSite'] != 'true'): ?>disabled<?php endif; ?>></td>
    </tr>
    <tr>
      <td width="20%"  class="tr1">站点名称</td>
	  <td width="50%"  class="tr1" id="sort_siteUrl">站点URL</td>
	  <td width="20%"  class="tr1">用户名称</td>
      <td width="10%"  class="tr1"><span class="btn">选择<input style="width:auto;border:0;"  type="checkbox" onclick="chooseall(this,'chkDelID[]')" ></span></td>
    </tr>
		<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['arrSite']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
$this->_sections['loop']['start'] = $this->_sections['loop']['step'] > 0 ? 0 : $this->_sections['loop']['loop']-1;
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = $this->_sections['loop']['loop'];
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
    <tr >
      <input type="hidden" name="hidSiteID[]" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
">
      <td class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteName']; ?>
</td>
	  <td  class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl']; ?>
</td>
	  <td  class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['userName']; ?>
 &nbsp;</td>
      <td  class="tr_a">
	  	<input style="width:auto;border:0"  type="checkbox" name="chkDelID[]" id="chkDelID" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" />
      </td>
    </tr>
		<?php endfor; endif; ?>
    <tr >
      <td colspan="5" align="right" class="ly_Rtd" style="padding:6px 0;"><?php echo $this->_tpl_vars['pager']; ?>
 <input type="submit" name="btnDelete" value=" 删  除 " class="button" <?php if ($this->_tpl_vars['delSite'] != 'true'): ?>disabled<?php endif; ?>></td>
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