<?{include file="admin/header.tpl"}?>
<div id="box">
<div class="right">

<?{if $viewAdminModule == "true"}?>
<script language="javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
</script>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>模块管理</h1>
	<div class="search"></div></td>
    </tr>
	</table>
	
<form action="?moduleFID=<?{$moduleFID}?>&act=operate&p=<?{$p}?>" method="post" onSubmit="return confirm('确定要操作吗？')">
    
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
	<tr><td align="right" colspan="6"><input type="submit" name="btnUpdate" value=" 修  改 " class="button" <?{if $updateAdminModule!="true"}?>disabled<?{/if}?> />
	   &nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button" <?{if $delAdminModule!="true"}?>disabled<?{/if}?> /></td></tr>
	<tr>
	  <td class="tr1" >模块名称</td>
	  <td class="tr1">模块页面</td>
	  <td class="tr1">模块顺序</td>
	  <td  class="tr1"> 子集模块</td>
	  <td class="tr1"> 锁定<input style="width:auto; border:none" type="checkbox" onclick="chooseall(this,'chkLockID[]')"></td>
	  <td class="tr1"> 删除<input style="width:auto;border:none" type="checkbox" onclick="chooseall(this,'chkDelID[]')"> </td>
	</tr>
	<?{section name=moduleList loop=$arrModuleList}?>
	<tr>
	  <td class="tr_a">
	    <input type="hidden" name="hidModuleID[]" value="<?{$arrModuleList[moduleList].moduleID}?>"><input style="width:auto;" type="text" name="tbModuleName[]" value="<?{$arrModuleList[moduleList].moduleName}?>" size="16" />
	  </td>
	  <td class="tr_a"><input type="text" style="width:auto;" name="tbModuleLink[]" value="<?{$arrModuleList[moduleList].moduleLink}?>" size="30" /></td>
	  <td class="tr_a"><input type="text" style="width:auto;" name="moduleIndex[]" value="<?{$arrModuleList[moduleList].moduleIndex}?>" size="5"/></td>
	  <td class="tr_a"><?{if $arrModuleList[moduleList].moduleFID == "0"}?><a href="?moduleFID=<?{$arrModuleList[moduleList].moduleID}?>">子级</a><?{else}?><a href="?moduleFID=0">无</a><?{/if}?></td>
	  <td class="tr_a">
	    <label>
		<input type="checkbox" style="width:auto;border:none" name="chkLockID[]" id="chkLockID" value="<?{$arrModuleList[moduleList].moduleID}?>" <?{if $arrModuleList[moduleList].moduleState=="0"}?>checked<?{/if}?> />
	    </label>
	 </td>
	  <td class="tr_a">
	  <label>
	  <input type="checkbox" style="width:auto;border:none" name="chkDelID[]" id="chkDelID" value="<?{$arrModuleList[moduleList].moduleID}?>" />
	    </label></td>
	</tr>
    	<?{/section}?>
	<tr>
	  <td colspan="6" align="right"  height="32px"><?{$pager}?><input type="submit" name="btnUpdate" value=" 修  改 " class="button" <?{if $updateAdminModule!="true"}?>disabled<?{/if}?> />
	   &nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button" <?{if $delAdminModule!="true"}?>disabled<?{/if}?> /></td>
	</tr>
    </table></td>
  </tr>
</table>
</form>
<?{/if}?>
<?{if $addAdminModule == "true"}?>
<form action="?moduleFID=<?{$moduleFID}?>&act=add&p=<?{$p}?>" method="post">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>添加新模块</h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
<?{foreach from=$arrNO item=NO}?>
  <tr >
		<td width="36%" height="36">模块名称<?{$NO}?>：
		  <input name="tbModuleName[]" id="tbModuleName<?{$NO}?>" value="" type="text" size="20"></td>
	<td width="64%" height="36">模块页面：
	  <input name="tbModuleLink[]" id="tbModuleLink<?{$NO}?>" type="text" value="<?{if $moduleFID=='0'}?>left.php<?{/if}?>" size="30"></td>	
  </tr>
	<?{/foreach}?>
	<tr>
     <td height="36"><input value=" 添  加 " type="submit" class="button" <?{if $addAdminModule!="true"}?>disabled<?{/if}?>></td>
	  </tr>
   </table>
   </td>

</table>
</form>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>
