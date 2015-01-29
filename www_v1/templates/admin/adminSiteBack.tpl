<?{include file="admin/header.tpl"}?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>网址回收</h1>
</td>
        </tr>
        </form>
      </table>

 <form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
  <tr >
      <td colspan="8" align="right"  class="ly_Rtd"><input type="submit" name="btnBack" value=" 恢 复 " class="button"  /><input type="submit" name="btnDelete" value=" 永久删除 " class="button"  /></td>
    </tr>
    <tr >
      <td  class="tr1">名称</td>
      <td class="tr1" >网址</td>
      <td class="tr1" >原分类</td>
      <td class="tr1">选择<input style="width:auto; border:none"  type="checkbox" onclick="chooseall(this,'chkSiteID[]')"></td>
    </tr>
    <?{section name=userList loop=$arrSiteList}?>
    <tr >
      <td class="tr_a"   title="<?{$arrSiteList[userList].siteName}?>"><?{$arrSiteList[userList].siteName}?></td>
      <td class="tr_a"  ><a target="_blank" href="<?{$arrSiteList[userList].siteUrl}?>"><?{$arrSiteList[userList].siteUrl}?></a></td>
      <td class="tr_a"  ><?{$arrSiteList[userList].stpName}?></td>
      <td class="tr_a"><input style="width:auto;border:none"  type="checkbox" name="chkSiteID[]" id="chkSiteID" value="<?{$arrSiteList[userList].siteID}?>" /></td>
    </tr>
    <?{/section}?>
    <tr >
      <td colspan="8" align="right"  class="ly_Rtd"><?{$pager}?><input type="submit" name="btnBack" value=" 恢 复 " class="button"  /><input type="submit" name="btnDelete" value=" 永久删除 " class="button"  /></td>
    </tr>
  </table>
</form>
<div class="clear"></div>
  </div>
<?{include file="admin/footer.tpl"}?>
