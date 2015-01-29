<?php /* Smarty version 2.6.18, created on 2012-06-26 00:55:49
         compiled from admin/themeedit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
var lastclick=0;
function clickleaf(sid){
	if(undefined != lastclick)
		$('#image_'+lastclick).attr('src','./images/arrow_file.jpg');
	$('#image_'+sid).attr('src','./images/arrow_file_on.jpg');
	lastclick = sid;
}
</script>
<div id="box">

  <div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>编辑主题</h1>
</td>
    </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        
        <?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['theme'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['theme']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['list']):
        $this->_foreach['theme']['iteration']++;
?>
        <td>
				 	<a href="themedetail.php?theme=<?php echo $this->_tpl_vars['theme']; ?>
&file=<?php echo $this->_tpl_vars['key']; ?>
" target="editFrame" onclick="clickleaf(<?php echo ($this->_foreach['theme']['iteration']-1); ?>
)"><img src="<?php if (($this->_foreach['theme']['iteration']-1) == 0): ?>./images/arrow_file_on.jpg<?php else: ?>./images/arrow_file.jpg<?php endif; ?>" id="image_<?php echo ($this->_foreach['theme']['iteration']-1); ?>
"/><?php echo $this->_tpl_vars['list']; ?>
</a>
				</td>
				<?php endforeach; endif; unset($_from); ?>

      </tr>
    </table>
    </div>
    <iframe id="editFrame" name="editFrame" src="themedetail.php?theme=<?php echo $this->_tpl_vars['theme']; ?>
&file=index.tpl" style="width: 98%; height: 550px;"></iframe>
  <div class="clear"></div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>