<?{include file="admin/header.tpl"}?>
<script language="javascript">
function chooseimg(obj){
	var imgname = obj.value;
	var str='';
	if(imgname != '0'){
		str +='<img src="../static/images/'+imgname+'">';
	}
	$(obj).next("span").html(str);
}
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
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" name="siteSort[]" id="new_siteSort_'+newrow_count+'"/><input type="hidden" id="new_siteID_'+newrow_count+'" name="siteID[]" id="new_siteID_'+newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto; float: left;" value="" name="siteName[]"  id="new_siteName_'+newrow_count+'"/></td><td class="tr_a"><input type="text" size="50" value="http://" name="siteUrl[]"  id="new_siteUrl_'+newrow_count+'"/></td><?{if $updateSite =="true"}?><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif"></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" title="删除"></a></td><?{/if}?></tr>');
}

function addTypeNewSite(){
	type_newrow_count++;
	$("#type_title").after('<tr id="type_new_row_'+type_newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" id="type_new_stpSort_'+type_newrow_count+'"/><input type="hidden" id="type_new_stpTypeID_'+type_newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto" id="type_new_stpName_'+type_newrow_count+'"/></td><td class="tr_a"><select id="type_new_stpHtmlName_'+type_newrow_count+'" onchange="chooseimg(this);"><?{foreach item=l from=$imgArr}?><option value="<?{$l.iname}?>"><?{$l.iname}?></option><?{/foreach}?></select><span style="float:right"></span></td><td class="tr_a"><a href="javascript:;" onclick="doTypeLineEdit(\'\','+type_newrow_count+')"><img src="images/ico_ok.gif"></a><a href="javascript:;" onclick="deleteTypeLineSite(\'\','+type_newrow_count+')"><img src="images/ico_del.gif" title="删除"></a></td></tr>');
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

	$.getJSON("site_self.php?a=edit&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl)+"&stpID[]=<?{$typeid}?>", function(json){
		editResult(json[0],upid);
htmlnotice(3);
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

	var sortCheck = validate('sort',stpSort);
			var nameCheck = validate('name',stpName);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
	$.getJSON("site_self.php?a=edittype&stpID[]="+escape(stpID)+"&stpSort[]="+escape(stpSort)+"&stpName[]="+escape(stpName)+"&stpHtmlName[]="+escape(stpHtmlName), function(json){
		editTypeResult(json[0],upid);
htmlnotice(3);
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
			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+siteSort+'</td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a">'+siteName+'</td><td class="tr_a"><a href="'+siteUrl+'" target="_blank">'+siteUrl+'</a><?{if $updateSite =="true"}?><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a></td><?{/if}?></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_'+upedid+'" value="'+siteSort+'" name="siteSort[]" /><input type="hidden" name="siteID[]" id="siteID_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto;float: left;" value="'+siteName+'" name="siteName[]"  id="siteName_'+upedid+'"/></td><td class="tr_a"><input type="text" size="50" value="'+siteUrl+'" name="siteUrl[]"  id="siteUrl_'+upedid+'"/></td><?{if $updateSite =="true"}?><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif"></a><a  href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif"></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a></td><?{/if}?></tr>');
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
			tr = $('#display_row_'+upedid);
			var rdata = new Array(data.siteSort,data.siteName,data.siteUrl,'<a href="javascript:;" onclick="submitLineEdit('+data.siteID+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite('+data.siteID+')"><img src="images/ico_del.gif" title="删除"></a>');
			i=0;
			tr.find("td").each(function(){
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

			$("#type_title").after('<tr id="type_display_row_'+upedid+'" ondblclick="submitTypeLineEdit('+upedid+')"><td class="tr_a">'+stpSort+'</td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a">'+stpName+'</td><td class="tr_a">'+stpHtmlName+'<img src="../static/images/'+stpHtmlName+'"></td><td class="tr_a"><a href="javascript:;" onclick="submitTypeLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteTypeLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_self.php?typeid='+upedid+'"><img src="images/ico_set.gif" title="下一级"></a></td></tr><tr id="type_edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="stpSort_'+upedid+'" value="'+stpSort+'" name="stpSort[]" /><input type="hidden" id="stpTypeID_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="'+stpName+'" id="stpName_'+upedid+'"/></td><td class="tr_a"><select id="stpHtmlName_'+upedid+'" onchange="chooseimg(this);"><?{foreach item=l from=$imgArr}?><option value="<?{$l.iname}?>"><?{$l.iname}?></option><?{/foreach}?></select><span style="float:right"></span></td><td class="tr_a"><a  href="javascript:;" onclick="doTypeLineEdit('+upedid+')"><img src="images/ico_ok.gif"></a><a  href="javascript:;" onclick="hideTypeLineEdit('+upedid+')"><img src="images/ico_cancel.gif"></a><a onclick="deleteTypeLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除"></a></td></tr>');

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
			tr = $('#type_display_row_'+upedid);
			var data = new Array(data.stpSort,data.stpName,data.stpHtmlName+'<img src="../static/images/'+data.stpHtmlName+'">','<a href="javascript:;" onclick="submitTypeLineEdit('+data.stpID+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteTypeLineSite('+data.stpID+')"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_self.php?typeid='+data.stpID+'"><img src="images/ico_set.gif" title="下一级"></a>');
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
			url += "&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl);
		}
		if(trid.substr(0,8)=='new_row_'){
			// 新增的
			var upid = trid.substr(8,trid.length);
			var siteID = $('#new_siteID_'+upid).val();
			var siteSort = $('#new_siteSort_'+upid).val();
			var siteName = $('#new_siteName_'+upid).val();
			var siteUrl = $('#new_siteUrl_'+upid).val();
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
			url += "&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteUrl[]="+escape(siteUrl)+"&stpID[]=<?{$typeid}?>";
		}

	});
	if(url!=''){
		url = 'site_self.php?a=edit'+url;
		$.getJSON(url,function(json){
			for(key in json){
				editResult(json[key]);
			}
		})
htmlnotice(3);
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
			var stpHtmlName = $('#stpHtmlName_'+upid).val();
			var sortCheck = validate('sort',stpSort);
			var nameCheck = validate('name',stpName);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
			url += "&stpID[]="+escape(stpID)+"&stpSort[]="+escape(stpSort)+"&stpName[]="+escape(stpName)+"&stpHtmlName[]="+escape(stpHtmlName);
		}
		if(trid.substr(0,13)=='type_new_row_'){
			// 新增的
			var upid = trid.substr(13,trid.length);
			var stpID = $('#type_new_stpTypeID_'+upid).val();
			var stpSort = $('#type_new_stpSort_'+upid).val();
			var stpName = $('#type_new_stpName_'+upid).val();
			var stpHtmlName = $('#type_new_stpHtmlName_'+upid).val();
			var sortCheck = validate('sort',stpSort);
			var nameCheck = validate('name',stpName);
			if(!sortCheck[0]){
				alert(sortCheck[1]);
				return false;
			}
			if(!nameCheck[0]){
				alert(nameCheck[1]);
				return false;
			}
			url += "&stpID[]="+escape(stpID)+"&stpSort[]="+escape(stpSort)+"&stpName[]="+escape(stpName)+"&stpHtmlName[]="+escape(stpHtmlName);
		}
	});
	if(url!=''){
		url = 'site_self.php?a=edittype'+url;
		$.getJSON(url,function(json){
			for(key in json){
				editTypeResult(json[key]);
			}
		})
htmlnotice(3);		
	}else{
		alert(" 没有可提交的数据 ");
	}
	treeReset();
}

function deleteLineSite(id,trid){
	if(id!=''){
		// 删除真数据
		siteID = $('#siteID_'+id).val();
		$.getJSON("site_self.php?a=delete&siteID[]="+escape(siteID), function(json){
			if(json.flag=='delete'){
				$('#display_row_'+siteID).remove();
				$('#edit_row_'+siteID).remove();
htmlnotice(3);				
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
		$.getJSON("site_self.php?a=deletetype&stpID[]="+escape(id), function(json){
			if(json.flag=='delete'){
				$('#type_display_row_'+id).remove();
				$('#type_edit_row_'+id).remove();
htmlnotice(3);				
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

<?{if $typeid}?>
	<form method="get" action="?">
	<input type="hidden" name="typeid" value="<?{$typeid}?>">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>酷站管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
           <?{html_options options=$arrSearchField selected=$smarty.get.searchField}?>
        </select>
        <input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?{$smarty.get.keyWord}?>" />
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
            <td width="9%" class="tr1" id="sort_siteSort">排序</td>
            <td width="15%"  class="tr1">站点名称</td>
            <td width="30%"  class="tr1" id="sort_siteUrl">站点URL</td>
            <?{if $updateSite =="true"}?>
            <td width="12%"  class="tr1">操作</td>
            <?{/if}?>
          </tr>
          <?{section name=loop loop=$arrSite}?>
          <tr id="display_row_<?{$arrSite[loop].siteID}?>" ondblclick="submitLineEdit(<?{$arrSite[loop].siteID}?>)">
            <td class="tr_a"><?{$arrSite[loop].siteSort}?><input type="hidden" name="hidSiteID[]" value="<?{$arrSite[loop].siteID}?>"></td>

            <td class="tr_a"><?{$arrSite[loop].siteName}?></td>
            <td class="tr_a"><a href="<?{$arrSite[loop].siteUrl}?>" target="_blank"><?{$arrSite[loop].siteUrl|substr:0:60}?></a></td>

            <?{if $updateSite =="true"}?>
            <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?{$arrSite[loop].siteID}?>)"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite(<?{$arrSite[loop].siteID}?>)"><img src="images/ico_del.gif" title="删除"></a></td>
            <?{/if}?>
          </tr>
          <tr id="edit_row_<?{$arrSite[loop].siteID}?>" style="display:none">
            <td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_<?{$arrSite[loop].siteID}?>" value="<?{$arrSite[loop].siteSort}?>" name="siteSort[]" />
            <input type="hidden" name="siteID[]" id="siteID_<?{$arrSite[loop].siteID}?>" value="<?{$arrSite[loop].siteID}?>" />
            </td>
            <td class="tr_a"><input type="text" size="15" style="width:auto;" value="<?{$arrSite[loop].siteName}?>" name="siteName[]"  id="siteName_<?{$arrSite[loop].siteID}?>"/></td>
            <td class="tr_a"><input type="text" size="50" value="<?{$arrSite[loop].siteUrl}?>" name="siteUrl[]"  id="siteUrl_<?{$arrSite[loop].siteID}?>"/></td>
            <?{if $updateSite =="true"}?>
            <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?{$arrSite[loop].siteID}?>)"><img src="images/ico_ok.gif"></a><a  href="javascript:;" onclick="hideLineEdit(<?{$arrSite[loop].siteID}?>)"><img src="images/ico_cancel.gif"></a><a onclick="deleteLineSite(<?{$arrSite[loop].siteID}?>)"><img src="images/ico_del.gif" title="删除"></a></td>
            <?{/if}?>

          </tr>
          <?{/section}?>
          <tr>
            <td height="30" colspan="5" align="right" valign="middle" class="ly_Rtd"><?{$pager}?><input type="button" class="button" value="新增" onclick="addNewSite()"/>&nbsp;
        <input type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">&nbsp;
        <input type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">&nbsp;</td>
            </tr>

      </table>

<?{/if}?>
<?{if !$typeid}?>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>酷站分类管理</h1>
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
            <td width="20%" class="tr1" id="sort_stpSort">排序</td>
            <td width="30%"  class="tr1">分类名称</td>
            <td width="15%"  class="tr1" id="sort_stpHtmlName">分类图标</td>
            <td width="20%"  class="tr1">操作</td>
          </tr>
          <?{section name=loop loop=$allType}?>
          <tr id="type_display_row_<?{$allType[loop].stpID}?>" ondblclick="submitTypeLineEdit(<?{$allType[loop].stpID}?>)">
            <td class="tr_a"><?{$allType[loop].stpSort}?>&nbsp;</td>
            <td class="tr_a"><?{$allType[loop].stpName}?>&nbsp;</td>
            <td class="tr_a"><?{$allType[loop].stpImg}?>&nbsp;<img src="../static/images/<?{$allType[loop].stpImg}?>"></td>
            <td class="tr_a"><a href="javascript:;" onclick="submitTypeLineEdit(<?{$allType[loop].stpID}?>)"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteTypeLineSite(<?{$allType[loop].stpID}?>)"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_self.php?typeid=<?{$allType[loop].stpID}?>"><img src="images/ico_set.gif" title="下一级"></a></td>

          </tr>
          <tr id="type_edit_row_<?{$allType[loop].stpID}?>" style="display:none">
            <td class="tr_a"><input type="text" size="3" style="width:auto" id="stpSort_<?{$allType[loop].stpID}?>" value="<?{$allType[loop].stpSort}?>" name="stpSort[]" />
            <input type="hidden" name="stpTypeID[]" id="stpTypeID_<?{$allType[loop].stpID}?>" value="<?{$allType[loop].stpID}?>" />
            </td>
            <td class="tr_a"><input type="text" size="15" style="width:auto" value="<?{$allType[loop].stpName}?>" name="stpName[]"  id="stpName_<?{$allType[loop].stpID}?>"/></td>
            <td class="tr_a"><select id="stpHtmlName_<?{$allType[loop].stpID}?>"  name="stpHtmlName[]" onchange="chooseimg(this);">
				<?{foreach item=l from=$imgArr}?>
				<option value="<?{$l.iname}?>" <?{if $allType[loop].stpImg==$l.iname}?>selected<?{/if}?>><?{$l.iname}?></option>
				<?{/foreach}?>
			</select><span style="float:right"><img src="../static/images/<?{$allType[loop].stpImg}?>"></span></td>
            <td class="tr_a"><a  href="javascript:;" onclick="doTypeLineEdit(<?{$allType[loop].stpID}?>)"><img src="images/ico_ok.gif"></a><a  href="javascript:;" onclick="hideTypeLineEdit(<?{$allType[loop].stpID}?>)"><img src="images/ico_cancel.gif"></a><a onclick="deleteTypeLineSite(<?{$allType[loop].stpID}?>)"><img src="images/ico_del.gif" title="删除"></a><a href="./adminsite_self.php?typeid=<?{$allType[loop].stpID}?>"><img src="images/ico_set.gif" title="下一级"></a></td>
          </tr>
          <?{/section}?>
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
<?{/if}?>
<?{include file="admin/footer.tpl"}?>