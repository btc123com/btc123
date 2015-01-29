<?php /* Smarty version 2.6.18, created on 2012-06-26 23:50:31
         compiled from admin/adminUserSetting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'admin/adminUserSetting.tpl', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="box">
<div class="right">
<form name="setting" action="adminUserSetting.php?act=update" method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>站点基本配置</h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="25%" height="66"><div align="right">自定义设置：</div></td>
        <td width="75%" height="66">
<input style="width:20px; border:none" name="userSite" type="radio" value="1" <?php if ($this->_tpl_vars['sets'] == 1): ?>checked="checked"<?php endif; ?> />默认方式  <?php echo @SITE_DOMAIN; ?>
/i/?userdomain<br/>
<input style="width:20px; border:none" name="userSite" type="radio" value="2" <?php if ($this->_tpl_vars['sets'] == 2): ?>checked="checked"<?php endif; ?>/>启用二级目录 <?php echo @SITE_DOMAIN; ?>
/i/userdomain/（注：您的服务器必须支持url重写）<br/>
<input style="width:20px; border:none" name="userSite" type="radio" value="3" <?php if ($this->_tpl_vars['sets'] == 3): ?>checked="checked"<?php endif; ?>/>启用二级域名 userdomain<?php echo ((is_array($_tmp=@SITE_DOMAIN)) ? $this->_run_mod_handler('substr', true, $_tmp, 3) : substr($_tmp, 3)); ?>
（注：您的服务器必须支持url重写）
        </td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td height="36"><input type="submit" class="button" id="button" value="提交" /> <a href="http://bbs.5w.com/thread-302-1-1.html" target="_blank">url重写范例</a>
        </td>
      </tr>
    </table>
     </td>
     </tr>
    </table>
 </form>

  <div class="clear"></div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>