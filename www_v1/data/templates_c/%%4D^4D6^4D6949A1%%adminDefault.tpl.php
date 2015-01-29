<?php /* Smarty version 2.6.18, created on 2013-10-23 23:11:48
         compiled from admin/adminDefault.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <!--  <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
	  <tr>
	    <td class="title_edit">
	     <h1 style="float:left">补丁更新信息</h1>
	   </td>
	  </tr>
	<tr ><td class="edit_main">
<div id="update" style="display:none;overflow-x:hidden;overflow-y:auto;">
	<?php if ($this->_tpl_vars['upvers'] == '' && $this->_tpl_vars['updatavers'] == ''): ?>
		<font color=red>当前无更新补丁！</font>
	<?php else: ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
		<tr><td width="50%" class="tr1"><div align="left">&nbsp;&nbsp;当前可用的更新有：</div></td>
			<td width="50%" class="tr1"><div align="left">&nbsp;&nbsp;</div></td></tr>
		<tr>
		<td class="tr_a" style="background-color:#FFFFCC" valign="bottom">
		<?php if ($this->_tpl_vars['upvers'] == ''): ?>
			<font color=red>当前无安全更新补丁！</font>
		<?php else: ?>
			<form action="adminUpdate.php?a=download" method="POST">
				  <table border="0" cellspacing="0" cellpadding="0">
					<tr><td class="tr_c" align="center">
					  <ul class="gx">
						  <?php $_from = $this->_tpl_vars['upvers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['upvers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['upvers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['upvers']['iteration']++;
?>
						  <li>【安全更新】<input type="hidden" name="uptime[]" value="<?php echo $this->_tpl_vars['row']['time']; ?>
"/><?php echo $this->_tpl_vars['row']['time']; ?>
，更新说明：<?php echo $this->_tpl_vars['row']['text']; ?>
</li>
					   <?php endforeach; endif; unset($_from); ?>
					  </ul></td></tr>
					 <tr><td class="tr_c"><input type="submit" class="button" style="cursor: pointer;width:auto" value=" 点击此下载所有更新文件，然后选择安装 " name="sub">&nbsp;&nbsp;&nbsp;<input type="submit" class="button" style="cursor: pointer;width:auto" value="忽略以上补丁更新" name="misssub"></td>
			</tr></table></form>
		<?php endif; ?></td>
		<td class="tr_a" style="background-color:#FFFFCC" valign="bottom">
		<?php if ($this->_tpl_vars['updatavers'] == ''): ?>
			<font color=red>当前无数据更新补丁！</font>
		<?php else: ?>
			<form action="adminUpdate.php?a=downloaddata" method="POST">
				  <table border="0" cellspacing="0" cellpadding="0">
					<tr><td class="tr_c" align="center">
					  <ul class="gx">
					  <?php $_from = $this->_tpl_vars['updatavers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['updatavers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['updatavers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['updatavers']['iteration']++;
?>
						 <li>【数据更新】<input type="hidden" name="updata[]" value="<?php echo $this->_tpl_vars['row']['time']; ?>
"/><?php echo $this->_tpl_vars['row']['time']; ?>
，更新说明：<?php echo $this->_tpl_vars['row']['text']; ?>
</li>
						 <?php endforeach; endif; unset($_from); ?>
					  </ul></td></tr>
			<tr><td class="tr_c"><input type="submit" class="button" style="cursor: pointer;width:auto" value=" 点击此下载数据更新文件，然后选择安装 " name="submit">&nbsp;&nbsp;&nbsp;<input type="submit" class="button" style="cursor: pointer;width:auto" value="忽略以上数据更新" name="misssub"></td>
			</tr></table></form>
		<?php endif; ?></td>
		</tr></table>
	<?php endif; ?>
</div></td></tr>
</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
	  <tr>
	    <td class="title_edit">
	     <h1 style="float:left">5w.com网址导航新闻</h1><span style="float:right;line-height:30px;padding-right:42px;"><a href="http://bbs.5w.com/forum-post-action-newthread-fid-36.html" target="_blank">提交问题</a></span>
	   </td>
	  </tr>
	<tr ><td class="edit_main">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td width="50%" class="tr1">最新动态</td>
        <td width="50%" class="tr1">BUG反馈</td></tr>
      <tr><td class="tr_a" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['versionList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['versionList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['versionList']['iteration']++;
?>
      <tr><td class="tr_a" width="20%"><?php echo $this->_tpl_vars['row']['createDate']; ?>
</td><td class="tr_a"><a href="http://bbs.5w.com/thread-<?php echo $this->_tpl_vars['row']['mid']; ?>
-1-1.html" target="_blank"><?php echo $this->_tpl_vars['row']['title']; ?>
</a></td></tr>
      <?php endforeach; endif; unset($_from); ?>
      </table>
      </td>
      <td class="tr_a" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <?php $_from = $this->_tpl_vars['question']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['versionList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['versionList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['versionList']['iteration']++;
?>
      <tr><td class="tr_a" width="20%"><?php echo $this->_tpl_vars['row']['cdate']; ?>
</td><td class="tr_a"><a href="http://bbs.5w.com/thread-<?php echo $this->_tpl_vars['row']['news_id']; ?>
-1-1.html" target="_blank"><?php echo $this->_tpl_vars['row']['news_title']; ?>
</a></td></tr>
      <?php endforeach; endif; unset($_from); ?>
      </table>
      </td>
      </tr>
</table></td></tr>
</table> -->
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
	  <tr>
	    <td class="title_edit">
	     <h1>基本信息统计</h1>
	   </td>
	  </tr>
	  <tr ><td class="edit_main">
	 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td class="tr_a" width="50%"><div align="center">SYSTEM:<font color=red><?php echo $this->_tpl_vars['sysContent']['sysinfo']; ?>
</font></div></td>
        <td class="tr_a" width="50%"><div align="center">Server IP:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['serverip']; ?>
</font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Mysql Version:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['dbversion']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">Display_errors:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['dispalyerror']; ?>
</font></div></td>
      </tr>
            <tr>
        <td class="tr_a"><div align="center">PHP Version:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['phpversion']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">iconvsp:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['iconvsp']; ?>
</font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">WEB_SERVER:<font color=red><?php echo $this->_tpl_vars['webSer']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">Session Support:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['sessionsp']; ?>
</font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Server Api:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['serverapi']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">Cookie Support:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['sessionsp']; ?>
</font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Max postsize:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['maxpostsize']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">Max upsize:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['maxupsize']; ?>
</font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">Max exectime:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['maxexectime']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">Php Safe:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['phpsafe']; ?>
</font></div></td>
      </tr>
      <tr>
        <td class="tr_a"><div align="center">JSON Support:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['json']; ?>
</font></div></td>
        <td class="tr_a"><div align="center">Data Size:
	          <font color=red><?php echo $this->_tpl_vars['sysContent']['datasize']; ?>
</font></div></td>
      </tr></table>
	</td></tr>
</table>
<script type="text/javascript">
$(document).ready(function(){
	$('#update').slideDown('slow');
})
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>