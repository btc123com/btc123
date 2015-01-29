<?{include file="admin/header.tpl"}?>
<script language="javascript">
var count = 1;
function getSubLanmu(obj,rowid) {
	subid = obj.value;
	$('#hid_'+rowid).val(subid);
	$.getJSON("adminAjax.php?stpParentID=" + subid, function(json){
		var str = '<select id="count_'+(count++)+'" name="tbStpParent_'+rowid+'[]" onchange="getSubLanmu(this,'+rowid+')"><option value="">请选择</option>';
		for(var key in json){
			str += '<option value="'+json[key].stpID+'">'+json[key].stpName+'</option>';
		}
		str +='</select>';
		if (json.length != 0) {
			$('#'+obj.id).nextAll("select").hide();
			$('#'+obj.id).after(str);
		}
	});
}
</script>
<?{if $checkSite == "true"}?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>站点审核</h1>
      <div class="search">
        <select name="searchField" id="searchField">
          <?{html_options options=$arrSearchField selected=$smarty.get.searchField}?>
        </select>		<input name="keyWord" type="text" id="keyWord" size="12" maxlength="50" value="<?{$smarty.get.keyWord}?>" />
		<input type="hidden" value="1" name="search" /><input type="submit" value=" 搜 索 " class="button"> <?{if $smarty.get.search}?><input type="button" class="button" onclick="location.href='adminSiteCheck.php';" value="取消搜索" /><?{/if}?></div></td>
        </tr>
        </form>
      </table>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
      <form action="" method="post" onSubmit="return confirm('确定要操作吗？')">
      <tr>
      <td colspan="8" align="right"><input type="submit" name="btnPass" value=" 通  过 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"></td>
        </tr>
      <tr>
        <td width="20%" class="tr1">申请站点名称</td>
        <td width="20%" class="tr1">申请站点URL</td>
        <td width="10%" class="tr1">所属分类</td>
        <td width="10%" class="tr1">Alexa排名 </td>
        <td width="10%" class="tr1">建站时间</td>
        <td width="10%" class="tr1">联系方式</td>
	<td width="10%" class="tr1">申请时间</td>
        <td width="10%" class="tr1"><div align="center">选择</div></td>
      </tr>
      <?{section name=loop loop=$arrSite}?>
      <tr>
        <td class="tr_a"><?{$arrSite[loop].siteName}?></td>
        <td class="tr_a"><a href="<?{$arrSite[loop].siteUrl}?>" target="_blank"><?{$arrSite[loop].siteUrl}?></a></td>
        <td class="tr_a">
        <span>
        <select id="<?{$arrSite[loop].siteID}?>" name="tbStpParent_<?{$arrSite[loop].siteID}?>[]" onchange="getSubLanmu(this,<?{$arrSite[loop].siteID}?>)">
        <option value="0">一级</option>
        <?{html_options options=$arrAddSiteType}?>
        </select>
        <input type="hidden" id="hid_<?{$arrSite[loop].siteID}?>" name="stpID[<?{$arrSite[loop].siteID}?>]">
        </span></td>
        <td class="tr_a"><a href="http://alexa.aosoo.com/<?{$arrSite[loop].siteUrl}?>" target="_blank"><?{$arrSite[loop].alexa}?></a></td>
        <td class="tr_a"><?{if $arrSite[loop].buildDate == '0'}?>未知<?{else}?><?{$arrSite[loop].buildDate}?><?{/if}?></td>
        <td class="tr_a"><?{$arrSite[loop].contact}?></td>
	<td class="tr_a"><?{$arrSite[loop].cDate|date_format:"%Y-%m-%d"}?></td>
        <td align="center" class="tr_a">
          <label>
            <input style="width:auto;border:0" type="checkbox" name="chkDelID[<?{$arrSite[loop].siteID}?>]" value="<?{$arrSite[loop].siteID}?>" />
            </label>
        </td>
      </tr>
      <?{/section}?>
      <tr>
      <td colspan="8" align="right"><?{$pager}?><input type="submit" name="btnPass" value=" 通  过 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"></td>
        </tr>
      </form>
</table>
  <div class="clear"></div>
  </div>
<?{/if}?>

<?{include file="admin/footer.tpl"}?>
