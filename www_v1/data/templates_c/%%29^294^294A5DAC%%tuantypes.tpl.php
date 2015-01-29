<?php /* Smarty version 2.6.18, created on 2012-06-26 01:03:44
         compiled from tuan/manager/tuantypes.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript">
function submitLineEdit(sid){
	//document.getElementById('display_row_'+sid).style.display='none';
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
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" name="siteSort[]" id="new_siteSort_'+newrow_count+'"/><input type="hidden" id="new_siteID_'+newrow_count+'" name="siteID[]" id="new_siteID_'+newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="" name="siteName[]" id="new_siteName_'+newrow_count+'"/></td><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" /></a></td></tr>');
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
	var siteID = $('#'+row+'siteID_'+upid).val();
	var siteSort = $('#'+row+'siteSort_'+upid).val();
	var siteName = $('#'+row+'siteName_'+upid).val();

	var sortCheck = validate('sort',siteSort);
	var nameCheck = validate('name',siteName);
	if(!sortCheck[0]){
		alert(sortCheck[1]);
		return false;
	}
	if(!nameCheck[0]){
		alert(nameCheck[1]);
		return false;
	}
	$.getJSON("tuanindex.php?c=tuantypes&a=edit&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName), function(json){
		editResult(json[0],upid);
	})
}
function editResult(data,upid){
	if(data.flag == 'insert'){
			// insert 插入行，再删行
			var upedid = data.siteID;
			var siteName = data.siteName;
			var siteSort = data.siteSort;
			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+siteSort+'</td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a">'+siteName+'</td><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" /></a></td></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_'+upedid+'" value="'+siteSort+'" name="siteSort[]" /><input type="hidden" name="siteID[]" id="siteID_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto;" value="'+siteName+'" name="siteName[]"  id="siteName_'+upedid+'"/></td><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" /></a></td></tr>');
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
			var upedid = data.siteID;
			$('#siteSort_'+upedid).val(data.siteSort);
			$('#siteName_'+upedid).val(data.siteName);
			tr = $('#display_row_'+upedid);
			var rdata = new Array(data.siteSort,data.siteName);
			i=0;
			tr.find("td").each(function(){
			if(i==1)
				$(this).html(rdata[i++]);
			else
				$(this).html(rdata[i++]);
			})
			$('#edit_row_'+upedid).hide();
			tr.show();

		}else if(data.flag == 'error'){
			// error
		}
}
function submitAllEdit(){
	var url = "";
	$("#datatable").find("tr").each(function(){
		var trid=$(this).attr('id');
		if(trid.substr(0,9)=='edit_row_' && $(this).css("display")!='none'){
			// 编辑
			var upid = trid.substr(9,trid.length);
			var siteID = $('#siteID_'+upid).val();
			var siteSort = $('#siteSort_'+upid).val();
			var siteName = $('#siteName_'+upid).val();
			var sortCheck = validate('sort',siteSort);
			var nameCheck = validate('name',siteName);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
			url += "&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName);
		}
		if(trid.substr(0,8)=='new_row_'){
			// 新增的
			var upid = trid.substr(8,trid.length);
			var siteID = $('#new_siteID_'+upid).val();
			var siteSort = $('#new_siteSort_'+upid).val();
			var siteName = $('#new_siteName_'+upid).val();
			var sortCheck = validate('sort',siteSort);
			var nameCheck = validate('name',siteName);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
			url += "&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName);
		}

	});
	if(url!=''){
		url = 'tuanindex.php?c=tuantypes&a=edit'+url;
		$.getJSON(url,function(json){
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
		siteID = $('#siteID_'+id).val();
		$.getJSON("tuanindex.php?c=tuantypes&a=delete&siteID[]="+escape(siteID), function(json){
			if(json.flag=='delete'){
				$('#display_row_'+siteID).remove();
				$('#edit_row_'+siteID).remove();
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
  <form action="tuanindex.php?c=tuantypes" method="post">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>团购产品类型管理</h1>
      <div class="search">
			产品类型:<input type="text" name="theform[typename]">
        <input type="image" src="images/bt_search.jpg"  name="Submit3" value=" 搜 索 " style="width:61px;height:20px"/></div></td>
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
        <td width="9%" class="tr1" id="sort_siteSort">排序</td>
        <td width="15%"  class="tr1">团购产品类型</td>
        <td width="8%"  class="tr1">管理</td>
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
      <tr id="display_row_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
" ondblclick="submitLineEdit(<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
)">
        <td class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sortorder']; ?>
<input type="hidden" name="hidSiteID[]" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
"></td>
        <td class="tr_a"><?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['typename']; ?>
</td>
        <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
)"><img src="images/ico_edit.gif" title="编辑" /></a>
        <a onclick="deleteLineSite(<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
)"><img src="images/ico_del.gif" /></a></td>
      </tr>
      <tr id="edit_row_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
" style="display:none">
         <td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['sortorder']; ?>
" name="siteSort[]" />
            <input type="hidden" name="siteID[]" id="siteID_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
" />
         </td>
         <td class="tr_a"><input type="text" size="15" style="width:auto;" value="<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['typename']; ?>
" name="siteName[]"  id="siteName_<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
"/></td>
         <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
)"><img src="images/ico_ok.gif" /></a>
         <a href="javascript:;" onclick="hideLineEdit(<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
)"><img src="images/ico_cancel.gif" /></a>
         <a onclick="deleteLineSite(<?php echo $this->_tpl_vars['voLists'][$this->_sections['loop']['index']]['tid']; ?>
)"><img src="images/ico_del.gif" /></a></td>
       </tr>
       <?php endfor; endif; ?>
       <tr>
         <td height="30" colspan="3" align="right" valign="middle" class="ly_Rtd" style="cursor:pointer"><?php echo $this->_tpl_vars['pager']; ?>
<input type="button" class="button" value="新增" onclick="addNewSite()"/>&nbsp;<input type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">&nbsp;<input type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">&nbsp;</td>
       </tr>
     </table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>