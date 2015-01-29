<?{include file="admin/header.tpl"}?>
<?{if $viewUser == "true"}?>
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
      <td height="52" bgcolor="#FFFFFF"><h1>会员列表</h1>
      <div class="search">
        <select name="searchField" id="searchField">
<?{html_options options=$arrSearchField selected=$smarty.get.searchField}?>
        </select>
		<input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?{$smarty.get.keyWord}?>" />
				状态 <select name="userState" id="userState">
          <option value="">请选择</option>
<?{html_options options=$arrUserState selected=$smarty.get.userState}?>
        </select>
		<input type="submit" value=" 搜 索 " class="button" /></div></td>
        </tr>
        </form>
      </table>

 <form action="?act=operate" method="post" onSubmit="return confirm('确定要操作吗？')">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list" id="t">
  <tr >
      <td colspan="8" align="right"  class="ly_Rtd" style="padding:6px 0;"><input type="submit" name="btnLock" value=" 锁  定 " class="button" <?{if $lockUser!="true"}?>disabled<?{/if}?> /></td>
    </tr>
    <tr >
      <td  class="tr1" id="sort_userMail"   onClick="SetSort('userMail')">用户名</td>
      <td class="tr1" >地址</td>
      <td class="tr1" >最后登录IP</td>
      <td class="tr1"  id="sort_userLoginTimes"  onClick="SetSort('userLoginTimes')">登陆次数</td>
      <td class="tr1"  id="sort_userLastDate" onClick="SetSort('userLastDate')">最后登陆</td>
      <td class="tr1"  id="sort_userRegDate"  onClick="SetSort('userRegDate')">注册时间</td>
      <td class="tr1">选择<input style="width:auto; border:none"  type="checkbox" onclick="chooseall(this,'chkLockID[]')"></td>
    </tr>
    <?{section name=userList loop=$arrUserList}?>
    <tr >
      <input type="hidden" name="hidUserID[]" value="<?{$arrUserList[userList].userID}?>">
      <td class="tr_a"   title="<?{$arrUserList[userList].userName}?>"><?{$arrUserList[userList].userName}?>(<?{$arrUserList[userList].from}?>)</td>
      <td class="tr_a"  ><a target="_blank" href="http://<?{$smarty.const.SITE_DOMAIN}?>/i/?<?{$arrUserList[userList].domain}?>"><?{$smarty.const.SITE_DOMAIN}?>/i/?<?{$arrUserList[userList].domain}?></a></td>
      <td class="tr_a"  ><?{$arrUserList[userList].userRegIP}?></td>
      <td class="tr_a"  ><?{$arrUserList[userList].userLoginTimes}?></td>
      <td  class="tr_a"  title="<?{$arrUserList[userList].userLastDate|date_format:"%Y-%m-%d %H:%M:%S"}?>"><?{$arrUserList[userList].userLastDate|date_format:"%Y-%m-%d %H:%M:%S"}?></td>
      <td  class="tr_a"  title="<?{$arrUserList[userList].userRegDate|date_format:"%Y-%m-%d %H:%M:%S"}?>"><?{$arrUserList[userList].userRegDate|date_format:"%Y-%m-%d %H:%M:%S"}?></td>

      <td class="tr_a"><input style="width:auto; border:none"  type="checkbox" name="chkLockID[]" id="chkLockID" value="<?{$arrUserList[userList].userID}?>" <?{if $arrUserList[userList].userStatus=="0"}?>checked<?{/if}?> /></td>
    </tr>
    <?{/section}?>
    <tr >
      <td colspan="8" align="right"  class="ly_Rtd" style="padding:6px 0;"><?{$pager}?><input type="submit" name="btnLock" value=" 锁  定 " class="button" <?{if $lockUser!="true"}?>disabled<?{/if}?> /></td>
    </tr>
  </table>
</form>
<div class="clear"></div>
  </div>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>
