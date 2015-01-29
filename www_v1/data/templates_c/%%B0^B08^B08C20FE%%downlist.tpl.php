<?php /* Smarty version 2.6.18, created on 2012-06-20 15:27:52
         compiled from admin/downlist.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td width="100%" class="tr1">更新补丁信息</td></tr>
      <tr><td class="tr_a" valign="top">
<ul style="text-align:left;background-color:#FFD">
<?php if ($this->_tpl_vars['update'] == 1): ?>
<form action="adminUpdate.php?a=apply" method="POST">
<li>已成功下载的更新文件：</li>
<?php $_from = $this->_tpl_vars['file_succ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['file_succ'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['file_succ']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['file_succ']['iteration']++;
?>
<li>【安全更新】../data/update/<?php echo $this->_tpl_vars['row']; ?>
<input type="hidden" value="<?php echo $this->_tpl_vars['row']; ?>
" name="upfiles[]"></li>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['file_fail'] != ''): ?>
<li><font color=red>下载失败的文件：</font></li>
<?php $_from = $this->_tpl_vars['file_fail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fail'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fail']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['frow']):
        $this->_foreach['fail']['iteration']++;
?>
<li><?php echo $this->_tpl_vars['frow']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
<input type="button" class="button"  style="cursor: pointer;" value=" 返回重新下载 " onclick="location.href='main.php'">
<?php else: ?>
<li><input type="submit" class="button" style="cursor: pointer;" value=" 点此安装更新补丁 " name="sub"></li>
<?php endif; ?>
</form>
<?php elseif ($this->_tpl_vars['update'] == 2): ?>
<form action="adminUpdate.php?a=applydata" method="POST">
<li>已成功下载的数据文件：</li>
<?php $_from = $this->_tpl_vars['data_succ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['data_succ'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['data_succ']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['data_succ']['iteration']++;
?>
<li>【数据更新】../data/update/sql/<?php echo $this->_tpl_vars['row']; ?>
<input type="hidden" value="<?php echo $this->_tpl_vars['row']; ?>
" name="updata[]"></li>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['data_fail'] != ''): ?>
<li><font color=red>下载失败的文件：</font></li>
<?php $_from = $this->_tpl_vars['data_fail']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['data_fail'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['data_fail']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['frow']):
        $this->_foreach['data_fail']['iteration']++;
?>
<li><?php echo $this->_tpl_vars['frow']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
<input type="button" class="button"  style="cursor: pointer;" value=" 返回重新下载 " onclick="location.href='main.php'">
<?php else: ?>
<li><input type="submit" class="button" style="cursor: pointer;" value=" 点此安装数据更新 " name="submit"></li>
<?php endif; ?>
</form>
<?php endif; ?>
</ul>
      </td>
      </tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>