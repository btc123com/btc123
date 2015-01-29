<?php /* Smarty version 2.6.18, created on 2012-06-26 01:03:42
         compiled from tuan/manager/tuansites.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'tuan/manager/tuansites.tpl', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/tuan/js/manager.js"></script>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>团购网站管理</h1>
      <div class="search">
          	<form action="tuanindex.php?c=tuansites" method="post">
			站点名称:<input type="text" name="theform[s.sitename]">
			站点地址:<input type="text" name="theform[s.siteurl]">
            <input type="submit" name="Submit3" value="查 询" class="button ">
            <input type="button" onclick="window.location.href='tuanindex.php?c=tuansites&a=edit'" value="添加网站" class="button">
			<input class="button" type=button value="修改排序" onclick="doAction('sortorder','site','order','doform')"></form></div>
		</td>
        </tr>
  </table>
<table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">
      <tr id="title" >
    <td class="tr1"  width="10%">选择<input type="checkbox" onclick="chooseAll(this,'site')" style="width:auto;border:0"></td>
    <td class="tr1" width="10%">网站</td>
    <td class="tr1" width="30%">地址</td>
    <td class="tr1" width="10%">城市</td>
    <td class="tr1" width="10%">字体颜色</td>
    <td class="tr1" width="10%"><span style="width:100px;white-space:nowrap">首页名站推荐</span></td>
    <td class="tr1" width="5%">排序</td>
    <td class="tr1" width="15%">管理</td>
    </tr>
<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['voLists']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr ondblclick="location.href='?c=tuansites&a=edit&sid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sid']; ?>
';">
    <td class="tr_a"><input type="checkbox" id="choose_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sid']; ?>
" name="site" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sid']; ?>
" style="width:auto;border:0"></td>
    <td class="tr_a"><a href="?c=tuansites&a=edit&sid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sid']; ?>
"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sitename']; ?>
</a></td>
    <td class="tr_a"><a href="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['siteurl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['siteurl']; ?>
</a></td>
    <td class="tr_a"><font color="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['wordcolor']; ?>
"><?php echo ((is_array($_tmp=@$this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['city'])) ? $this->_run_mod_handler('default', true, $_tmp, '全国') : smarty_modifier_default($_tmp, '全国')); ?>
</font></td>
    <td class="tr_a"><font color="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['wordcolor']; ?>
"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['wordcolor']; ?>
</font></td>
    <td class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['commend']; ?>
</td>
    <td class="tr_a"><input type="text" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sortorder']; ?>
" name="order" style="width:auto;border:auto"></td>
    <td class="tr_a"><a href="?c=tuansites&a=edit&sid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sid']; ?>
">编辑</a> | <a href="?c=tuansites&a=delete&sid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sid']; ?>
">删除</a></td>
  </tr>
<?php endfor; endif; ?>
<tr>
    <td height="30" colspan="8" align="right" valign="middle" class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>
<input type="button" onclick="window.location.href='tuanindex.php?c=tuansites&a=edit'" value="添加网站" class="button"><input class="button" type=button value="修改排序" onclick="doAction('sortorder','site','order','doform')"></td></tr>
</table>
<form name="doform" action="?c=tuansites&a=do" method="post">
<input type="hidden" name="optype">
<input type="hidden" name="ids">
<input type="hidden" name="orders">
</form>
<div class="clear"></div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>