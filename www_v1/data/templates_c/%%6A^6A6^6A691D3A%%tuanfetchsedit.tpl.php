<?php /* Smarty version 2.6.18, created on 2012-07-01 00:27:51
         compiled from tuan/manager/tuanfetchsedit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tuan/manager/tuanfetchsedit.tpl', 16, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>编辑资料<?php if ($this->_tpl_vars['operateFlag'] == 1): ?>--操作成功！<?php endif; ?><?php if ($this->_tpl_vars['operateFlag'] == -1): ?>--<font color="red">操作失败！</font><?php endif; ?></h1></td>
        </tr>
  </table>

		<form action="?c=tuanfetchs&a=edit&fid=<?php echo $this->_tpl_vars['arrFetch']['fid']; ?>
" method="post">
		<input type="hidden" name="fid" value="<?php echo $this->_tpl_vars['arrFetch']['fid']; ?>
">
		<table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
		   <tr>
		    <td width="20%" class="tr_a" style="text-align:right">团购网站*</td>
		    <td width="80%" class="tr_a" style="text-align:left" colspan="3">
		    <select name="theform[siteid]">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSites'],'selected' => $this->_tpl_vars['arrFetch']['siteid']), $this);?>

			</select>
		    </td>
	      </tr>

			<tr >
		    <td class="tr_a" style="text-align:right">API地址</td>
		    <td class="tr_a" style="text-align:left" colspan="3">
		    <input type="text" name="theform[apiurl]" value="<?php echo $this->_tpl_vars['arrFetch']['apiurl']; ?>
" size="65">
		    <font style="color:red">提示:多个城市请用 {$city} 标示，并填写下面的城市字符串匹配</font>
		    </td>
		    </tr>

			<tr >
		    <td class="tr_a" style="text-align:right">API模板</td>
		    <td class="tr_a" style="text-align:left" colspan="3">
		    <select name="theform[apiid]">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrAPIs'],'selected' => $this->_tpl_vars['arrFetch']['apiid']), $this);?>

			</select>
		    <font style="color:red">如:百度API</font>
		    </td>
		    </tr>

		    <tr >
		    <td class="tr_a" style="text-align:right">是否采集</td>
		    <td class="tr_a" style="text-align:left" colspan="3">
		    <select name="theform[apifetch]">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['statusArr'],'selected' => $this->_tpl_vars['arrFetch']['apifetch']), $this);?>

			</select>
		    </td>
		    </tr>

			<tr>
		    <td class="tr_a" style="text-align:right">城市字符串匹配</td>
		    <td class="tr_a" width="10%" style="text-align:left">
		    <textarea id="citymatch" name="theform[citymatch]" style="height:600px;width:100px;"><?php echo $this->_tpl_vars['arrFetch']['citymatch']; ?>
</textarea>
		    </td>
		    <td class="tr_a" width="10%" style="text-align:left"><= <br>
		      <input type="button" class="button" value="全部" onclick="setalltocity()"></td>
		    <td class="tr_a" width="60%" style="text-align:left"><select id="citylist" size="35" multiple="multiple" onclick="settocity(this,this.value)" style="height:600px">
			  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['citylist']), $this);?>

			</select>
		    </td>
		    </tr>
		   <tr  >
		    <td colspan="4" align="center" class="tb_tr_bottom"><input type="submit" name="Submit" value="保 存" class="button" >    <input type="button" class="button" value="返回" onclick="window.location.href='tuanindex.php?c=tuanfetchs'"></td>
		   </tr>
		</table>
		</form>
<div class="clear"></div>
  </div>
<script language="javascript">
function setalltocity(){
	var obj = document.getElementById('citylist');
	for(var i = 0; i < obj.options.length; i++) {
		settocity(obj,i);
	}
}
function settocity(obj,i){
	document.getElementById('citymatch').value += obj[i].text + ",\r\n";
}
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
