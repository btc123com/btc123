<?{include file="admin/header.tpl"}?>

<div id="box">

  <div class="right">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_title">
  <tr>
    <td height="52" bgcolor="#FFFFFF"><h1>主题设置</h1>
</td>
    </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td style="padding-bottom:10px;">
        <?{foreach name=theme item=list from=$themes}?>
        <div class="<?{if $list.dir == $smarty.const.THEME_PATH}?>selectskin<?{else}?>unselectskin<?{/if}?>">
				 			<img src="<?{if $list.dir == $smarty.const.THEME_PATH}?>../theme/<?{$list.dir}?>pre.jpg<?{else}?>../theme/<?{$list.dir}?>pre_gray.jpg<?{/if}?>" alt="" width="135" height="90" border="0" class="skinimg"/>
				 			  <div class="skinDes">
				 			  <div style="height:38px;overflow:hidden"><b style="color:#004000"><?{$list.name}?></b></div>
				 			  <span style="height:16px;overflow:hidden;cursor:default"><B>设计者:</B><?{$list.author}?></span><br/>
				 			  <B>发布时间:</B> <?{$list.pubDate}?><br/></div>
                <p class="set"> <?{if $list.dir != $smarty.const.THEME_PATH}?><a href="?theme=<?{$list.dir}?>"><img border="0" src="images/ico_app.gif" />应用并生成静态</a>&nbsp;&nbsp;&nbsp;&nbsp;<?{/if}?><a href="themeedit.php?theme=<?{$list.dir}?>"><img border="0" src="images/ico_edit.gif"/>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<?{if $list.dir != 'default/'}?><a href="?delete=<?{$list.dir}?>"><img  src="images/ico_del.gif" />删除</a><?{/if}?></p>
						  </div>
				<?{/foreach}?>
</td>
      </tr>
    </table>
    </div>
  <div class="clear"></div>
  <?{include file="admin/footer.tpl"}?>
</div>
</body>
</html>
