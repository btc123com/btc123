<?{include file="admin/header.tpl"}?>
<div id="box">
<div class="right">
<form name="setting" action="adminSiteSetting.php?act=update" method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="edit">
  <tr>
    <td class="title_edit">
     <h1>站点基本配置</h1>
   </td>
  </tr>
  <tr>
    <td class="edit_main"><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="19%" height="36"><div align="right">网站LOGO：</div></td>
        <td width="81%" height="36">
        <input type="text" name="logo" value="<?{$sets.logo}?>" />
        </td>
      </tr>
      <tr>
        <td height="36"><div align="right">网站名称：</div></td>
        <td height="36"><input type="text" name="siteName" value="<?{$sets.siteName}?>" /></td>
      </tr>
      <tr>
        <td height="36"><div align="right">网站首页：</div></td>
        <td height="36"><input type="text" name="siteDomain" value="<?{$sets.siteDomain}?>" />
            <span><font color="blue">(不需要添加 http://，请填写完整的首页访问路径，如：www.5w.com)</font></span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">静态页目录：</div></td>
        <td height="36"><input type="text" name="htmlpath" value="<?{$sets.htmlpath}?>" /><font color="blue">(请在末尾加"/", 该目录权限必须为777</font>
        )</td>
      </tr>
      <tr>
        <td height="36"><div align="right">管理员邮箱：</div></td>
        <td height="36"><input type="text" name="adminEmail" value="<?{$sets.adminEmail}?>" /></td>
      </tr>
      <tr>
        <td height="36"><div align="right">ICP备案号：</div></td>
        <td height="36"><input type="text" name="icp" value="<?{$sets.icp}?>" /></td>
      </tr>
      <tr>
        <td height="36"><div align="right">ICP备案链接：</div></td>
        <td height="36"><input type="text" name="icpurl" value="<?{$sets.icpurl}?>" /></td>
      </tr>

      <tr>
        <td height="36"><div align="right">网站标题：</div></td>
        <td height="36"><input type="text" style="width:360px" name="indexTitle" value="<?{$sets.indexTitle}?>" />
            <span class="gray">(显示在浏览器标题栏，各分类页面可单独设定) </span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">网站关键字：</div></td>
        <td height="36"><input type="text" style="width:360px" name="indexKeywords" value="<?{$sets.indexKeywords}?>" />
            <span class="gray"></span></td>
      </tr>
      <tr>
        <td height="36"><div align="right">网站描述：</div></td>
        <td height="36"><input type="text" style="width:360px" name="indexDescription" value="<?{$sets.indexDescription}?>" />
            <span class="gray"></span></td>
      </tr>

      <tr>
        <td height="36"><div align="right">页面底部统计代码：</div></td>
        <td height="36"><textarea name="countCode" cols="45" rows="5"><?{$sets.countCode}?></textarea>
        </td>
      </tr>
      <tr>
        <td height="36">&nbsp;</td>
        <td height="36">
        <input type="submit" class="button" id="button" value="提交" onclick="htmlnotice(1);"style="float:left" />
        <div style="position:relative; width:259px; float:left"><img src="images/help.gif" onclick="showhelp('adminSiteSetting',1);" title="点击查看帮助" style="cursor:pointer"/>
        <div id="help" style="display:none;height:auto;width:259px;position:absolute;top:20px;right:32px;z-index:201;">
         <div class="tipstop"></div>
         <div class="tipsmain" id="helpcontent"></div>
        </div></div>
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