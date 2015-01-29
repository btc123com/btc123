<?{include file="admin/header.tpl"}?>
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
	$("#title").after('<tr id="new_row_'+newrow_count+'"><td class="tr_a"><input type="text" size="3" style="width:auto" value="1" name="listorder[]" id="new_listorder_'+newrow_count+'"/><input type="hidden" id="new_id_'+newrow_count+'" name="id[]" id="new_id_'+newrow_count+'"></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="" name="name[]"  id="new_name_'+newrow_count+'"/></td><td class="tr_a"><input type="text" size="50" value="" name="url[]"  id="new_url_'+newrow_count+'"/></td><?{if $updateSite =="true"}?><td class="tr_a"><a href="javascript:;" onclick="doLineEdit(\'\','+newrow_count+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="deleteLineSite(\'\','+newrow_count+')"><img src="images/ico_del.gif" /></a></td><?{/if}?></tr>');
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


			$("#title").after('<tr id="display_row_'+upedid+'" ondblclick="submitLineEdit('+upedid+')"><td class="tr_a">'+listorder+'</td><input type="hidden" name="hidid[]" value="'+upedid+'"><td class="tr_a">'+name+'</td><td class="tr_a"><a href="'+url+'" target="_blank">'+url+'</a></td><?{if $updateSite =="true"}?><td class="tr_a"><a href="javascript:;" onclick="submitLineEdit('+upedid+')"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" /></a></td><?{/if}?></tr><tr id="edit_row_'+upedid+'" style="display:none"><td class="tr_a"><input type="text" size="3" style="width:auto" id="listorder_'+upedid+'" value="'+listorder+'" name="listorder[]" /><input type="hidden" name="id[]" id="id_'+upedid+'" value="'+upedid+'" /></td><td class="tr_a"><input type="text" size="15" style="width:auto" value="'+name+'" name="name[]"  id="name_'+upedid+'"/></td><td class="tr_a"><input type="text" size="50" value="'+url+'" name="url[]"  id="url_'+upedid+'"/></td><?{if $updateSite =="true"}?><td class="tr_a"><a  href="javascript:;" onclick="doLineEdit('+upedid+')"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit('+upedid+')"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite('+upedid+')"><img src="images/ico_del.gif" /></a></td><?{/if}?></tr>');
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
        <td width="9%" class="tr1" id="sort_listorder">排序</td>
        <td width="15%"  class="tr1">站点名称</td>
        <td width="34%"  class="tr1" id="sort_url">站点URL</td>
        <td width="8%"  class="tr1">操作</td>
      </tr>
      <?{section name=loop loop=$arrSite}?>
      <tr id="display_row_<?{$arrSite[loop].id}?>" ondblclick="submitLineEdit(<?{$arrSite[loop].id}?>)">
        <td class="tr_a"><?{$arrSite[loop].listorder}?><input type="hidden" name="hidid[]" value="<?{$arrSite[loop].id}?>"></td>
        <td class="tr_a"><?{$arrSite[loop].name|htmlspecialchars_decode|stripslashes}?></td>
        <td class="tr_a"><a href="<?{$arrSite[loop].url}?>" target="_blank"><?{$arrSite[loop].url|substr:0:60}?></a></td>
        <?{if $updateSite =="true"}?>
        <td class="tr_a"><a href="javascript:;" onclick="submitLineEdit(<?{$arrSite[loop].id}?>)"><img src="images/ico_edit.gif" title="编辑" /></a><a onclick="deleteLineSite(<?{$arrSite[loop].id}?>)"><img src="images/ico_del.gif" /></a></td>
        <?{/if}?>
      </tr>
      <tr id="edit_row_<?{$arrSite[loop].id}?>" style="display:none">
         <td class="tr_a"><input type="text" size="3" style="width:auto" id="listorder_<?{$arrSite[loop].id}?>" value="<?{$arrSite[loop].listorder}?>" name="listorder[]" />
            <input type="hidden" name="id[]" id="id_<?{$arrSite[loop].id}?>" value="<?{$arrSite[loop].id}?>" />
         </td>
         <td class="tr_a"><input type="text" size="15" style="width:auto" value="<?{$arrSite[loop].name}?>" name="name[]"  id="name_<?{$arrSite[loop].id}?>"/></td>
         <td class="tr_a"><input type="text" size="50" value="<?{$arrSite[loop].url}?>" name="url[]"  id="url_<?{$arrSite[loop].id}?>"/></td>
         <?{if $updateSite =="true"}?>
         <td class="tr_a"><a  href="javascript:;" onclick="doLineEdit(<?{$arrSite[loop].id}?>)"><img src="images/ico_ok.gif" /></a><a href="javascript:;" onclick="hideLineEdit(<?{$arrSite[loop].id}?>)"><img src="images/ico_cancel.gif" /></a><a onclick="deleteLineSite(<?{$arrSite[loop].id}?>)"><img src="images/ico_del.gif" /></a></td>
         <?{/if}?>
       </tr>
       <?{/section}?>
       <tr>
         <td height="30" colspan="5" align="right" valign="middle" class="ly_Rtd"><?{$pager}?><input type="button" class="button" value="新增" onclick="addNewSite()"/>&nbsp;
        <input type="button" class="button" value=" 全编辑 " onclick="showAllEditStatus()">&nbsp;
        <input type="button" class="button" value=" 全提交 " onclick="submitAllEdit()">&nbsp;</td>
       </tr>
     </table>
<?{include file="admin/footer.tpl"}?>
