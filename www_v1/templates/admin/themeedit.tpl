<?{include file="admin/header.tpl"}?>
<script type="text/javascript">
var lastclick=0;
function clickleaf(sid){
	if(undefined != lastclick)
		$('#image_'+lastclick).attr('src','./images/arrow_file.jpg');
	$('#image_'+sid).attr('src','./images/arrow_file_on.jpg');
	lastclick = sid;
}
</script>
<div id="box">

  <div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>编辑主题</h1>
</td>
    </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        
        <?{foreach name=theme item=list key=key from=$files}?>
        <td>
				 	<a href="themedetail.php?theme=<?{$theme}?>&file=<?{$key}?>" target="editFrame" onclick="clickleaf(<?{$smarty.foreach.theme.index}?>)"><img src="<?{if $smarty.foreach.theme.index==0}?>./images/arrow_file_on.jpg<?{else}?>./images/arrow_file.jpg<?{/if}?>" id="image_<?{$smarty.foreach.theme.index}?>"/><?{$list}?></a>
				</td>
				<?{/foreach}?>

      </tr>
    </table>
    </div>
    <iframe id="editFrame" name="editFrame" src="themedetail.php?theme=<?{$theme}?>&file=index.tpl" style="width: 98%; height: 550px;"></iframe>
  <div class="clear"></div>
  <?{include file="admin/footer.tpl"}?>
</div>
</body>
</html>
