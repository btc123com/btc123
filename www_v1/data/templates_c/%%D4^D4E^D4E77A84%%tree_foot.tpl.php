<?php /* Smarty version 2.6.18, created on 2012-06-20 15:47:17
         compiled from admin/tree_foot.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="box">

<script type="text/javascript">
var lastclick;
function clickleaf(sid){
	if(lastclick)
		lastclick.attr('src','./images/arrow_file.jpg');
	$('#image_'+sid).attr('src','./images/arrow_file_on.jpg');
	lastclick = $('#image_'+sid);
}
</script>
<div class="right">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#d1d1d1">
      <tr>
        <td width="152" valign="top" bgcolor="#FFFFFF">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/sbg.jpg" width="152" height="26" /></td>
          </tr>
          <tr>
            <td>
<a href="./adminsite_foot.php?typeid=0" target="innermainFrame">回到根节点</a>
<ul>
<?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trees']):
?>
<li><?php if ($this->_tpl_vars['trees']['child']): ?><img style="cursor:pointer" title="展开/收缩下级菜单" src="./images/folder-closed.gif" id="image_<?php echo $this->_tpl_vars['trees']['stpID']; ?>
" onclick="shownode(<?php echo $this->_tpl_vars['trees']['stpID']; ?>
)"><?php else: ?><img src="./images/arrow_file.jpg" id="image_<?php echo $this->_tpl_vars['trees']['stpID']; ?>
"><?php endif; ?><span><a onclick="clickleaf(<?php echo $this->_tpl_vars['trees']['stpID']; ?>
)" title="查看详细站点和下级菜单信息" href="adminsite_foot.php?typeid=<?php echo $this->_tpl_vars['trees']['stpID']; ?>
" target="innermainFrame"><?php echo $this->_tpl_vars['trees']['stpName']; ?>
</a></span><ul id="child_<?php echo $this->_tpl_vars['trees']['stpID']; ?>
"></ul></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</td>
          </tr>
        </table>
        </td>
      </table>
    </div>
</div>


</body>
</html>