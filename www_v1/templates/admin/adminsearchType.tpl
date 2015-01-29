<?{include file="admin/header.tpl"}?>
<script language="javascript">
function submitLineEdit(sid){
	$('#display_row_'+sid).hide();
	$('#edit_row_'+sid).show();
	var cc = $("#display_row_"+sid+" input[name='siteDef']").attr("checked");
	if(cc){$("#edit_row_"+sid+" input[name='siteDef']").attr("checked","checked");}
}
function hideLineEdit(sid){
	$('#display_row_'+sid).show();
	$('#edit_row_'+sid).hide();
}
var newrow_count=0;
function addNewSite(){
	// 注：用不同样式区分新增行与原有行
	newrow_count++;
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" name="siteSort[]" id="new_siteSort_'+newrow_count+'"/><input type="hidden" id="new_siteID_'+newrow_count+'" name="siteID[]" id="new_siteID_'+newrow_count+'"></td><td class="tr_a"><input type="radio" size="50" name="siteDef"  id="new_siteDef_'+newrow_count+'" style="width:auto;border:0"/></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="" name="siteName[]"  id="new_siteName_'+newrow_count+'"/></td><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" title="删除" /></a></td></tr>');
}
function showAllEditStatus(){
	$("#datatable").find("tr").each(function(){
	var trid=$(this).attr('id');
	var r = /[0-9]+$/g;
	var re = trid.match(r);
	if(re != null){
		$('#display_row_'+re).hide();
		$('#edit_row_'+re).show();
		var cc = $("#display_row_"+re+" input[name='siteDef']").attr("checked");
		if(cc){$("#edit_row_"+re+" input[name='siteDef']").attr("checked","checked");}
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
	var siteDef = document.getElementById(row+'siteDef_'+upid).checked;
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
	$.getJSON("site_search.php?a=edit&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteDef[]="+escape(siteDef), function(json){
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
			var siteDef = data.siteDef;
			siteDef = (siteDef==1) ? 'checked' : '';
			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+siteSort+'</td><td class="tr_a"><input type="radio" name="siteDef" value="'+upedid+'" style="width:auto;border:0" '+siteDef+'></td><input type="hidden" name="hidSiteID[]" value="'+upedid+'"><td class="tr_a">'+siteName+'</td><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除" /></a></td></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_'+upedid+'" value="'+siteSort+'" name="siteSort[]" /><input type="hidden" name="siteID[]" id="siteID_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="radio" size="50" value="'+siteDef+'" name="siteDef"  id="siteDef_'+upedid+'" style="width:auto;border:0"/></td><td class="tr_a"><input type="text" size="15" style="width:auto;" value="'+siteName+'" name="siteName[]"  id="siteName_'+upedid+'"/></td><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" title="删除" /></a></td></tr>');
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
			$('#siteDef_'+upedid).val(data.siteDef);
			tr = $('#display_row_'+upedid);
			data.siteDef =(data.siteDef==1)? 'checked' : '';
			var rdata = new Array(data.siteSort,'<input type="radio" name="siteDef" style="width:auto;border:0" '+data.siteDef+'>',data.siteName,'<a href="javascript:;" onclick="submitLineEdit('+data.siteID+')"><img src="images/ico_edit.gif" title="编辑"></a><a onclick="deleteLineSite('+data.siteID+')"><img src="images/ico_del.gif" title="删除"></a>');
			i=0;
			tr.find("td").each(function(){
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
			var siteDef = document.getElementById('siteDef_'+upid).checked;
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
			url += "&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteDef[]="+escape(siteDef);
		}
		if(trid.substr(0,8)=='new_row_'){
			// 新增的
			var upid = trid.substr(8,trid.length);
			var siteID = $('#new_siteID_'+upid).val();
			var siteSort = $('#new_siteSort_'+upid).val();
			var siteName = $('#new_siteName_'+upid).val();
			var siteDef = document.getElementById('new_siteDef_'+upid).checked;
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
			url += "&siteID[]="+escape(siteID)+"&siteSort[]="+escape(siteSort)+"&siteName[]="+escape(siteName)+"&siteDef[]="+escape(siteDef);
		}

	});
	if(url!=''){
		url = 'site_search.php?a=edit'+url;
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
		var cc = $("#display_row_"+id+" input[name='siteDef']").attr("checked");
		var dd = $("#edit_row_"+id+" input[name='siteDef']").attr("checked");
		if(cc || dd){
			alert("默认搜索不能删除！");
			return false;
		}
		$.getJSON("site_search.php?a=delete&siteID[]="+escape(siteID), function(json){
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
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>首页搜索引擎设置</h1>    </tr>
	</table>
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
        <td width="20%" class="tr1" id="sort_siteSort">排序</td>
        <td width="20%"  class="tr1">默认</td>
        <td width="40%"  class="tr1" id="sort_siteDef">分类名称</td>
        <td width="20%"  class="tr1">操作</td>
      </tr>
      <?{section name=loop loop=$searchArr}?>
      <tr id="display_row_<?{$searchArr[loop].classid}?>" ondblclick="submitLineEdit(<?{$searchArr[loop].classid}?>)">
        <td class="tr_a"><?{$searchArr[loop].sort}?><input type="hidden" name="hidSiteID[]" value="<?{$searchArr[loop].classid}?>"></td>
        <td class="tr_a"><input type="radio" name="siteDef" <?{if $searchArr[loop].is_default ==1}?>checked="checked"<?{/if}?> style="width:auto;border:0"></td>
        <td class="tr_a"><?{$searchArr[loop].classname}?></td>
        <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?{$searchArr[loop].classid}?>)"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite(<?{$searchArr[loop].classid}?>)"><img src="images/ico_del.gif" title="删除" /></a></td>
      </tr>
      <tr id="edit_row_<?{$searchArr[loop].classid}?>" style="display:none">
         <td class="tr_a"><input type="text" size="3" style="width:auto" id="siteSort_<?{$searchArr[loop].classid}?>" value="<?{$searchArr[loop].sort}?>" name="siteSort[]" />
            <input type="hidden" name="siteID[]" id="siteID_<?{$searchArr[loop].classid}?>" value="<?{$searchArr[loop].classid}?>" />
         </td>
         <td class="tr_a"><input type="radio" id="siteDef_<?{$searchArr[loop].classid}?>" name="siteDef" style="width:auto;border:0"></td>
         <td class="tr_a"><input type="text" size="15" style="width:auto;" value="<?{$searchArr[loop].classname}?>" name="siteName[]"  id="siteName_<?{$searchArr[loop].classid}?>"/></td>
         <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?{$searchArr[loop].classid}?>)"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit(<?{$searchArr[loop].classid}?>)"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite(<?{$searchArr[loop].classid}?>)"><img src="images/ico_del.gif" title="删除" /></a></td>
       </tr>
       <?{/section}?>
       <tr>
         <td height="30" colspan="5" align="right" valign="middle" class="ly_Rtd"><?{$pager}?><input type="button" class="button" value="新增" onclick="addNewSite()"/>&nbsp;
        <input type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">&nbsp;
        <input type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">&nbsp;</td>
       </tr>
     </table>
<?{include file="admin/footer.tpl"}?>