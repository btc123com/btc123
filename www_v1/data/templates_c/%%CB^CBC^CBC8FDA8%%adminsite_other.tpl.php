<?php /* Smarty version 2.6.18, created on 2012-06-20 15:47:19
         compiled from admin/adminsite_other.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'admin/adminsite_other.tpl', 59, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
function addTab(){
	var str='<td class="tr_a"><input type="text" name="isort[add]" value="" style="width:35px"></td><td class="tr_a"><input type="text" name="iname[add]" value="" style="width:80px"></td><td class="tr_a"><textarea name="iiframe[add]" style="width:100%; height:80px;"></textarea></td><td class="tr_a"><input type="checkbox" name="iid[]" id="iid" value="add" style="width:20px"/></td>';
	$("#addTab").html(str);
}
function sub(){
var iid = document.getElementsByName("iid[]");
var iidcheck = 0;
for(var i=0;i<iid.length;i++){
	if(iid[i].checked){
		iidcheck = 1;
	}
}
if(iidcheck == 0){
alert("未选择需要的操作项！");
return false;
}
var check = confirm('确定要操作吗？');
if(check){
}else{
	return false;
}
htmlnotice(1);
return true;
}
</script>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>首页名站切换栏设置</h1>
</td>
        </tr>
      </table>

 <form action="?act=operate" method="post" onSubmit="return sub();">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right"><input type="button" id="addbtn" value="增加标签" class="button" onclick="addTab();"/><input type="submit" name="upsub" value=" 提交修改 " class="button"  /><input type="submit" name="delsub" value=" 提交删除 " class="button"  /></td>
      </tr>
    </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
    <tr >
      <td class="tr1">排序</td>
      <td class="tr1">标签名称</td>
      <td class="tr1">iframe网址</td>
      <td class="tr1">选择<input style="width:auto;border:none"  type="checkbox" onclick="chooseall(this,'iid[]')"></td>
    </tr>
    <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['indexArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
    <tr >
      <td class="tr_a"><input type="text" name="isort[<?php echo $this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['iid']; ?>
]" value="<?php echo $this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['isort']; ?>
" style="width:35px"></td>
      <td class="tr_a"><input type="text" name="iname[<?php echo $this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['iid']; ?>
]" value="<?php echo $this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['iname']; ?>
" style="width:80px"></td>
      <td class="tr_a"><textarea name="iiframe[<?php echo $this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['iid']; ?>
]" style="width:100%; height:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['iiframe'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea></td>
      <td class="tr_a"><input type="checkbox" name="iid[]" id="iid" value="<?php echo $this->_tpl_vars['indexArr'][$this->_sections['l']['index']]['iid']; ?>
" style="width:auto; border:none"/></td>
    </tr>
    <?php endfor; endif; ?>
    <tr id="addTab"></tr>
    <tr >
      <td colspan="5" align="right"  class="ly_Rtd"><input type="button" id="addbtn" value="增加标签" class="button" onclick="addTab();"/><input type="submit" name="upsub" value=" 提交修改 " class="button"  /><input type="submit" name="delsub" value=" 提交删除 " class="button"  /></td>
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