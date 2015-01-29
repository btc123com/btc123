<?php /* Smarty version 2.6.18, created on 2012-06-27 22:34:43
         compiled from admin/adminsearchKeywords.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/adminsearchKeywords.tpl', 253, false),array('modifier', 'substr', 'admin/adminsearchKeywords.tpl', 272, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="../static/js/com.js"></script>
<script language="javascript" src="../static/js/color.js"></script>
<script language="javascript">
function changes(obj)
{
    if(obj.value == "") return;
    location.href = "adminSearchKeywords.php?classid=" + obj.value;
}
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
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="hidden" name="siteColor[]" id="new_siteColor_'+newrow_count+'" ><input type="text" size="3" style="width:auto" value="1" name="siteSort[]" id="new_siteSort_'+newrow_count+'"/><input type="hidden" id="new_siteID_'+newrow_count+'" name="siteID[]" id="new_siteID_'+newrow_count+'"><input type="hidden" id="new_siteCID_'+newrow_count+'" name="siteCID[]" id="new_siteCID_'+newrow_count+'" value="<?php echo $this->_tpl_vars['classid']; ?>
"></td><td class="tr_a"><input type="text" size="15" style="float:left;width:auto" value="" name="siteName[]"  id="new_siteName_'+newrow_count+'"/><label id="new_label_'+newrow_count+'" style="width:20px; height:20px; float:left; background:url(images/penboard.gif) no-repeat 0 2px; text-indent:-999px;cursor:pointer" title="选择颜色" onclick="showcolorbord('+newrow_count+',\'new_\');">色</label></td><td class="tr_a"><input type="text" size="50" value="http://" name="siteUrl[]"  id="new_siteUrl_'+newrow_count+'"/></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" title="删除" /></a></td><?php endif; ?></tr>');
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
	var siteUrl = $('#'+row+'siteUrl_'+upid).val();
	var siteCID = $('#'+row+'siteCID_'+upid).val();
	var siteColor = $('#'+row+'siteColor_'+upid).val();
siteUrl = urlf(siteUrl);

	var sortCheck = validate('sort',siteSort);
	var nameCheck = validate('name',siteName);
	var urlCheck = validate('url',siteUrl);
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
	$.getJSON("site_searchkw.php?a=edit&siteID[]="+escape(siteID)+"&siteCID[]="+escape(siteCID)+"&siteColor[]="+escape(siteColor)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl), function(json){
		editResult(json[0],upid);
htmlnotice(1);htmlnotice(4);
	})
}

function editResult(data,upid){
	if(data.flag == 'insert'){
			// insert 插入行，再删行
			var upedid = data.siteID;
			var siteName = data.siteName;
			var siteSort = data.siteSort;
			var siteUrl = data.siteUrl;
			var siteCID = data.siteCID;
			var siteColor = data.siteColor;
			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+siteSort+'</td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a"><font style="color:'+siteColor+'">'+siteName+'</font></td><td class="tr_a"><a href="'+siteUrl+'" target="_blank">'+siteUrl+'</a></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除" /></a></td><?php endif; ?></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_'+upedid+'" value="'+siteSort+'" name="siteSort[]" /><input type="hidden" name="siteID[]" id="siteID_'+upedid+'" value="'+upedid+'" /><input type="hidden" name="siteCID[]" id="siteCID_'+upedid+'" value="'+siteCID+'" /><input type="hidden" name="siteColor[]" id="siteColor_'+upedid+'" value="'+siteColor+'" /></td><td class="tr_a"><input type="text" size="15" style="float:left;width:auto;color:'+siteColor+'" value="'+siteName+'" name="siteName[]"  id="siteName_'+upedid+'"/><label id="label_'+upedid+'" style="width:20px; height:20px; float:left; background:url(images/penboard.gif) no-repeat 0 2px; text-indent:-999px;cursor:pointer" title="选择颜色" onclick="showcolorbord('+upedid+',\'\');">色</label></td><td class="tr_a"><input type="text" size="50" value="'+siteUrl+'" name="siteUrl[]"  id="siteUrl_'+upedid+'"/></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除" /></a></td><?php endif; ?></tr>');
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
			$('#siteUrl_'+upedid).val(data.siteUrl);
			$('#siteCID_'+upedid).val(data.siteCID);
			tr = $('#display_row_'+upedid);
			var rdata = new Array(data.siteSort,data.siteName,data.siteUrl);
			i=0;
			tr.find("td").each(function(){
			if(i==1)
				$(this).html('<font style="color:'+data.siteColor+'">'+rdata[i++]+'</font>');
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
			var siteUrl = $('#siteUrl_'+upid).val();
			var siteColor = $('#siteColor_'+upid).val();
			var siteCID = $('#siteCID_'+upid).val();
siteUrl = urlf(siteUrl);
			var sortCheck = validate('sort',siteSort);
			var nameCheck = validate('name',siteName);
			var urlCheck = validate('url',siteUrl);
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
			url += "&siteID[]="+escape(siteID)+"&siteCID[]="+escape(siteCID)+"&siteColor[]="+escape(siteColor)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl);
		}
		if(trid.substr(0,8)=='new_row_'){
			// 新增的
			var upid = trid.substr(8,trid.length);
			var siteID = $('#new_siteID_'+upid).val();
			var siteSort = $('#new_siteSort_'+upid).val();
			var siteName = $('#new_siteName_'+upid).val();
			var siteUrl = $('#new_siteUrl_'+upid).val();
			var siteCID = $('#new_siteCID_'+upid).val();
			var siteColor = $('#new_siteColor_'+upid).val();
siteUrl = urlf(siteUrl);
			var sortCheck = validate('sort',siteSort);
			var nameCheck = validate('name',siteName);
			var urlCheck = validate('url',siteUrl);
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
			url += "&siteID[]="+escape(siteID)+"&siteCID[]="+escape(siteCID)+"&siteColor[]="+escape(siteColor)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl);
		}

	});
	if(url!=''){
		url = 'site_searchkw.php?a=edit'+url;
		$.getJSON(url,function(json){
			for(key in json){
				editResult(json[key]);
			}
		})
htmlnotice(1);htmlnotice(4);
	}else{
		alert(" 没有可提交的数据 ");
	}
}
function deleteLineSite(id,trid){
	var checkdel=confirm('确定要删除该项！');
	if(checkdel==false)return false;
	if(id!=''){
		// 删除真数据
		siteID = $('#siteID_'+id).val();
		$.getJSON("site_searchkw.php?a=delete&siteID[]="+escape(siteID), function(json){
			if(json.flag=='delete'){
				$('#display_row_'+siteID).remove();
				$('#edit_row_'+siteID).remove();
htmlnotice(1);htmlnotice(4);
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
    <td height="52" bgcolor="#FFFFFF"><h1>搜索关键字管理</h1></td>
    </tr>
	</table>
	</form>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right">
      	<div style="float:left">选择分类:
		<select name="classid" onchange="changes(this)" style="width:70px;">
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['options'],'selected' => $this->_tpl_vars['classid']), $this);?>

        </select></div>
        <input style="float:right" type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">
        <input style="float:right" type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">
        <input style="float:right" type="button" class="button" value="新增" onclick="addNewSite()"/>
         </td>
      </tr>
    </table>
    <table id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">
      <tr id="title">
        <td width="10%" class="tr1" id="sort_siteSort">排序</td>
        <td width="15%"  class="tr1">名称</td>
        <td width="60%"  class="tr1" id="sort_siteUrl">网址</td>
        <td width="10%"  class="tr1">操作</td>
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
        <td class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['sort']; ?>
<input type="hidden" name="hidSiteID[]" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
"></td>
        <td class="tr_a"><font color="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['namecolor']; ?>
"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['name']; ?>
</font></td>
        <td class="tr_a"><a href="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['url']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['url'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 60) : substr($_tmp, 0, 60)); ?>
</a></td>
        <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
        <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_del.gif" title="删除" /></a></td>
        <?php endif; ?>
      </tr>
      <tr id="edit_row_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" style="display:none">
         <td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['sort']; ?>
" name="siteSort[]" />
            <input type="hidden" name="siteID[]" id="siteID_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" />
            <input type="hidden" name="siteCID[]" id="siteCID_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['class']; ?>
" />
            <input type="hidden" name="siteColor[]" id="siteColor_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['namecolor']; ?>
">
         </td>
         <td class="tr_a"><input type="text" size="15" style="width:auto;color:<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['namecolor']; ?>
; float:left" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['name']; ?>
" name="siteName[]"  id="siteName_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
"/><label id="label_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
" style="width:20px; height:20px; float:left; background:url(images/penboard.gif) no-repeat 0 2px; text-indent:-999px;cursor:pointer" title="选择颜色" onclick="showcolorbord(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
,'');">色</label></td>
         <td class="tr_a"><input type="text" size="50" style="width:auto;" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['url']; ?>
" name="siteUrl[]"  id="siteUrl_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
"/></td>
         <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
         <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['id']; ?>
)"><img src="images/ico_del.gif" title="删除" /></a></td>
         <?php endif; ?>
       </tr>
       <?php endfor; endif; ?>
       <tr>
         <td height="30" colspan="4" align="right" valign="middle" class="ly_Rtd"><?php echo $this->_tpl_vars['pager']; ?>
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
<div style="display:none;position: absolute; border: 1px solid gray; background-color: white; z-index: 2; top: 70px; left: 492px;" id="QrColorPicker0" onmouseout="javascript:QrColorPicker.restoreColor('QrColorPicker0');" onclick="javascript:QrXPCOM.onPopup();"><table border="0" width="192"><tbody><tr><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '')" style="width: 14px; height: 14px; border: 1px inset gray; cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#FF0000')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(255, 0, 0); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#ff6600')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(255, 102, 0); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#178517')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(23, 133, 23); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#0E6DBC')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(14, 109, 188); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#0000FF')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(0, 0, 255); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#000000')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(0, 0, 0); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#333333')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(51, 51, 51); cursor: pointer;" align="absmiddle" height="1" width="1"></td></tr></tbody></table>

<nobr><img src="images/colorpicker.jpg" naturalsizeflag="3" onmousemove="javascript:QrColorPicker.setColor(event,'QrColorPicker0');" onclick="javascript:QrColorPicker.selectColor(event,'QrColorPicker0');" style="cursor: crosshair;" align="BOTTOM" border="0" height="128" width="192"></nobr><br><nobr><img src="images/graybar.jpg" naturalsizeflag="3" onmousemove="javascript:QrColorPicker.setColor(event,'QrColorPicker0');" onclick="javascript:QrColorPicker.selectColor(event,'QrColorPicker0');" style="cursor: crosshair;" align="BOTTOM" border="0" height="8" width="192"></nobr><br>
<nobr><input size="8" id="QrColorPicker0#input" style="border: 1px solid gray; font-size: 12pt; margin: 1px;" onkeyup="QrColorPicker.keyColor('QrColorPicker0')" value="" onchange="QrColorPicker.InputValueChange(this);" type="text"><a href="javascript:QrColorPicker.SetDefaultColor('QrColorPicker0','');"><img src="images/grid.gif" style="height: 20px; width: 20px;" align="absmiddle" border="0">恢复默认</a></nobr></div>