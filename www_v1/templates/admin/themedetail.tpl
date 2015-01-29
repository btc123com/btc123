<?{include file="admin/header.tpl"}?>
<script src="../static/codepress/codepress.js" type="text/javascript"></script>
<script type="text/javascript">
function mygetcode(){
	document.forms['mypost'].content.value = cp1.getCode();
	return true;
}
</script>

<div id="box">

  <div class="right">
<textarea id="cp1" class="codepress html" wrap="off" style="width: 98%; height: 500px; border: 1px solid rgb(204, 204, 204); overflow-x: hidden; overflow-y: scroll;">
<?{$content}?>
</textarea>
<form method="post" action="" name="mypost" onsubmit="return mygetcode()">
<input type="hidden" name="theme" value="<?{$theme}?>">
<input type="hidden" name="file" value="<?{$file}?>">
<textarea name="content" style="display:none"></textarea>
<input type="submit" value="提交修改" style="width:auto"><input type="reset" value="取消修改" style="width:auto">
</form>

    </div>
</div>

</body>
</html>