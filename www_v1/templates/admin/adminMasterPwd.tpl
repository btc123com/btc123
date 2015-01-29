<?{include file="admin/header.tpl"}?>
<div id="box">
<div class="right">

<?{if $updateMasterPwd == "true"}?>
<form action="?act=operate" method="post" onSubmit="return ChkModifyMasterPwd()">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>管理员密码修改</h1>
   </td>
  </tr>


  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="19%" height="36"><div align="right">管理员旧密码:</div></td>
        <td width="81%" height="36">
          <input type="password" name="tbOldPwd" id="tbOldPwd">
        </td>
      </tr>
      <tr>
        <td width="19%" height="36"><div align="right">管理员新密码:</div></td>
        <td width="81%" height="36">
          <input type="password" name="tbNewPwd" id="tbNewPwd">
        </td>
      </tr>
      <tr>
        <td width="19%" height="36"><div align="right">重复新密码:</div></td>
        <td width="81%" height="36">
          <input type="password" name="tbRePwd" id="tbRePwd">
        </td>
        </tr>
      <tr>
      <td height="36">&nbsp;</td>
        <td height="36"><input type="submit" class="button" id="btnSubmit" name="btnUpdate" value=" 修  改 "></td>
        </tr>
    </table></td>
  </tr>
</table>
</form>
<script type="text/javascript">
<!--
function ChkModifyMasterPwd(){
	var oldPwd = $("tbOldPwd").value;
	var newPwd = $("tbNewPwd").value;
	var rePwd = $("tbRePwd").value;
	if(oldPwd.length < 5){
		alert("管理员旧密码格式错误！");
		return false;
	}
	if(newPwd.length < 5){
		alert("管理员新密码格式错误！");
		return false;
	}
	if(newPwd != rePwd){
		alert("重复密码错误！");
		return false;
	}
}
-->
</script>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>
