<?php /* Smarty version 2.6.18, created on 2012-06-26 00:55:45
         compiled from admin/theme.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="box">

  <div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>主题设置</h1>
</td>
    </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td style="padding-bottom:10px;">
        <?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['theme'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['theme']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['theme']['iteration']++;
?>
        <div class="<?php if ($this->_tpl_vars['list']['dir'] == @THEME_PATH): ?>selectskin<?php else: ?>unselectskin<?php endif; ?>">
				 			<img src="<?php if ($this->_tpl_vars['list']['dir'] == @THEME_PATH): ?>../theme/<?php echo $this->_tpl_vars['list']['dir']; ?>
pre.jpg<?php else: ?>../theme/<?php echo $this->_tpl_vars['list']['dir']; ?>
pre_gray.jpg<?php endif; ?>" alt="" width="135" height="90" border="0" class="skinimg"/>
				 			  <div class="skinDes">
				 			  <div style="height:38px;overflow:hidden"><b style="color:#004000"><?php echo $this->_tpl_vars['list']['name']; ?>
</b></div>
				 			  <span style="height:16px;overflow:hidden;cursor:default"><B>设计者:</B><?php echo $this->_tpl_vars['list']['author']; ?>
</span><br/>
				 			  <B>发布时间:</B> <?php echo $this->_tpl_vars['list']['pubDate']; ?>
<br/></div>
                <p class="set"> <?php if ($this->_tpl_vars['list']['dir'] != @THEME_PATH): ?><a href="?theme=<?php echo $this->_tpl_vars['list']['dir']; ?>
"><img border="0" src="images/ico_app.gif" />应用并生成静态</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?><a href="themeedit.php?theme=<?php echo $this->_tpl_vars['list']['dir']; ?>
"><img border="0" src="images/ico_edit.gif"/>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['list']['dir'] != 'default/'): ?><a href="?delete=<?php echo $this->_tpl_vars['list']['dir']; ?>
"><img  src="images/ico_del.gif" />删除</a><?php endif; ?></p>
						  </div>
				<?php endforeach; endif; unset($_from); ?>
</td>
      </tr>
    </table>
    </div>
  <div class="clear"></div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</body>
</html>