<?php /* Smarty version 2.6.18, created on 2012-06-20 16:28:10
         compiled from admin/adminSiteCheck.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/adminSiteCheck.tpl', 38, false),array('modifier', 'date_format', 'admin/adminSiteCheck.tpl', 74, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
var count = 1;
function getSubLanmu(obj,rowid) {
	subid = obj.value;
	$('#hid_'+rowid).val(subid);
	$.getJSON("adminAjax.php?stpParentID=" + subid, function(json){
		var str = '<select id="count_'+(count++)+'" name="tbStpParent_'+rowid+'[]" onchange="getSubLanmu(this,'+rowid+')"><option value="">请选择</option>';
		for(var key in json){
			str += '<option value="'+json[key].stpID+'">'+json[key].stpName+'</option>';
		}
		str +='</select>';
		if (json.length != 0) {
			$('#'+obj.id).nextAll("select").hide();
			$('#'+obj.id).after(str);
		}
	});
}
</script>
<?php if ($this->_tpl_vars['checkSite'] == 'true'): ?>
<script language="javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
</script>


  <div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <form method="get" action="?">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>站点审核</h1>
      <div class="search">
        <select name="searchField" id="searchField">
          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSearchField'],'selected' => $_GET['searchField']), $this);?>

        </select>		<input name="keyWord" type="text" id="keyWord" size="12" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" />
		<input type="hidden" value="1" name="search" /><input type="submit" value=" 搜 索 " class="button"> <?php if ($_GET['search']): ?><input type="button" class="button" onclick="location.href='adminSiteCheck.php';" value="取消搜索" /><?php endif; ?></div></td>
        </tr>
        </form>
      </table>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
      <form action="" method="post" onSubmit="return confirm('确定要操作吗？')">
      <tr>
      <td colspan="8" align="right"><input type="submit" name="btnPass" value=" 通  过 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"></td>
        </tr>
      <tr>
        <td width="20%" class="tr1">申请站点名称</td>
        <td width="20%" class="tr1">申请站点URL</td>
        <td width="10%" class="tr1">所属分类</td>
        <td width="10%" class="tr1">Alexa排名 </td>
        <td width="10%" class="tr1">建站时间</td>
        <td width="10%" class="tr1">联系方式</td>
	<td width="10%" class="tr1">申请时间</td>
        <td width="10%" class="tr1"><div align="center">选择</div></td>
      </tr>
      <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['arrSite']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
$this->_sections['loop']['start'] = $this->_sections['loop']['step'] > 0 ? 0 : $this->_sections['loop']['loop']-1;
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = $this->_sections['loop']['loop'];
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
      <tr>
        <td class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteName']; ?>
</td>
        <td class="tr_a"><a href="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl']; ?>
</a></td>
        <td class="tr_a">
        <span>
        <select id="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" name="tbStpParent_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
[]" onchange="getSubLanmu(this,<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)">
        <option value="0">一级</option>
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrAddSiteType']), $this);?>

        </select>
        <input type="hidden" id="hid_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" name="stpID[<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
]">
        </span></td>
        <td class="tr_a"><a href="http://alexa.aosoo.com/<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['alexa']; ?>
</a></td>
        <td class="tr_a"><?php if ($this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['buildDate'] == '0'): ?>未知<?php else: ?><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['buildDate']; ?>
<?php endif; ?></td>
        <td class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['contact']; ?>
</td>
	<td class="tr_a"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['cDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
        <td align="center" class="tr_a">
          <label>
            <input style="width:auto;border:0" type="checkbox" name="chkDelID[<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
]" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" />
            </label>
        </td>
      </tr>
      <?php endfor; endif; ?>
      <tr>
      <td colspan="8" align="right"><?php echo $this->_tpl_vars['pager']; ?>
<input type="submit" name="btnPass" value=" 通  过 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"></td>
        </tr>
      </form>
</table>
  <div class="clear"></div>
  </div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>