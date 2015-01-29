<?php /* Smarty version 2.6.18, created on 2012-06-26 01:01:39
         compiled from admin/subtemplates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/subtemplates.tpl', 223, false),array('modifier', 'htmlspecialchars_decode', 'admin/subtemplates.tpl', 250, false),array('modifier', 'stripslashes', 'admin/subtemplates.tpl', 250, false),array('modifier', 'substr', 'admin/subtemplates.tpl', 251, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
function submitLineEdit(sid){
	$('#display_row_'+sid).hide();
	$('#edit_row_'+sid).show();
}
function hideLineEdit(sid){
	$('#display_row_'+sid).show();
	$('#edit_row_'+sid).hide();
}
var newrow_count=0;
function addNewSite(){
	// 注：用不同样式区分新增行与原有行
	newrow_count++;
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" name="listorder[]" id="new_listorder_'+newrow_count+'"/><input type="hidden" id="new_id_'+newrow_count+'" name="id[]" id="new_id_'+newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="" name="name[]"  id="new_name_'+newrow_count+'"/></td><td class="tr_a"><input type="text" size="50" value="" name="url[]"  id="new_url_'+newrow_count+'"/></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" /></a></td><?php endif; ?></tr>');
}
function showAllEditStatus(){
	$("#datatable").find("tr").each(function(){
	var trid=$(this).attr('id');

	if(trid.substr(0,9)=='edit_row_'){
		$(this).show();
	}else if(trid.substr(0,12)=='display_row_'){
		$(this).hide();
	}
	});
}
function doLineEdit(rid,nid){
	// rid == '' 插入
	var row;
	var upid;
	if(rid==''){
		row = 'new_';
		upid = nid;
	}else{
		row = '';
		upid = rid;
	}
	var id = $('#'+row+'id_'+upid).val();
	var listorder = $('#'+row+'listorder_'+upid).val();
	var name = $('#'+row+'name_'+upid).val();
	var url = $('#'+row+'url_'+upid).val();


	var sortCheck = validate('sort',listorder);
	var nameCheck = validate('name',name);
	var urlCheck = validate('url',url);
	if(!sortCheck[0]){
		alert(sortCheck[1]);
		return false;
	}
	if(!nameCheck[0]){
		alert(nameCheck[1]);
		return false;
	}
	if(!urlCheck[0]){
		alert(urlCheck[1]);
		return false;
	}
	$.getJSON("sub_templates.php?a=edit&id[]="+escape(id)+"&listorder[]="+escape(listorder)+"&name[]="+escape(name)+"&url[]="+escape(url), function(json){
		editResult(json[0],upid);
	})
}

function editResult(data,upid){
	if(data.flag == 'insert'){
			// insert 插入行，再删行
			var upedid = data.id;
			var name = data.name;
			var listorder = data.listorder;
			var url = data.url;


			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+listorder+'</td><input type="hidden" name="hidid[]" value="'+upedid+'"><td class="tr_a">'+name+'</td><td class="tr_a"><a href="'+url+'" target="_blank">'+url+'</a></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" /></a></td><?php endif; ?></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="listorder_'+upedid+'" value="'+listorder+'" name="listorder[]" /><input type="hidden" name="id[]" id="id_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="'+name+'" name="name[]"  id="name_'+upedid+'"/></td><td class="tr_a"><input type="text" size="50" value="'+url+'" name="url[]"  id="url_'+upedid+'"/></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" /></a></td><?php endif; ?></tr>');
			if(upid!=undefined)
				$('#new_row_'+upid).remove();
			else{
				// 批量删除new row
				$("#datatable").find("tr").each(function(){
				var trid=$(this).attr('id');

				if(trid.substr(0,8)=='new_row_'){
					$(this).remove();
				}
				});
			}
		}else if(data.flag == 'update'){
			// update
			var upedid = data.id;
			$('#listorder_'+upedid).val(data.listorder);
			$('#name_'+upedid).val(data.name);
			$('#url_'+upedid).val(data.url);

			tr = $('#display_row_'+upedid);
			var data = new Array(data.listorder,data.name,data.url);
			i=0;
			tr.find("td").each(function(){
				$(this).html(data[i++]);
			})
			$('#edit_row_'+upedid).hide();
			tr.show();

		}else if(data.flag == 'error'){
			// error
		}
}
function submitAllEdit(){
	var suburl = "";
	$("#datatable").find("tr").each(function(){
		var trid=$(this).attr('id');
		if(trid.substr(0,9)=='edit_row_' && $(this).css("display")!='none'){
			// 编辑
			var upid = trid.substr(9,trid.length);
			var id = $('#id_'+upid).val();
			var listorder = $('#listorder_'+upid).val();
			var name = $('#name_'+upid).val();
			var url = $('#url_'+upid).val();
			var sortCheck = validate('sort',listorder);
			var nameCheck = validate('name',name);
			var urlCheck = validate('url',url);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
			if(!urlCheck[0]){
				alert(urlCheck[1]);
				return false;
			}
			suburl += "&id[]="+escape(id)+"&listorder[]="+escape(listorder)+"&name[]="+escape(name)+"&url[]="+escape(url);
		}
		if(trid.substr(0,8)=='new_row_'){
			// 新增的
			var upid = trid.substr(8,trid.length);
			var id = $('#new_id_'+upid).val();
			var listorder = $('#new_listorder_'+upid).val();
			var name = $('#new_name_'+upid).val();
			var url = $('#new_url_'+upid).val();
			var sortCheck = validate('sort',listorder);
			var nameCheck = validate('name',name);
			var urlCheck = validate('url',url);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
			if(!urlCheck[0]){
				alert(urlCheck[1]);
				return false;
			}
			suburl += "&id[]="+escape(id)+"&listorder[]="+escape(listorder)+"&name[]="+escape(name)+"&url[]="+escape(url);
		}

	});
	if(suburl!=''){
		suburl = 'sub_templates.php?a=edit'+suburl;
		$.getJSON(suburl,function(json){
			for(key in json){
				editResult(json[key]);
			}
		})
	}else{
		alert(" 没有可提交的数据 ");
	}
}
function deleteLineSite(id,trid){
	if(id!=''){
		// 删除真数据
		id = $('#id_'+id).val();
		$.getJSON("sub_templates.php?a=delete&id[]="+escape(id), function(json){
			if(json.flag=='delete'){
				$('#display_row_'+id).remove();
				$('#edit_row_'+id).remove();
			}else{
				// error
			}
		})
	}else{
		$('#new_row_'+trid).remove();
	}
}
function validate(field,value){
	var arr = new Array();
	if(field == 'sort'){
		if(value < 1 || value != parseInt(value,10) || value == ''){
			arr[0] = false;
			arr[1] = '排序只能是大于0的数字';
		}else{
			arr[0] = true;
		}
	}else if(field == 'url'){
		if(value == ''){
			arr[0] = false;
			arr[1] = '地址不能空';
		}else{
			arr[0] = true;
		}
	}else if(field == 'name'){
		if(value == ''){
			arr[0] = false;
			arr[1] = '名称不能空';
		}else{
			arr[0] = true;
		}
	}
	return arr;
}
</script>
<div id="box">
  <div class="right">
  <form method="get" action="?">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>内页模板管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
         <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSearchField'],'selected' => $_GET['searchField']), $this);?>

        </select>
        <input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" />
				<input type="hidden" value="1" name="search" />
        <input type="image" src="images/bt_search.jpg"  value=" 搜 索 " style="width:61px;height:20px"/>        </div></td>
    </tr>
	</table>
	</form>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right">
        <input type="button" class="button" value="新增" onclick="addNewSite()"/>&nbsp;
        <input type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">&nbsp;
        <input type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">&nbsp;
         </td>
      </tr>
    </table>
    <table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">
      <tr id="title">
        <td width="9%" class="tr1" id="sort_listorder">排序</td>
        <td width="15%"  class="tr1">站点名称</td>
        <td width="34%"  class="tr1" id="sort_url">站点URL</td>
        <td width="8%"  class="tr1">操作</td>
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
      <tr id="display_row_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" ondblclick="submitLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)">
        <td class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['listorder']; ?>
<input type="hidden" name="hidid[]" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
"></td>
        <td class="tr_a"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['name'])) ? $this->_run_mod_handler('htmlspecialchars_decode', true, $_tmp) : htmlspecialchars_decode($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
        <td class="tr_a"><a href="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['url']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['url'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 60) : substr($_tmp, 0, 60)); ?>
</a></td>
        <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
        <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_del.gif" /></a></td>
        <?php endif; ?>
      </tr>
      <tr id="edit_row_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" style="display:none">
         <td class="tr_a"><input type="text" size="3" style="width:auto" id="listorder_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['listorder']; ?>
" name="listorder[]" />
            <input type="hidden" name="id[]" id="id_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" />
         </td>
         <td class="tr_a"><input type="text" size="15" style="width:auto" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['name']; ?>
" name="name[]"  id="name_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
"/></td>
         <td class="tr_a"><input type="text" size="50" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['url']; ?>
" name="url[]"  id="url_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
"/></td>
         <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
         <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_del.gif" /></a></td>
         <?php endif; ?>
       </tr>
       <?php endfor; endif; ?>
       <tr>
         <td height="30" colspan="5" align="right" valign="middle" class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>
<input type="button" class="button" value="新增" onclick="addNewSite()"/>&nbsp;
        <input type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">&nbsp;
        <input type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">&nbsp;</td>
       </tr>
     </table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>