<?{include file="admin/header.tpl"}?>
<?{if $viewMaster == "true"}?>
<script language="javascript">
function chooseall(obj,target){
	var checkobj = document.getElementsByName(target);
	for(var i=0;i<checkobj.length;i++){
		checkobj[i].checked = obj.checked;
	}
}
</script>
<form action="?act=operate&p=<?{$p}?>" method="post" onSubmit="return confirm('确定要操作吗？')">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="xt_glz">

	<tr ><td>
  <table width="100%" height="28" border="0" cellspacing="0" cellpadding="0" background="images/mid.gif">
    <tr>
      <td align="left" width="3"><img src="images/left_03.gif"  /></td>
      <td  class="tb_tr_title">管理员管理</td>
      <td width="3" align="right"><img src="images/right.gif" /></td>
    </tr>
  </table>
  </td>
</tr>


  <tr>
    <td ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="left_td">
      <tr  >
        <td   class="ly_td" >管理员账号</td>
        <td  class="ly_td" >姓名</td>
        <td   class="ly_td" >所属组</td>
		  <td   class="ly_td" > 登录次数</td>
        <td  class="ly_td" > 最后登录时间</td>
        <td  class="ly_td"> 锁定<input type="checkbox" onclick="chooseall(this,'chkLockID[]')"></td>
        <td  class="ly_Rtd"> 删除<input type="checkbox" onclick="chooseall(this,'chkDelID[]')"> </td>
      </tr>
      <?{section name=masterList loop=$arrMasterList}?>
      <tr>
        <td align="center" height="60" class="ly_td"><input type="hidden" name="hidMasterMail[<?{$smarty.section.masterList.index}?>]" value="<?{$arrMasterList[masterList].masterMail}?>"><?{$arrMasterList[masterList].masterMail}?></td>
        <td align="center" class="ly_td"><input type="text" maxlength="20" name="tbMasterName[<?{$smarty.section.masterList.index}?>]" value="<?{$arrMasterList[masterList].masterName}?>" size="12"/></td>
        <td align="center" class="ly_td">
         <select name="tbAdminGroup[<?{$smarty.section.masterList.index}?>][]" size="5" multiple><option value="">请选择管理组</option><?{html_options options=$arrAdminGroup selected=$arrMasterList[masterList].masterGroup}?></select>
         </td>
        <td align="center" class="ly_td"><?{$arrMasterList[masterList].masterLoginTimes}?></td>
        <td align="center" class="ly_td"><p><?{$arrMasterList[masterList].masterLastDate|date_format:"%Y-%m-%d %H:%M:%S"}?></p></td>
        <td align="center" class="ly_td">
          <label>
       <input type="checkbox" name="chkLockID[]" id="chkLockID" value="<?{$arrMasterList[masterList].masterMail}?>" <?{if $arrMasterList[masterList].masterState=="0"}?>checked<?{/if}?> />
          </label>
       </td>
        <td align="center" class="ly_Rtd">
        <label>
        <input type="checkbox" name="chkDelID[]" id="chkDelID" value="<?{$arrMasterList[masterList].masterMail}?>" />
          </label></td>
      </tr>
			<?{/section}?>
      <tr>
        <td colspan="5" align="right"  height="32px"class="ly_Rtd"><?{$pager}?></td>
        <td class="ly_Rtd"><input type="submit" name="btnUpdate" value=" 修  改 " class="button" <?{if $updateMaster!="true"}?>disabled<?{/if}?> /></td>
        <td class="ly_Rtd"><input type="submit" name="btnDelete" value=" 删  除 " class="button" <?{if $delMaster!="true"}?>disabled<?{/if}?> /></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?{/if}?>

<?{if $addMaster == "true"}?>
<form action="?act=add&p=<?{$p}?>" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="xt_glz">



	<tr ><td>
  <table width="100%" height="28" border="0" cellspacing="0" cellpadding="0" background="images/mid.gif">
    <tr>
      <td align="left" width="3"><img src="images/left_03.gif"  /></td>
      <td  class="tb_tr_title">添加管理员</td>
      <td width="3" align="right"><img src="images/right.gif" /></td>
    </tr>
  </table>
  </td>
</tr>

  <tr>
    <td colspan="3" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="left_td">
      <tr>
        <td width="33%" height="40"  align="center" class="ly_td">管理员账号:
         
            <label>
              <input name="tbMasterMail" value="" type="text" maxlength="50">
            </label>
          </td>
        <td width="34%" align="center" class="ly_td">管理员密码:
          <label>
              <input name="tbMasterPwd" value="" type="text">
            </label></td>
        <td width="33%"  align="center" class="ly_Rtd">管理员姓名:
          <label>
              <input type="text" name="tbMasterName" value="" maxlength="20" />
            </label></td>
        </tr>
          <tr>
        <td  align="center" height="40" class="ly_td" valign="top">管理租名称:
         
            <label>
              <select name="tbAdminGroup[]" size="6" multiple><option value="">请选择隶属于管理组</option><?{html_options options=$arrAdminGroup}?>
		</select>
            </label>
          </td>
        <td w align="center" class="ly_td">管理员手机:
          <label>
              <input name="tbMasterPhone" value="" type="text" maxlength="12" />
            </label></td>
        <td align="center" class="ly_Rtd">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="3" align="center"  height="42px"class="ly_Rtd"><input value=" 添  加 " type="submit" class="button" <?{if $addMaster!="true"}?>disabled<?{/if}?> ></td>
        </tr>
    </table></td>
  </tr>
</table>
</form>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>
