<?{include file="admin/header.tpl"}?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="xt_glz">



<tr ><td>
  <table width="100%" height="28" border="0" cellspacing="0" cellpadding="0" background="images/mid.gif">
    <tr>
      <td align="left" width="3"><img src="images/left_03.gif"  /></td>
      <td  class="tb_tr_title">版本更新</td>
      <td width="3" align="right"><img src="images/right.gif" /></td>
    </tr>
  </table>
  </td>
</tr>

  <tr>
    <td ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="left_td">
      <tr >
        <td class="ly_td" >更新时间</td>
        <td  class="ly_Rtd">更新内容</td>
        </tr>

  <?{foreach name=versionList item=row from=$versionList}?>
	<tr >
		<td class="ly_td"><?{$row.date}?></td>
		<td  class="ly_Rtd">&nbsp;&nbsp;<a href="http://www.5w.com/news/<?{$row.id}?>.html" style="color:#000000" target="_blank"><?{$row.title}?></a></td>
	</tr>
	<?{foreachelse}?>
	<tr >
		<td align="center" colspan="2" class="ly_Rtd">还没有版本更新信息!</td>
	</tr>
	<?{/foreach}?>
        
        </table></td>
  </tr>
</table>


<?{include file="admin/footer.tpl"}?>
