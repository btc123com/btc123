<?{include file="admin/header.tpl"}?>
<div id="box">
<div class="right">
<form name="setting" action="adminUserSetting.php?act=update" method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>站点基本配置</h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="25%" height="66"><div align="right">自定义设置：</div></td>
        <td width="75%" height="66">
<input style="width:20px; border:none" name="userSite" type="radio" value="1" <?{if $sets==1}?>checked="checked"<?{/if}?> />默认方式  <?{$smarty.const.SITE_DOMAIN}?>/i/?userdomain<br/>
<input style="width:20px; border:none" name="userSite" type="radio" value="2" <?{if $sets==2}?>checked="checked"<?{/if}?>/>启用二级目录 <?{$smarty.const.SITE_DOMAIN}?>/i/userdomain/（注：您的服务器必须支持url重写）<br/>
<input style="width:20px; border:none" name="userSite" type="radio" value="3" <?{if $sets==3}?>checked="checked"<?{/if}?>/>启用二级域名 userdomain<?{$smarty.const.SITE_DOMAIN|substr:3}?>（注：您的服务器必须支持url重写）
        </td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td height="36"><input type="submit" class="button" id="button" value="提交" /> <a href="http://bbs.5w.com/thread-302-1-1.html" target="_blank">url重写范例</a>
        </td>
      </tr>
    </table>
     </td>
     </tr>
    </table>
 </form>

  <div class="clear"></div>
  </div>
<?{include file="admin/footer.tpl"}?>