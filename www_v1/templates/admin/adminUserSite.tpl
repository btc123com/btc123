<?{include file="admin/header.tpl"}?>
<?{if $viewSite == "true"}?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>用户站点管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
          <?{html_options options=$arrSearchField selected=$smarty.get.searchField}?>
        </select>
		<input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?{$smarty.get.keyWord}?>" />
		用户名:<input type="text" name="userName" value="<?{$smarty.get.userName}?>" />
		<input type="hidden" value="1" name="search" />
		<input type="submit" value=" 搜 索 " class="button"> <?{if $smarty.get.search}?><input type="button" class="button" onclick="location.href='adminUserSite.php';" value="取消搜索" /><?{/if}?></div></td>
        </tr>
        </form>
      </table>

     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
	<form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
	<tr >
      <td colspan="5" align="right" class="ly_Rtd" style="padding:6px 0;"><input type="submit" name="btnDelete" value=" 删  除 " class="button" <?{if $delSite!="true"}?>disabled<?{/if}?>></td>
    </tr>
    <tr>
      <td width="20%"  class="tr1">站点名称</td>
	  <td width="50%"  class="tr1" id="sort_siteUrl">站点URL</td>
	  <td width="20%"  class="tr1">用户名称</td>
      <td width="10%"  class="tr1"><span class="btn">选择<input style="width:auto;border:0;"  type="checkbox" onclick="chooseall(this,'chkDelID[]')" ></span></td>
    </tr>
		<?{section name=loop loop=$arrSite}?>
    <tr >
      <input type="hidden" name="hidSiteID[]" value="<?{$arrSite[loop].siteID}?>">
      <td class="tr_a"><?{$arrSite[loop].siteName}?></td>
	  <td  class="tr_a"><?{$arrSite[loop].siteUrl}?></td>
	  <td  class="tr_a"><?{$arrSite[loop].userName}?> &nbsp;</td>
      <td  class="tr_a">
	  	<input style="width:auto;border:0"  type="checkbox" name="chkDelID[]" id="chkDelID" value="<?{$arrSite[loop].siteID}?>" />
      </td>
    </tr>
		<?{/section}?>
    <tr >
      <td colspan="5" align="right" class="ly_Rtd" style="padding:6px 0;"><?{$pager}?> <input type="submit" name="btnDelete" value=" 删  除 " class="button" <?{if $delSite!="true"}?>disabled<?{/if}?>></td>
    </tr>
</form>
</table>
<div class="clear"></div>
  </div>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>