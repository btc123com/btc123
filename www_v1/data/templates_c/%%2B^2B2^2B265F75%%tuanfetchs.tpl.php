<?php /* Smarty version 2.6.18, created on 2012-06-26 01:03:54
         compiled from tuan/manager/tuanfetchs.tpl */ ?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>团购采集管理</h1>
      <div class="search">
            <input type="button" onclick="window.location.href='tuanindex.php?c=tuanfetchs&a=edit'" value="添加采集" class="button">&nbsp;
            <input type="button" onclick="if(confirm('确定要采集所有团购数据？')){window.location.href='http://<?php echo @SITE_DOMAIN; ?>
/tuan/crontab/tuanfetch.php'}" value="开始采集" class="button">
            </div>
		</td>
        </tr>
  </table>
<table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">
      <tr id="title" >
    <td class="tr1">网站</td>
    <td class="tr1">API地址</td>
    <td class="tr1">API模板</td>
    <td class="tr1">采集状态</td>
    <td class="tr1">管理</td>
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
  <tr ondblclick="location.href='?c=tuanfetchs&a=edit&fid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['fid']; ?>
';">
    <td  class="tr_a"><a href="?c=tuanfetchs&a=edit&fid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['fid']; ?>
"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sitename']; ?>
</a></td>
    <td  class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['apiurl']; ?>
</td>
    <td  class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['apiname']; ?>
</td>
    <td  class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['apifetch']; ?>
</td>
    <td class="tr_a"><a href="?c=tuanfetchs&a=edit&fid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['fid']; ?>
">编辑</a> | <a href="?c=tuanfetchs&a=delete&fid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['fid']; ?>
">删除</a></td>
  </tr>
<?php endfor; endif; ?>
<tr>
    <td height="30" colspan="5" align="right" valign="middle" class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>

            <input type="button" onclick="window.location.href='tuanindex.php?c=tuanfetchs&a=edit'" value="添加采集" class="button">&nbsp;
            <input type="button" onclick="if(confirm('确定要采集所有团购数据？')){window.location.href='http://<?php echo @SITE_DOMAIN; ?>
/tuan/crontab/tuanfetch.php'}" value="开始采集" class="button">
            </td></tr>
</table>
<div class="clear"></div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>