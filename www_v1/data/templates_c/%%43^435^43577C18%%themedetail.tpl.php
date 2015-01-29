<?php /* Smarty version 2.6.18, created on 2012-06-26 00:55:49
         compiled from admin/themedetail.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="../static/codepress/codepress.js" type="text/javascript"></script>
<script type="text/javascript">
function mygetcode(){
	document.forms['mypost'].content.value = cp1.getCode();
	return true;
}
</script>

<div id="box">

  <div class="right">
<textarea id="cp1" class="codepress html" wrap="off" style="width: 98%; height: 500px; border: 1px solid rgb(204, 204, 204); overflow-x: hidden; overflow-y: scroll;">
<?php echo $this->_tpl_vars['content']; ?>

</textarea>
<form method="post" action="" name="mypost" onsubmit="return mygetcode()">
<input type="hidden" name="theme" value="<?php echo $this->_tpl_vars['theme']; ?>
">
<input type="hidden" name="file" value="<?php echo $this->_tpl_vars['file']; ?>
">
<textarea name="content" style="display:none"></textarea>
<input type="submit" value="提交修改" style="width:auto"><input type="reset" value="取消修改" style="width:auto">
</form>

    </div>
</div>

</body>
</html>