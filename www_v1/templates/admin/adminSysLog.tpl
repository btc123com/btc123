<?{include file="admin/header.tpl"}?>
<?{if $viewAdminLog == "true"}?>
<table width="100%" border="0"  cellpadding="0" cellspacing="0">

<tr ><td>
  <table width="100%" height="28" border="0" cellspacing="0" cellpadding="0" background="images/mid.gif">
    <tr>
      <td align="left" width="3"><img src="images/left_03.gif"  /></td>
      <td  class="tb_tr_title">日志查看</td>
      <td width="3" align="right"><img src="images/right.gif" /></td>
    </tr>
  </table>
  </td>
</tr>

<tr ><td>
  <table width="100%"   border="0" cellspacing="0" cellpadding="0" class="left_td">
    <tr>
      <td >
      <table width="600"  height="35" border="0" cellpadding="0" cellspacing="0"  >
      <form method="get" action="?">
        <tr>
          <td width="15%" align="right"></td>
          <td width="59%" >
            <label>
              <select name="searchField" id="searchField">
<?{html_options options=$arrSearchField selected=$smarty.get.searchField}?>
        </select>
		
		<select name="searchBy" id="searchBy">
				<?{html_options options=$arrSearchBy selected=$smarty.get.searchBy}?>
			</select>
			
			
			    <input name="keyWord" type="text" id="keyWord" size="16" maxlength="50" value="<?{$smarty.get.keyWord}?>" />
            </label>
          </td>
         
          <td width="26%" ><input type="image" src="images/search_1.gif" width="68" height="25" /></td>
        </tr>
        </form>
      </table>
   </td>

    </tr>
  </table>
  </td>
</tr>



  <tr>
    <td colspan="3" align="left" valign="top"><table width="100%" border="0"   cellpadding="0" cellspacing="0" class="neirong_bd">
      <tr >
        <td  class="ly_td" id="sort_masterMail" onClick="SetSort('masterMail')">管理员</td>
        <td class="ly_td">操作</td>
        <td class="ly_td" id="sort_actIP" onClick="SetSort('actIP')">操作IP</td>
        <td class="ly_Rtd" id="sort_cDate" onClick="SetSort('actDate')">操作时间</td>
        </tr>
      <?{section name=adminLogList loop=$arrAdminLogList}?>
      <tr>
        <td  class="ly_td"><?{$arrAdminLogList[adminLogList].masterMail}?></td>
        <td class="ly_td"><?{$arrAdminLogList[adminLogList].actStr}?></td>
        <td  class="ly_td"><?{$arrAdminLogList[adminLogList].actIP}?></td>
        <td class="ly_Rtd"><?{$arrAdminLogList[adminLogList].cDate|date_format:"%Y-%m-%d %H:%M:%S"}?></td>
        </tr>
      <?{/section}?>
     <tr>
        <td colspan="4" align="right"  height="32px"class="ly_Rtd"><?{$pager}?></td>
      </tr>
    </table></td>
    </tr>
</table>
<?{/if}?>
<?{include file="admin/footer.tpl"}?>