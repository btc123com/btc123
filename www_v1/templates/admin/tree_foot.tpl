<?{include file="admin/header.tpl"}?>
<div id="box">

<script type="text/javascript">
var lastclick;
function clickleaf(sid){
	if(lastclick)
		lastclick.attr('src','./images/arrow_file.jpg');
	$('#image_'+sid).attr('src','./images/arrow_file_on.jpg');
	lastclick = $('#image_'+sid);
}
</script>
<div class="right">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#d1d1d1">
      <tr>
        <td width="152" valign="top" bgcolor="#FFFFFF">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/sbg.jpg" width="152" height="26" /></td>
          </tr>
          <tr>
            <td>
<a href="./adminsite_foot.php?typeid=0" target="innermainFrame">回到根节点</a>
<ul>
<?{foreach item=trees from=$tree}?>
<li><?{if $trees.child}?><img style="cursor:pointer" title="展开/收缩下级菜单" src="./images/folder-closed.gif" id="image_<?{$trees.stpID}?>" onclick="shownode(<?{$trees.stpID}?>)"><?{else}?><img src="./images/arrow_file.jpg" id="image_<?{$trees.stpID}?>"><?{/if}?><span><a onclick="clickleaf(<?{$trees.stpID}?>)" title="查看详细站点和下级菜单信息" href="adminsite_foot.php?typeid=<?{$trees.stpID}?>" target="innermainFrame"><?{$trees.stpName}?></a></span><ul id="child_<?{$trees.stpID}?>"></ul></li>
<?{/foreach}?>
</ul>
</td>
          </tr>
        </table>
        </td>
      </table>
    </div>
</div>


</body>
</html>
