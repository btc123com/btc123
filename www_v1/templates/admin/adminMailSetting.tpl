<?{include file="admin/header.tpl"}?>
<div id="box">
<div class="right">
<form name="setting" action="adminSiteSetting.php?act=update" method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>外发邮箱设置</h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td height="36"><div align="right">SMTP服务器：</div></td>
        <td height="36"><input type="text" name="mail_server" value="<?{$sets.mail_server}?>" />
            <span class="gray">（示范：smtp.5w.com）</span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">端口：</div></td>
        <td height="36"><input type="text" name="mail_port" value="<?{$sets.mail_port}?>" />
            <span class="gray">（默认为25）</span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">邮箱：</div></td>
        <td height="36"><input type="text" name="mail_user" value="<?{$sets.mail_user}?>" />
            <span class="gray">（示范：service@5w.com）</span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">密码：</div></td>
        <td height="36"><input type="text" name="mail_password" value="<?{$sets.mail_password}?>" />
            <span class="gray"></span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">发件人昵称：</div></td>
        <td height="36"><input type="text" name="mail_nick" value="<?{$sets.mail_nick}?>" />
            <span class="gray"></span></td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td height="36"><input type="submit" class="button" id="button" value="提交" />
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