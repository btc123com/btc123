<?{include file="admin/header.tpl"}?>
<div id="box">

<script type="text/javascript">
function shownode(id){
	if($('#child_'+id).html() == ''){
		var str = '';
		url = "site_default.php?a=getchild&id="+id;
		$.getJSON(url,function(json){
			for(key in json){
				// editResult(json[key]);
				str += '<li>';
				if(json[key].child>0)
					str += '<img style="cursor:pointer" title="展开/收缩下级菜单" src="./images/arrow.jpg" id="image_'+json[key].stpID+'" onclick="shownode('+json[key].stpID+')"><span><a title="查看详细站点和下级菜单信息" href="adminsite_default.php?typeid='+json[key].stpID+'" target="innermainFrame">'+json[key].stpName+'</a></span><ul id="child_'+json[key].stpID+'"></ul></li>';
				else
					str += '<img src="./images/arrow_file.jpg" id="image_'+json[key].stpID+'"><span><a title="查看详细站点和下级菜单信息" href="adminsite_default.php?typeid='+json[key].stpID+'" target="innermainFrame" onclick="clickleaf('+json[key].stpID+')">'+json[key].stpName+'</a></span><ul id="child_'+json[key].stpID+'"></ul></li>';
			}
			$('#child_'+id).html(str);
			$('#image_'+id).attr('src','./images/arrow_select.jpg');
		})
	}else{
		if($('#child_'+id).css("display")!='none'){
			$('#image_'+id).attr('src','./images/arrow.jpg');
			$('#child_'+id).hide();
		}else{
			$('#image_'+id).attr('src','./images/arrow_select.jpg');
			$('#child_'+id).show();
		}
	}
}
var lastclick;
function clickleaf(sid){
	if(lastclick)
		lastclick.attr('src','./images/arrow_file.jpg');
	$('#image_'+sid).attr('src','./images/arrow_file_on.jpg');
	lastclick = $('#image_'+sid);
}

// 刷新节点
function refreshnode(id){
	$('#child_'+id).find("li").each(function(){
		$(this).remove();
	})
	shownode(id);
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


<span class="root"><a href="./adminsite_default.php?typeid=0" target="innermainFrame">回到根节点</a></span>
<ul id="tree">
<?{foreach item=trees from=$tree}?>
<li><?{if $trees.child}?><img style="cursor:pointer;" title="展开/收缩下级菜单" src="./images/arrow.jpg" id="image_<?{$trees.stpID}?>" onclick="shownode(<?{$trees.stpID}?>)"><?{else}?><img style="margin:0;padding:0;" src="./images/arrow_file.jpg"><?{/if}?><span><a title="查看详细站点和下级菜单信息" href="adminsite_default.php?typeid=<?{$trees.stpID}?>" target="innermainFrame"><?{$trees.stpName}?></a></span><ul id="child_<?{$trees.stpID}?>"></ul></li>
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
