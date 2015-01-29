<?php /* Smarty version 2.6.18, created on 2012-06-20 15:40:17
         compiled from admin/tree.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
<?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trees']):
?>
<li><?php if ($this->_tpl_vars['trees']['child']): ?><img style="cursor:pointer;" title="展开/收缩下级菜单" src="./images/arrow.jpg" id="image_<?php echo $this->_tpl_vars['trees']['stpID']; ?>
" onclick="shownode(<?php echo $this->_tpl_vars['trees']['stpID']; ?>
)"><?php else: ?><img style="margin:0;padding:0;" src="./images/arrow_file.jpg"><?php endif; ?><span><a title="查看详细站点和下级菜单信息" href="adminsite_default.php?typeid=<?php echo $this->_tpl_vars['trees']['stpID']; ?>
" target="innermainFrame"><?php echo $this->_tpl_vars['trees']['stpName']; ?>
</a></span><ul id="child_<?php echo $this->_tpl_vars['trees']['stpID']; ?>
"></ul></li>
<?php endforeach; endif; unset($_from); ?>
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