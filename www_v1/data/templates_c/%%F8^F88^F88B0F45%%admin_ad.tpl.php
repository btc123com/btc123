<?php /* Smarty version 2.6.18, created on 2012-06-20 20:16:19
         compiled from admin/admin_ad.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/admin_ad.tpl', 46, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
function showimg(){
	document.getElementById('showimg').style.display = 'block';
}
function removeimg(){
	document.getElementById('showimg').style.display = 'none';
}
function check(){
	var code = document.getElementById('code').value;
	var ord = document.getElementById('order').value;
	if(code == ''){
		alert("广告代码不能为空！");
		return false;
	}
	var re=/^[0-9]+$/;
	var r = re.exec(ord);
	if (r == null){
		alert("排序必须为数字！");
		return false;
	}
	htmlnotice(1);
	return true;
}
</script>
<?php if ($_GET['act'] == 'update'): ?>
<div id="box">
<div class="right">
<form action="?act=update" method="post" onSubmit="if(confirm('确定要操作吗？')){htmlnotice(1);return true;}else{return false;}" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
    <tr >
    <td class="title_edit">
     <h1>广告修改</h1>
   </td>
    </tr>
  <tr>
    <td class="edit_main">
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="19%" height="36"><div align="right">广告代码:</div></td>
            <td width="81%" height="36"><label>
            <input name="autoID" type="hidden" value="<?php echo $this->_tpl_vars['adCon']['autoID']; ?>
"/>
            <input name="adID" type="hidden" value="<?php echo $this->_tpl_vars['adCon']['id']; ?>
"/>
            <input name="adTitle" type="hidden" value="<?php echo $this->_tpl_vars['adCon']['title']; ?>
"/>
            <input name="adSize" type="hidden" value="<?php echo $this->_tpl_vars['adCon']['size']; ?>
"/>
            <textarea name="adContent" style="width:100%; height:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['adCon']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
              </label></td>
          </tr>
          <tr>
            <td height="36"><div align="right">广告顺序:</div></td>
            <td height="36"><label>
              <input style="width:50px;" name="adOrders" type="text" value="<?php echo $this->_tpl_vars['adCon']['orders']; ?>
"/>
              </label></td>
          </tr>
           <tr>
            <td height="36"><div align="right">站点状态:</div></td>
            <td height="36"><input style="width:20px;" name="adStatus" type="radio" value="1" checked="checked" />启用
            <input style="width:20px;" value="0" name="adStatus" type="radio" />不启用</td>
          </tr>
          <tr><td height="36">&nbsp;</td>
        <td height="36"><input type="submit" name="upAd" value="修改" class="button"/></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
  <div class="clear"></div>
  </div>
<?php else: ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <form action="?act=updateAll" method="post" onSubmit="if(confirm('确定要操作吗？')){htmlnotice(1);return true;}else{return false;}">
      <tr>
          <td colspan="6" align="right"><input type="submit" name="upAdAll" value="提交全部" class="button" /></td>
        </tr>
        <tr>
        <td width="5%" class="tr1">排序</td>
          <td width="10%" class="tr1">标题</td>
          <td width="5%" class="tr1">尺寸</td>
          <td width="65%" class="tr1">内容</td>

          <td width="5%" class="tr1">启用</td>
          <td width="5%" class="tr1" onclick="CheckedAll('chkDelID');">操作</td>
        </tr>
        <?php $_from = $this->_tpl_vars['arradmin_ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['arrMessage'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arrMessage']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['arrMessage']['iteration']++;
?>
        <tr>
        	<td class="tr_a"><div align="center"><input style="width:20px;" type="text" name="orders[<?php echo $this->_tpl_vars['list']['autoID']; ?>
]" value="<?php echo $this->_tpl_vars['list']['orders']; ?>
"/></div></td>
          <input type="hidden" name="hidMid[<?php echo $this->_tpl_vars['list']['autoID']; ?>
]" value="<?php echo $this->_tpl_vars['list']['autoID']; ?>
" />
          <td class="tr_a"><div align="center"><?php echo $this->_tpl_vars['list']['title']; ?>
</div></td>
          <td class="tr_a"><div align="center">宽:<?php echo $this->_tpl_vars['list']['wide']; ?>
<br/>高:<?php echo $this->_tpl_vars['list']['high']; ?>
</div></td>
          <td class="tr_a"><div align="center">
          <textarea style="width:80%; height:80px;" name="content[<?php echo $this->_tpl_vars['list']['autoID']; ?>
]"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['content'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
          <iframe title="广告效果预览" src="adminAd.php?cid=<?php echo $this->_tpl_vars['list']['autoID']; ?>
" width="80%" height="60" align="middle" SCROLLING="auto" FRAMEBORDER="0"></iframe>
          </div></td>

            <?php if ($this->_tpl_vars['list']['status'] == 1): ?>
            <td class="tr_a"><div align="center">
            <input style="width:20px;" type="checkbox" name="adStatus[<?php echo $this->_tpl_vars['list']['autoID']; ?>
]" checked="checked"/></td>
            <?php else: ?>
           <td class="tr_a"><div align="center">
            <input style="width:20px;" type="checkbox" name="adStatus[<?php echo $this->_tpl_vars['list']['autoID']; ?>
]"/></div></td>
            <?php endif; ?>
          <td class="tr_a"><div align="center"><a href="?autoID=<?php echo $this->_tpl_vars['list']['autoID']; ?>
&act=update"><font color='red'>修改</font></a></div></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr>
          <td colspan="6" align="right"><?php echo $this->_tpl_vars['pager']; ?>
<input type="submit" name="upAdAll" value="提交全部" class="button" /></td>
        </tr>
      </form>
    </table>
<form action="?act=add" method="post"  enctype="multipart/form-data" onSubmit="return check();">
<table border="0" cellspacing="0" cellpadding="1" class="edit" width="100%">
    <tr>
    <td colspan="2" class="title_edit">
     <h1>广告添加</h1>
   </td>
    </tr>
    <tr>
		<td class="edit_main" width="68%"><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td width="26%" height="36"><div align="right">广告代码:</div></td>
            <td width="74%" height="36"><label>
            <input name="adID" type="hidden" value="<?php echo $this->_tpl_vars['list']['id']; ?>
"/>
            <input name="adTitle" type="hidden" value="<?php echo $this->_tpl_vars['list']['title']; ?>
"/>
            <input name="adWide" type="hidden" value="<?php echo $this->_tpl_vars['list']['wide']; ?>
"/><input name="adHigh" type="hidden" value="<?php echo $this->_tpl_vars['list']['high']; ?>
"/>
              <textarea name="adContent" id="code" style="width:100%; height:110px;"></textarea>
              </label></td>
          </tr>
          <tr>
           <td height="36"><div align="right">广告顺序:</div></td>
            <td height="36"><label>
              <input name="adOrders" id="order" type="text" value=""/>
              </label><span style="cursor:pointer; border:1px solid;" onmouseover="showimg()" onmouseout="removeimg()">位置预览</span></td>
          </tr>
           <tr>
            <td height="36"><div align="right">站点状态:</div></td>
            <td height="36"><input style="width:20px; border:none" name="adStatus" type="radio" value="1" checked="checked" />启用
            <input style="width:20px;border:none;" value="0" name="adStatus" type="radio" />不启用</td>
          </tr>
          <tr><td height="36">&nbsp;</td>
        <td height="36"><input type="submit" name="addAd" value=" 添 加 " class="button"/></td>
          </tr>
        </table></td>
        <td class="edit_main" width="32%" style="margin:0px; padding:0px;">
		<div id="showimg" style="border:0px; position:relative; display:none; margin:0px; padding:0px;">
		<img height="240px" width="270px" src="<?php echo $this->_tpl_vars['adImgPath']; ?>
" style="border:0px;"/></div>
        </td>
    </tr>
  </table>
</form>
<div class="clear"></div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>