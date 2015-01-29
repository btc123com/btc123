<?php /* Smarty version 2.6.18, created on 2012-06-26 01:03:45
         compiled from tuan/manager/tuangoods.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tuan/manager/tuangoods.tpl', 12, false),array('modifier', 'mb_substr', 'tuan/manager/tuangoods.tpl', 45, false),array('modifier', 'date_format', 'tuan/manager/tuangoods.tpl', 51, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="http://<?php echo @SITE_DOMAIN; ?>
/tuan/js/manager.js"></script>
<div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
        <tr>
      <td height="52" bgcolor="#FFFFFF"><h1>团购单品管理</h1>
      <div class="search"><form action="tuanindex.php?c=tuangoods" method="post">
			团购名称:<input type="text" name="theform[title]" value="<?php echo $_POST['theform']['title']; ?>
">
			来源网站：
			<select name="theform[siteid]">
			<option value="" <?php if ($_POST['theform']['siteid'] == ""): ?>selected<?php endif; ?>>--请选择--</option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSites'],'selected' => $_POST['theform']['siteid']), $this);?>

			</select>
			产品分类：
			<select name="theform[typeid]">
			<option value="" <?php if ($_POST['theform']['typeid'] == ""): ?>selected<?php endif; ?>>--请选择--</option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrTypes'],'selected' => $_POST['theform']['typeid']), $this);?>

			</select>
            <input type="submit" name="Submit3" value="查 询" class="button" style="width:auto;"><input type="button" onclick="if(confirm('确定要采集所有团购数据？')){window.location.href='http://<?php echo @SITE_DOMAIN; ?>
/tuan/crontab/tuanfetch.php'}" value="开始采集" class="button">
            <input type="button" onclick="window.location.href='tuanindex.php?c=tuangoods&a=edit'" value="添加团购单品" class="button" style="width:auto;">
			<input class="button" type="button" value="产品分类" onclick="doAction('typeid','good','typeid','doform')" style="width:auto;">&nbsp;<input class="button" type="button" value="修改发布" onclick="doAction('status','good','status','doform')" style="width:auto;">&nbsp;<input class="button" type="button" value="修改排序" onclick="doAction('sortorder','good','order','doform')" style="width:auto;">
            <input type="button" onclick="window.location.href='tuanindex.php?c=tuangoods&a=deldead'" value="删除过期单品" class="button" style="width:auto;"></form></div>
		</td>
        </tr>
  </table>
<table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">
      <tr id="title" >
    <td class="tr1" width="5%">选择<input type="checkbox" onclick="chooseAll(this,'good')" style="width:auto"></td>
    <td class="tr1" width="10%">图片</td>
    <td class="tr1" width="25%">团购名称</td>
    <td class="tr1" width="5%">产品分类</td>
    <td class="tr1" width="5%"><span style="width:50px;white-space:nowrap">来源网站</span></td>
    <td class="tr1" width="4%"><span style="width:50px;white-space:nowrap">团购城市</span></td>
    <td class="tr1" width="4%"><span style="width:50px;white-space:nowrap">是否发布</span></td>
    <td class="tr1" width="4%">排序</td>
    <td class="tr1" width="6%">开始时间</td>
    <td class="tr1" width="6%">结束时间</td>
    <td class="tr1" width="6%">采集时间</td>
    <td class="tr1" width="4%"><span style="width:50px;white-space:nowrap">管理</span></td>
    </tr>
<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['voLists']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr ondblclick="location.href='?c=tuangoods&a=edit&gid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['gid']; ?>
';">
 	<td class="tr_a"><input type="checkbox" style="width:auto;" id="choose_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['gid']; ?>
" name="good" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['gid']; ?>
"></td>
 	<td class="tr_a"><img src="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['imageurl']; ?>
" width="100px" height="60px"></td>
    <td class="tr_a"><a href="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['goodurl']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['title'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 0, 100, 'utf8') : mb_substr($_tmp, 0, 100, 'utf8')); ?>
</a></td>
    <td class="tr_a"><select name="typeid"><option value="">--请选择--</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrTypes'],'selected' => $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['typeid']), $this);?>
</select></td>
    <td class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sitename']; ?>
</td>
    <td class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['cityname']; ?>
</td>
    <td class="tr_a"><select name="status"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['statusArr'],'selected' => $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['status']), $this);?>
</select></td>
    <td class="tr_a"><input type="text" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sortorder']; ?>
" name="order" size="4" style="width:auto"></td>
    <td class="tr_a"><?php echo ((is_array($_tmp=$this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['starttime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
    <td class="tr_a"><?php echo ((is_array($_tmp=$this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['endtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
    <td class="tr_a"><?php echo ((is_array($_tmp=$this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['gettime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
    <td class="tr_a"><a href="?c=tuangoods&a=edit&gid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['gid']; ?>
">编辑</a> | <a href="?c=tuangoods&a=delete&gid=<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['gid']; ?>
">删除</a></td>
  </tr>
<?php endfor; endif; ?>
<tr>
<td height="30" colspan="12" align="right" valign="middle" class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>

            <input type="button" onclick="window.location.href='tuanindex.php?c=tuangoods&a=edit'" value="添加团购单品" class="button" style="width:auto;"><input class="button" type="button" value="产品分类" onclick="doAction('typeid','good','typeid','doform')" style="width:auto;">&nbsp;<input class="button" type="button" value="修改发布" onclick="doAction('status','good','status','doform')" style="width:auto;">&nbsp;<input class="button" type="button" value="修改排序" onclick="doAction('sortorder','good','order','doform')" style="width:auto;">
            <input type="button" onclick="window.location.href='tuanindex.php?c=tuangoods&a=deldead'" value="删除过期单品" class="button" style="width:auto;">
</td></tr>
</table>
<form name="doform" action="?c=tuangoods&a=do" method="post">
<input type="hidden" name="optype">
<input type="hidden" name="ids">
<input type="hidden" name="orders">
</form>
<div class="clear"></div>
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>