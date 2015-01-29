<?php /* Smarty version 2.6.18, created on 2012-06-20 15:47:49
         compiled from admin/adminsite_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin/adminsite_left.tpl', 460, false),array('modifier', 'substr', 'admin/adminsite_left.tpl', 500, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" src="../static/js/com.js"></script>
<script language="javascript" src="../static/js/color.js"></script>
<script language="javascript">

function submitLineEdit(sid){
	$('#display_row_'+sid).hide();
	$('#edit_row_'+sid).show();
}

function hideLineEdit(sid){
	$('#display_row_'+sid).show();
	$('#edit_row_'+sid).hide();
}

function submitTypeLineEdit(sid){
	$('#type_display_row_'+sid).hide();
	$('#type_edit_row_'+sid).show();
}

function hideTypeLineEdit(sid){
	$('#type_display_row_'+sid).show();
	$('#type_edit_row_'+sid).hide();
}

var newrow_count=0;
var type_newrow_count=0;

function addNewSite(){
	newrow_count++;
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="hidden" name="siteColor[]" id="new_siteColor_'+newrow_count+'" ><input type="text" size="3" style="width:auto" value="1" name="siteSort[]" id="new_siteSort_'+newrow_count+'"/><input type="hidden" id="new_siteID_'+newrow_count+'" name="siteID[]" id="new_siteID_'+newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto; float: left;" value="" name="siteName[]"  id="new_siteName_'+newrow_count+'"/><label id="new_label_'+newrow_count+'" style="width:20px; height:20px; float:left; background:url(images/penboard.gif) no-repeat 0 2px; text-indent:-999px;cursor:pointer" onclick="showcolorbord('+newrow_count+',\'new_\');">色</label></td><td class="tr_a"><input type="text" size="50" value="http://" name="siteUrl[]"  id="new_siteUrl_'+newrow_count+'"/></td><td class="tr_a"><select name="siteStatus[]" id="new_siteStatus_'+newrow_count+'"><option value="1">显示</option><option value="0">不显示</option></select></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" title="删除"></a></td><?php endif; ?></tr>');
}

function addTypeNewSite(){
	type_newrow_count++;
	$("#type_title").after('<tr id="type_new_row_'+type_newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" id="type_new_stpSort_'+type_newrow_count+'"/><input type="hidden" id="type_new_stpTypeID_'+type_newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto" id="type_new_stpName_'+type_newrow_count+'"/></td><td class="tr_a"><input type="text" size="50" id="type_new_stpHtmlName_'+type_newrow_count+'"/></td><td class="tr_a"><select name="stpStatus[]" id="type_new_stpStatus_'+type_newrow_count+'"><option value="1">显示</option><option value="0">不显示</option></select></td><td class="tr_a"><a href="javascript:;" onclick="doTypeLineEdit(\'\','+type_newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteTypeLineSite(\'\','+type_newrow_count+')"><img src="images/ico_del.gif" title="删除"></a></td></tr>');
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

function showTypeAllEditStatus(){
	$("#typedatatable").find("tr").each(function(){
	var trid=$(this).attr('id');

	if(trid.substr(0,14)=='type_edit_row_'){
		$(this).show();
	}else if(trid.substr(0,17)=='type_display_row_'){
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
	var siteStatus = $('#'+row+'siteStatus_'+upid).val();
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
	$.getJSON("site_left.php?a=edit&siteID[]="+escape(siteID)+"&siteColor[]="+escape(siteColor)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl)+"&siteStatus[]="+escape(siteStatus)+"&stpID[]=<?php echo $this->_tpl_vars['typeid']; ?>
", function(json){
		editResult(json[0],upid);
htmlnotice(1);
	})
}

function doTypeLineEdit(rid,nid){
	// rid == '' 插入
	var row;
	var upid;
	if(rid==''){
		row = 'type_new_';
		upid = nid;
	}else{
		row = '';
		upid = rid;
	}
	var stpID = $('#'+row+'stpTypeID_'+upid).val();
	var stpSort = $('#'+row+'stpSort_'+upid).val();
	var stpName = $('#'+row+'stpName_'+upid).val();
	var stpHtmlName = $('#'+row+'stpHtmlName_'+upid).val();
	var stpStatus = $('#'+row+'stpStatus_'+upid).val();

	var sortCheck = validate('sort',stpSort);
			var nameCheck = validate('name',stpName);
			var urlCheck = validate('url',stpHtmlName);
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

	$.getJSON("site_left.php?a=edittype&stpID[]="+escape(stpID)+"&stpSort[]="+escape(stpSort)+"&stpName[]="+escape(stpName)+"&stpHtmlName[]="+escape(stpHtmlName)+"&stpStatus[]="+escape(stpStatus)+"&stpParentID=<?php echo $this->_tpl_vars['typeid']; ?>
", function(json){
		editTypeResult(json[0],upid);
htmlnotice(1);
		treeReset();
	})
}

function editResult(data,upid){
	if(data.flag == 'insert'){
			// insert 插入行，再删行
			var upedid = data.siteID;
			var siteName = data.siteName;
			var siteSort = data.siteSort;
			var siteUrl = data.siteUrl;
			var siteStatus = data.siteStatus;
			var siteColor = data.siteColor;
			siteStatus = siteStatus==1?'显示':'<font color="#FF0000">不显示</font>';
			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+siteSort+'</td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a"><font style="color:'+siteColor+'">'+siteName+'</font></td><td class="tr_a"><a href="'+siteUrl+'" target="_blank">'+siteUrl+'</a></td><td class="tr_a">'+siteStatus+'</td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a></td><?php endif; ?></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_'+upedid+'" value="'+siteSort+'" name="siteSort[]" /><input type="hidden" name="siteColor[]" id="siteColor_'+upedid+'" value="'+siteColor+'" /><input type="hidden" name="siteID[]" id="siteID_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto;color:'+siteColor+'; float: left;" value="'+siteName+'" name="siteName[]"  id="siteName_'+upedid+'"/><label id="label_'+upedid+'" style="width:20px; height:20px; float:left; background:url(images/penboard.gif) no-repeat 0 2px; text-indent:-999px;cursor:pointer" onclick="showcolorbord('+upedid+',\'\');">色</label></td><td class="tr_a"><input type="text" size="50" value="'+siteUrl+'" name="siteUrl[]"  id="siteUrl_'+upedid+'"/></td><td class="tr_a"><select name="siteStatus[]" id="siteStatus_'+upedid+'"><option value="1" '+(siteStatus=="显示"?"selected":"")+'>显示</option><option value="0" '+(siteStatus!="显示"?"selected":"")+'>不显示</option></select></td><?php if ($this->_tpl_vars['updateSite'] == 'true'): ?><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a  href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a></td><?php endif; ?></tr>');
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
			$('#siteStatus_'+upedid).val(data.siteStatus);
			tr = $('#display_row_'+upedid);
			var rdata = new Array(data.siteSort,data.siteName,data.siteUrl,(data.siteStatus==1)?'显示':'<font color="#FF0000">不显示</font>','<a href="javascript:;" onclick="submitLineEdit('+data.siteID+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite('+data.siteID+')"><img src="images/ico_del.gif" title="删除"></a>');
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
			// alert('error');
		}
}

function editTypeResult(data,upid){
	if(data.flag == 'insert'){
			// insert 插入行，再删行
			var upedid = data.stpID;
			var stpName = data.stpName;
			var stpSort = data.stpSort;
			var stpHtmlName = data.stpHtmlName;
			var stpStatus = data.stpStatus;
			stpStatus = stpStatus==1?'显示':'<font color="#FF0000">不显示</font>';
			$("#type_title").after('<tr id="type_display_row_'+upedid+'" ondblclick="submitTypeLineEdit('+upedid+')"><td class="tr_a">'+stpSort+'</td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a">'+stpName+'</td><td class="tr_a">'+stpHtmlName+'</td><td class="tr_a">'+stpStatus+'</td><td class="tr_a"><a href="javascript:;" onclick="submitTypeLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteTypeLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_left.php?typeid='+upedid+'"><img src="images/ico_set.gif" title="下一级"></a></td></tr><tr id="type_edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="stpSort_'+upedid+'" value="'+stpSort+'" name="stpSort[]" /><input type="hidden" id="stpTypeID_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="'+stpName+'" id="stpName_'+upedid+'"/></td><td class="tr_a"><input type="text" size="50" value="'+stpHtmlName+'" id="stpHtmlName_'+upedid+'"/></td><td class="tr_a"><select name="stpStatus[]" id="stpStatus_'+upedid+'"><option value="1" '+(stpStatus=="显示"?"selected":"")+'>显示</option><option value="0" '+(stpStatus!="显示"?"selected":"")+'>不显示</option></select></td><td class="tr_a"><a  href="javascript:;" onclick="doTypeLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a  href="javascript:;" onclick="hideTypeLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteTypeLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a></td></tr>');

			if(upid!=undefined)
				$('#type_new_row_'+upid).remove();
			else{
				// 批量删除new row
				$("#typedatatable").find("tr").each(function(){
				var trid=$(this).attr('id');

				if(trid.substr(0,13)=='type_new_row_'){
					$(this).remove();
				}
				});
			}
		}else if(data.flag == 'update'){
			// update
			var upedid = data.stpID;
			$('#type_stpSort_'+upedid).val(data.stpSort);
			$('#type_stpName_'+upedid).val(data.stpName);
			$('#type_stpHtmlName_'+upedid).val(data.stpHtmlName);
			$('#type_stpStatus_'+upedid).val(data.stpStatus);
			tr = $('#type_display_row_'+upedid);
			var data = new Array(data.stpSort,data.stpName,data.stpHtmlName,(data.stpStatus==1)?'显示':'<font color="#FF0000">不显示</font>','<a href="javascript:;" onclick="submitTypeLineEdit('+data.stpID+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteTypeLineSite('+data.stpID+')"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_left.php?typeid='+data.stpID+'"><img src="images/ico_set.gif" title="下一级"></a>');
			i=0;
			tr.find("td").each(function(){
				$(this).html(data[i++]);
			})
			$('#type_edit_row_'+upedid).hide();
			tr.show();

		}else if(data.flag == 'error'){
			// error
			// alert('error');
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
			var siteStatus = $('#siteStatus_'+upid).val();
			var siteColor = $('#siteColor_'+upid).val();
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

			url += "&siteID[]="+escape(siteID)+"&siteColor[]="+escape(siteColor)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl)+"&siteStatus[]="+escape(siteStatus);
		}
		if(trid.substr(0,8)=='new_row_'){
			// 新增的
			var upid = trid.substr(8,trid.length);
			var siteID = $('#new_siteID_'+upid).val();
			var siteSort = $('#new_siteSort_'+upid).val();
			var siteName = $('#new_siteName_'+upid).val();
			var siteUrl = $('#new_siteUrl_'+upid).val();
			var siteStatus = $('#new_siteStatus_'+upid).val();
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
			url += "&siteID[]="+escape(siteID)+"&siteColor[]="+escape(siteColor)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl)+"&siteStatus[]="+escape(siteStatus)+"&stpID[]=<?php echo $this->_tpl_vars['typeid']; ?>
";
		}

	});
	if(url!=''){
		url = 'site_left.php?a=edit'+url;
		$.getJSON(url,function(json){
			for(key in json){
				editResult(json[key]);
			}
		})
htmlnotice(1);
	}else{
		alert(" 没有可提交的数据 ");
	}
}

function submitTypeAllEdit(){
	var url = "";
	$("#typedatatable").find("tr").each(function(){
		var trid=$(this).attr('id');
		if(trid.substr(0,14)=='type_edit_row_' && $(this).css("display")!='none'){
			// 编辑
			var upid = trid.substr(14,trid.length);
			var stpID = $('#stpTypeID_'+upid).val();
			var stpSort = $('#stpSort_'+upid).val();
			var stpName = $('#stpName_'+upid).val();
			var stpStatus = $('#stpStatus_'+upid).val();
			var stpHtmlName = $('#stpHtmlName_'+upid).val();

			var sortCheck = validate('sort',stpSort);
			var nameCheck = validate('name',stpName);
			var urlCheck = validate('url',stpHtmlName);
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
			url += "&stpID[]="+escape(stpID)+"&stpSort[]="+escape(stpSort)+"&stpName[]="+escape(stpName)+"&stpHtmlName[]="+escape(stpHtmlName)+"&stpStatus[]="+escape(stpStatus);
		}
		if(trid.substr(0,13)=='type_new_row_'){
			// 新增的
			var upid = trid.substr(13,trid.length);
			var stpID = $('#type_new_stpTypeID_'+upid).val();
			var stpSort = $('#type_new_stpSort_'+upid).val();
			var stpName = $('#type_new_stpName_'+upid).val();
			var stpHtmlName = $('#type_new_stpHtmlName_'+upid).val();
			var stpStatus = $('#type_new_stpStatus_'+upid).val();
			var sortCheck = validate('sort',stpSort);
			var nameCheck = validate('name',stpName);
			var urlCheck = validate('url',stpHtmlName);
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
			url += "&stpID[]="+escape(stpID)+"&stpSort[]="+escape(stpSort)+"&stpName[]="+escape(stpName)+"&stpHtmlName[]="+escape(stpHtmlName)+"&stpStatus[]="+escape(stpStatus)+"&stpParentID=<?php echo $this->_tpl_vars['typeid']; ?>
";

		}
	});
	if(url!=''){
		url = 'site_left.php?a=edittype'+url;
		$.getJSON(url,function(json){
			for(key in json){
				editTypeResult(json[key]);
			}
		})
htmlnotice(1);
	}else{
		alert(" 没有可提交的数据 ");
	}
	treeReset();
}

function deleteLineSite(id,trid){
	if(id!=''){
		// 删除真数据
		siteID = $('#siteID_'+id).val();
		$.getJSON("site_left.php?a=delete&siteID[]="+escape(siteID), function(json){
			if(json.flag=='delete'){
				$('#display_row_'+siteID).remove();
				$('#edit_row_'+siteID).remove();
htmlnotice(1);
			}else{
				// error
			}
		})
	}else{
		$('#new_row_'+trid).remove();
	}
}

function deleteTypeLineSite(id,trid){
	if(id!=''){
		// 删除真数据
		$.getJSON("site_left.php?a=deletetype&stpID[]="+escape(id), function(json){
			if(json.flag=='delete'){
				$('#type_display_row_'+id).remove();
				$('#type_edit_row_'+id).remove();
htmlnotice(1);
			}else{
				// error
			}
		})
	}else{
		$('#type_new_row_'+trid).remove();
	}
	treeReset();
}

function treeReset(){
	parent.frames.innerleftFrame.location.reload();
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
<?php if ($this->_tpl_vars['typeid']): ?>
<form method="get" action="?">
	<input type="hidden" name="typeid" value="<?php echo $this->_tpl_vars['typeid']; ?>
">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>页脚导航管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrSearchField'],'selected' => $_GET['searchField']), $this);?>

        </select>
        <input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?php echo $_GET['keyWord']; ?>
" />
        <select name="sStatus">
          <option value="">状态</option>
          <option value="1" <?php if ($_GET['sStatus'] == '1'): ?>selected="selected"<?php endif; ?>>显示</option>
          <option value="0" <?php if ($_GET['sStatus'] == '0'): ?>selected="selected"<?php endif; ?>>不显示</option>
        </select>
				<input type="hidden" value="1" name="search" />
        <input type="image" src="images/bt_search.jpg"  value=" 搜 索 " style="width:auto"/>        </div></td>
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
            <td width="15%"  class="tr1">站点名称</td>
            <td width="34%"  class="tr1" id="sort_siteUrl">站点URL</td>

            <td width="10%"  class="tr1" id="sort_siteSort">状态</td>
            <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
            <td width="8%"  class="tr1">操作</td>
            <?php endif; ?>
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
          <tr id="display_row_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" ondblclick="submitLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)">
            <td class="tr_a"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteSort']; ?>
<input type="hidden" name="hidSiteID[]" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
"></td>

            <td class="tr_a"><font style="color:<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteColor']; ?>
"><?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteName']; ?>
</font></td>
            <td class="tr_a"><a href="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 60) : substr($_tmp, 0, 60)); ?>
</a></td>

            <td class="tr_a"><?php if ($this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteStatus'] == 1): ?>
              显示
              <?php else: ?>
              <font color="#FF0000">不显示</font>
              <?php endif; ?></td>
            <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
            <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)"><img src="images/ico_del.gif" title="删除"></a></td>
            <?php endif; ?>
          </tr>
          <tr id="edit_row_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" style="display:none">
            <td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteSort']; ?>
" name="siteSort[]" />
            <input type="hidden" name="siteID[]" id="siteID_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" />
            <input type="hidden" name="siteColor[]" id="siteColor_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteColor']; ?>
">
            </td>
            <td class="tr_a"><input type="text" size="15" style="width:auto;color:<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteColor']; ?>
; float: left;" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteName']; ?>
" name="siteName[]"  id="siteName_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
"/><label id="label_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
" style="width:20px; height:20px; float:left; background:url(images/penboard.gif) no-repeat 0 2px; text-indent:-999px;cursor:pointer" onclick="showcolorbord(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
,'');">色</label></td>
            <td class="tr_a"><input type="text" size="50" value="<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteUrl']; ?>
" name="siteUrl[]"  id="siteUrl_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
"/></td>
            <td class="tr_a">
            <select name="siteStatus[]" id="siteStatus_<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
">
            	<option value="1" <?php if ($this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteStatus'] == 1): ?>selected<?php endif; ?>>显示</option>
            	<option value="0">不显示</option>
						</select>
            </td>
            <?php if ($this->_tpl_vars['updateSite'] == 'true'): ?>
            <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)"><img src="images/ico_ok.gif" /></a><a  href="javascript:;" onclick="hideLineEdit(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite(<?php echo $this->_tpl_vars['arrSite'][$this->_sections['loop']['index']]['siteID']; ?>
)"><img src="images/ico_del.gif" title="删除"></a></td>
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
<?php endif; ?>
<?php if (! $this->_tpl_vars['typeid']): ?>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>页脚分类管理</h1>
      <div class="search"></div></td>
    </tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right">
        <input class="button" type="button" value="新增" onclick="addTypeNewSite()">&nbsp;
        <input class="button" type="button" value="全编辑" onclick="showTypeAllEditStatus()">&nbsp;
        <input class="button" type="button" value="全提交" onclick="submitTypeAllEdit()">&nbsp;
         </td>
      </tr>
    </table>
		<table id="typedatatable" width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" title="双击编辑">

          <tr id="type_title">
            <td width="10%" class="tr1" id="sort_stpSort">排序</td>
            <td width="25%"  class="tr1">分类名称</td>
            <td width="45%"  class="tr1" id="sort_stpHtmlName">链接地址</td>
            <td width="10%"  class="tr1" id="sort_siteSort">状态</td>
            <td width="10%"  class="tr1">操作</td>
          </tr>
          <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['allType']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
          <tr id="type_display_row_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
" ondblclick="submitTypeLineEdit(<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
)">
            <td class="tr_a"><?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpSort']; ?>
&nbsp;</td>
            <td class="tr_a"><?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpName']; ?>
&nbsp;</td>
            <td class="tr_a"><?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpHtmlName']; ?>
&nbsp;</td>
            <td class="tr_a"><?php if ($this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpStatus'] == 1): ?>
              显示
              <?php else: ?>
              <font color="#FF0000">不显示</font>
              <?php endif; ?></td>
            <td class="tr_a"><a href="javascript:;" onclick="submitTypeLineEdit(<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
)"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteTypeLineSite(<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
)"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_left.php?typeid=<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
"><img src="images/ico_set.gif" title="下一级"></a></td>

          </tr>
          <tr id="type_edit_row_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
" style="display:none">
            <td class="tr_a"><input type="text" size="3" style="width:auto" id="stpSort_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
" value="<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpSort']; ?>
" name="stpSort[]" />
            <input type="hidden" name="stpTypeID[]" id="stpTypeID_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
" value="<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
" />
            </td>
            <td class="tr_a"><input type="text" size="15" style="width:auto" value="<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpName']; ?>
" name="stpName[]"  id="stpName_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
"/></td>
            <td class="tr_a"><input type="text" size="50" value="<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpHtmlName']; ?>
" name="stpHtmlName[]"  id="stpHtmlName_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
"/></td>
            <td class="tr_a">
            <select name="stpStatus[]" id="stpStatus_<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
">
            	<option value="1" <?php if ($this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpStatus'] == 1): ?>selected<?php endif; ?>>显示</option>
            	<option value="0">不显示</option>
			</select>
            </td>
            <td class="tr_a"><a  href="javascript:;" onclick="doTypeLineEdit(<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
)"><img src="images/ico_ok.gif" /></a><a  href="javascript:;" onclick="hideTypeLineEdit(<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
)"><img src="images/ico_cancel.gif" /></a><a onclick="deleteTypeLineSite(<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
)"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_left.php?typeid=<?php echo $this->_tpl_vars['allType'][$this->_sections['loop']['index']]['stpID']; ?>
"><img src="images/ico_set.gif" title="下一级"></a></td>
          </tr>
          <?php endfor; endif; ?>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" style="border-bottom:none">
      <tr>
        <td height="35" align="right">
        <input class="button" type="button" value="新增" onclick="addTypeNewSite()">&nbsp;
        <input class="button" type="button" value="全编辑" onclick="showTypeAllEditStatus()">&nbsp;
        <input class="button" type="button" value="全提交" onclick="submitTypeAllEdit()">&nbsp;
         </td>
      </tr>
    </table>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="display:none;position: absolute; border: 1px solid gray; background-color: white; z-index: 2; top: 70px; left: 492px;" id="QrColorPicker0" onmouseout="javascript:QrColorPicker.restoreColor('QrColorPicker0');" onclick="javascript:QrXPCOM.onPopup();"><table border="0" width="192"><tbody><tr><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '')" style="width: 14px; height: 14px; border: 1px inset gray; cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#FF0000')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(255, 0, 0); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#ff6600')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(255, 102, 0); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#178517')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(23, 133, 23); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#0E6DBC')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(14, 109, 188); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#0000FF')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(0, 0, 255); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#000000')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(0, 0, 0); cursor: pointer;" align="absmiddle" height="1" width="1"></td><td><img src="images/transparentpixel.gif" onclick="javascript:QrColorPicker.setCustomColor('QrColorPicker0', '#333333')" style="width: 14px; height: 14px; border: 1px inset gray; background-color: rgb(51, 51, 51); cursor: pointer;" align="absmiddle" height="1" width="1"></td></tr></tbody></table>

<nobr><img src="images/colorpicker.jpg" naturalsizeflag="3" onmousemove="javascript:QrColorPicker.setColor(event,'QrColorPicker0');" onclick="javascript:QrColorPicker.selectColor(event,'QrColorPicker0');" style="cursor: crosshair;" align="BOTTOM" border="0" height="128" width="192"></nobr><br><nobr><img src="images/graybar.jpg" naturalsizeflag="3" onmousemove="javascript:QrColorPicker.setColor(event,'QrColorPicker0');" onclick="javascript:QrColorPicker.selectColor(event,'QrColorPicker0');" style="cursor: crosshair;" align="BOTTOM" border="0" height="8" width="192"></nobr><br>
<nobr><input size="8" id="QrColorPicker0#input" style="border: 1px solid gray; font-size: 12pt; margin: 1px;" onkeyup="QrColorPicker.keyColor('QrColorPicker0')" value="" onchange="QrColorPicker.InputValueChange(this);" type="text"><a href="javascript:QrColorPicker.SetDefaultColor('QrColorPicker0','');"><img src="images/grid.gif" style="height: 20px; width: 20px;" align="absmiddle" border="0">恢复默认</a></nobr></div>