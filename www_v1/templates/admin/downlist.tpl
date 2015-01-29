<?{include file="admin/header.tpl"}?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td width="100%" class="tr1">更新补丁信息</td></tr>
      <tr><td class="tr_a" valign="top">
<ul style="text-align:left;background-color:#FFD">
<?{if $update==1}?>
<form action="adminUpdate.php?a=apply" method="POST">
<li>已成功下载的更新文件：</li>
<?{foreach name=file_succ item=row from=$file_succ}?>
<li>【安全更新】../data/update/<?{$row}?><input type="hidden" value="<?{$row}?>" name="upfiles[]"></li>
<?{/foreach}?>
<?{if $file_fail !=''}?>
<li><font color=red>下载失败的文件：</font></li>
<?{foreach name=fail item=frow from=$file_fail}?>
<li><?{$frow}?></li>
<?{/foreach}?>
<input type="button" class="button"  style="cursor: pointer;" value=" 返回重新下载 " onclick="location.href='main.php'">
<?{else}?>
<li><input type="submit" class="button" style="cursor: pointer;" value=" 点此安装更新补丁 " name="sub"></li>
<?{/if}?>
</form>
<?{elseif $update==2}?>
<form action="adminUpdate.php?a=applydata" method="POST">
<li>已成功下载的数据文件：</li>
<?{foreach name=data_succ item=row from=$data_succ}?>
<li>【数据更新】../data/update/sql/<?{$row}?><input type="hidden" value="<?{$row}?>" name="updata[]"></li>
<?{/foreach}?>
<?{if $data_fail !=''}?>
<li><font color=red>下载失败的文件：</font></li>
<?{foreach name=data_fail item=frow from=$data_fail}?>
<li><?{$frow}?></li>
<?{/foreach}?>
<input type="button" class="button"  style="cursor: pointer;" value=" 返回重新下载 " onclick="location.href='main.php'">
<?{else}?>
<li><input type="submit" class="button" style="cursor: pointer;" value=" 点此安装数据更新 " name="submit"></li>
<?{/if}?>
</form>
<?{/if}?>
</ul>
      </td>
      </tr>
</table>
<?{include file="admin/footer.tpl"}?>