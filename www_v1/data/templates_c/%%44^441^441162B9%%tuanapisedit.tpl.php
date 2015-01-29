<?php /* Smarty version 2.6.18, created on 2012-07-01 00:27:35
         compiled from tuan/manager/tuanapisedit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
function sub(){
var check = confirm('确定要操作吗？');
if(check){
	var search_select = document.getElementById('search_select').value;
	var action = document.getElementById('action').value;
	var name = document.getElementById('name').value;
	var img_url = document.getElementById('img_url').value;
	var sort = document.getElementById('sort').value;
	var sort1 = document.getElementById('sort1').value;
	var sort2 = document.getElementById('sort2').value;
	if(search_select=='' || action=='' || name=='' || img_url=='' || sort=='' || sort1=='' || sort2==''){
		alert("有必填项未填写！");
		return false;
	}
}else{
	return false;
}
return true;
}
</script>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>编辑资料<?php if ($this->_tpl_vars['operateFlag']): ?>--操作成功！<?php endif; ?></h1></td>
        </tr>
  </table>
<form action="?c=tuanapis&a=edit&aid=<?php echo $this->_tpl_vars['arrAPI']['aid']; ?>
" method="post" onSubmit="return sub();">
<input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['arrAPI']['aid']; ?>
">
 <table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
 		<tr>
		    <td width="20%" class="tr_a" style="text-align:right">API名称*</td>
		    <td width="80%" class="tr_a" style="text-align:left">
		    <input id="search_select" type="text" name="theform[apiname]" value="<?php echo $this->_tpl_vars['arrAPI']['apiname']; ?>
">
		    <font style="color:red">如：百度API</font>
		    </td>
		    </tr>
		<tr>
		    <td class="tr_a" style="text-align:right">团标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input id="action" type="text" name="theform[grouptag]" value="<?php echo $this->_tpl_vars['arrAPI']['grouptag']; ?>
">
		    <font style="color:red">如：url</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">团购标题标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input id="name" type="text" name="theform[groupname]" value="<?php echo $this->_tpl_vars['arrAPI']['groupname']; ?>
">
		    <font style="color:red">如：title</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">详细链接标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input id="img_url" type="text" name="theform[linkurl]" value="<?php echo $this->_tpl_vars['arrAPI']['linkurl']; ?>
">
		    <font style="color:red">如：loc</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">新价标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input id="sort" type="text" name="theform[newprice]" value="<?php echo $this->_tpl_vars['arrAPI']['newprice']; ?>
">
		    <font style="color:red">如：price</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">原价标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input id="sort1" type="text" name="theform[price]" value="<?php echo $this->_tpl_vars['arrAPI']['price']; ?>
">
		    <font style="color:red">如：value</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">折扣标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input id="sort2" type="text" name="theform[discount]" value="<?php echo $this->_tpl_vars['arrAPI']['discount']; ?>
">
		    <font style="color:red">如：rebate</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">人数标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[personnum]" value="<?php echo $this->_tpl_vars['arrAPI']['personnum']; ?>
">
		    <font style="color:red">如：bought</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">图片标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[picture]" value="<?php echo $this->_tpl_vars['arrAPI']['picture']; ?>
">
		    <font style="color:red">如：image</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">开始时间标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[starttime]" value="<?php echo $this->_tpl_vars['arrAPI']['starttime']; ?>
">
		    <font style="color:red">如：startTime</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">结束时间标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[endtime]" value="<?php echo $this->_tpl_vars['arrAPI']['endtime']; ?>
">
		    <font style="color:red">如：endTime</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">城市标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[city]" value="<?php echo $this->_tpl_vars['arrAPI']['city']; ?>
">
		    <font style="color:red">如：city</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">详细信息标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[detail]" value="<?php echo $this->_tpl_vars['arrAPI']['detail']; ?>
">
		    <font style="color:red">如：description</font>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">店铺地址标签</td>
		    <td class="tr_a" style="text-align:left">
		    <input type="text" name="theform[address]" value="<?php echo $this->_tpl_vars['arrAPI']['address']; ?>
">
		    <font style="color:red">如：address</font>
		    </td>
		    </tr>

			 <tr  class="tb_line">
		    <td colspan="2" ></td>
		    </tr>
		   <tr  >
		    <td height="30" colspan="2" align="center" valign="middle" class="ly_Rtd"><input type="submit" name="Submit" value="保 存" class="button" ><input type="button" class="button" value="返回" onclick="window.location.href='tuanindex.php?c=tuanapis'"></td>
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
