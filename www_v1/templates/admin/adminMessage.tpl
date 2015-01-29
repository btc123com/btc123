<?{include file="admin/header.tpl"}?>
<?{if $viewMessage == "true"}?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>留言管理</h1>
      <div class="search">
        <select name="searchField" id="searchField">
		<?{html_options options=$arrSearchField selected=$smarty.get.searchField}?>
		</select><input name="keyWord" type="text" id="keyWord" size="12" maxlength="50" value="<?{$smarty.get.keyWord}?>" />
		<input name="keyWord" type="text" id="keyWord" size="40" maxlength="50" value="<?{$smarty.get.keyWord}?>" /><input type="hidden" value="1" name="search" />
		<input type="submit" value=" 搜 索 " class="button"><?{if $smarty.get.search}?><input type="button" onclick="location.href='adminMessage.php';" class="button" value="取消搜索" /><?{/if}?></div></td>
        </tr>
        </form>
  </table>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
    <tr>
        <td colspan="7" align="right"><?{if $delMessage=="true"}?>
        <input type="submit" name="btnReply" value=" 回 复 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"><?{/if}?></td>
      </tr>
      <tr>
		<td width="10%" class="tr1">板块</td>
		<td width="15%" class="tr1">标题</td>
		<td width="22%" class="tr1">内容</td>
		<td width="23%" class="tr1">回复</td>
		<td width="10%" class="tr1">联系方式</td>
		<td width="10%" class="tr1">提交日期</td>
		<td width="10%" class="tr1">选择<input style="width:auto;border:none" type="checkbox" onclick="chooseall(this,'chkDelID[]')"></td>
      </tr>
      <?{foreach name=arrMessage item=list from=$arrMessage}?>
      <tr>
<input type="hidden" name="hidMid[]" value="<?{$list.mid}?>">
		<td class="tr_a"><div align="center"><?{if $list.urlfrom}?><?{$list.urlfrom}?><?{else}?>未知<?{/if}?></div></td>
		<td class="tr_a"><div align="center"><?{$list.title}?></div></td>
		<td class="tr_a"><div align="center"><textarea style="width:100%; height:80px;"><?{$list.content}?></textarea></div></td>
		<td class="tr_a"><div align="center"><textarea style="width:100%; height:80px;" name="reply[<?{$list.mid}?>]"><?{$list.reply}?></textarea></div></td>
		<td class="tr_a"><div align="center"><?{$list.contact}?></div></td>
		<td class="tr_a"><div align="center"><?{$list.createDate|date_format:"%Y-%m-%d %H:%M:%S"}?></div></td>
		<td class="tr_a"><div align="center"><input type="checkbox" name="chkDelID[]" id="chkDelID" value="<?{$list.mid}?>" style="width:auto;border:none"/></div></td>
      </tr>
      <?{/foreach}?>
      <tr>
        <td colspan="7" align="right"><?{$pager}?><?{if $delMessage=="true"}?>
        <input type="submit" name="btnReply" value=" 回 复 " class="button">&nbsp;<input type="submit" name="btnDelete" value=" 删  除 " class="button"><?{/if}?></td>
      </tr>
      </form>
 </table>
   <div class="clear"></div>
  </div>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>