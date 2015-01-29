<?php /* Smarty version 2.6.18, created on 2012-06-26 01:04:21
         compiled from tuan/manager/tuanapis.tpl */ ?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>团购接口管理</h1>
      <div class="search"><form action="tuanindex.php?c=tuanapis" method="post">
			模板名称:<input type="text" name="theform[apiname]">
            <input type="submit" name="Submit3" value="查 询" class="button">
            <input type="button" onclick="window.location.href='tuanindex.php?c=tuanapis&a=edit'" value="添加API模板" class="button">
			</form></div>
		</td>
        </tr>
  </table>
<table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">
      <tr id="title" >
      <td width="50%" class="tr1">API模板名称</td>
    <td width="50%" class="tr1">管理</td></tr>
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
  <tr ondblclick="location.href='?c=tuanapis&a=edit&aid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['aid']; ?>
';">
    <td class="tr_a"><a href="?c=tuanapis&a=edit&aid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['aid']; ?>
"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['apiname']; ?>
</a></td>
    <td class="tr_a"><a href="?c=tuanapis&a=edit&aid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['aid']; ?>
">编辑</a> | <a href="?c=tuanapis&a=delete&aid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['aid']; ?>
">删除</a></td>
  </tr>
  <tr  class="tb_line">
    <td colspan="8" ></td>
    </tr>
<?php endfor; endif; ?>
<tr>
    <td height="30" colspan="2" align="right" valign="middle" class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>
<input type="button" onclick="window.location.href='tuanindex.php?c=tuanapis&a=edit'" value="添加API模板" class="button">
</td></tr>
</table>
<div class="clear"></div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>