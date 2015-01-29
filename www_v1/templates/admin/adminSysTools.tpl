<?{include file="admin/header.tpl"}?>
<form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
		<tr class="tr_title">
			<td width="10%">系统工具</td>
		</tr>
		<tr class="tr_title">
			<td align="center"><input type="submit" name="btnClearCache" class="button" value=" 清除所有缓存 " /></td>
		</tr>
		<tr class="tr_title">
			<td align="center"><input type="submit" name="btnClearCompiled" class="button" value=" 清除编译模板 " /></td>
		</tr>
		<tr class="tr_title">
			<td align="center"><input type="submit" name="btnDataBackUp" class="button" value=" 备份所有数据 " /></td>
		</tr>
	</table>
</form>
<?{include file="admin/footer.tpl"}?>
