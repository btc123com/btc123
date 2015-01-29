 <?php

/*
 * ClassName: Pager
 * Date: 2008-06-07
 * Author: ziyan.suo@163.com
 */

class Pager{

	private $recordCount;
	private $p;
	private $pageCount;
	private $pageSize;
	private $pageShow;
	private $startNum;
	private $endNum;
	private $url;

	/*
	 * Function: Pager
	 * Parameter: int;
	 * Parameter: int;
	 * Parameter: int;
	 */
	public function __construct($recordCount,$pageSize=20,$pageShow=10){
		if(isset($_GET['pageSize'])){
			$pageSize = (int)$_GET['pageSize'];
			$pageSize = $pageSize<=0?20:$pageSize;
		}

		$this->recordCount = $this->getRecordCount($recordCount);
		$this->pageSize = $this->getPageSize($pageSize);
		$this->pageShow = $this->getPageShow($pageShow);
		$this->pageCount = $this->getPageCount();
		$this->get();
	}

	/*
	 * Function: getRecordCount
	 * Parameter: int;
	 * Return: int
	 */
	private function getRecordCount($recordCount){
		if(ereg("^[1-9]+[0-9]*$",$recordCount)==false){
			$recordCount = 0;
		}
		return $recordCount;
	}

	/*
	 * Function: getPageSize
	 * Parameter: int;
	 * Return: int
	 */
	private function getPageSize($pageSize){
		if(ereg("^[1-9]+[0-9]*$",$pageSize)==false){
			$pageSize = 10;
		}
		return $pageSize;
	}

	/*
	 * Function: getPageShow
	 * Parameter: int;
	 * Return: int
	 */
	private function getPageShow($pageShow){
		if(ereg("^[1-9]+[0-9]*$",$pageShow)==false){
			$pageShow = 10;
		}
		return $pageShow;
	}

	/*
	 * Function: getPageCount
	 * Return: int
	 */
	private function getPageCount(){
		return $this->pageCount = ceil($this->recordCount/$this->pageSize);
	}

	/*
	 * Function: get
	 * Return: string
	 */
	private function get(){
		$str = '';
		foreach($_GET as $key => $value){
			if (is_array($value)) {
				foreach ($value as $temp_type) {
					$temp_type = urlencode($temp_type);
					$str .= "&".$key."[]=".$temp_type;
				}
			} else {
				$value = urlencode($value);
				if($key == "p"){
					$this->p = $value;
				}
				else if($key != "p"){
					$str .= "&".$key."=".$value;
				}
			}

		}
		if($this->p < 1){
			$this->p = 1;
		}
		if($this->p > $this->pageCount){
			$this->p = $this->pageCount;
		}
		$this->url = $str;
	}

	/*
	 * Function: getStartNum
	 * Return: int
	 */
	private function getStartNum(){
		if($this->pageCount <= $this->pageShow){
			$this->startNum = 1;
		}
		else if($this->p <= $this->pageShow/2){
			$this->startNum = 1;
		}
		else if($this->pageCount - $this->p <= $this->pageShow/2){
			$this->startNum = $this->pageCount - $this->pageShow + 1;
		}
		else{
			$this->startNum = $this->p - ceil(($this->pageShow-2)/2);
		}
		return $this->startNum;
	}

	/*
	 * Function: getEndNum
	 * Return: int
	 */
	private function getEndNum(){
		if($this->pageCount <= $this->pageShow){
			$this->endNum = $this->pageCount;
		}
		else if($this->p <= $this->pageShow/2){
			$this->endNum = $this->pageShow;
		}
		else if($this->pageCount - $this->pageShow <= $this->pageShow/2){
			$this->endNum = $this->pageCount;
		}
		else{
			$this->endNum = $this->pageShow + $this->startNum - 1;
		}
		return $this->endNum;
	}

	/*
	 * Function: getLimit
	 * Return: array
	 */
	public function getLimit(){
		return array(($this->p-1)*($this->pageSize),$this->pageSize);
	}

	/*
	 * Function: showMain
	 * Return: string
	 */
	public function showMain(){
		$str = "共".$this->recordCount."条记录&nbsp;";
		$str .= "当前".$this->p."/".$this->pageCount."页&nbsp;&nbsp;";
		return $str;
	}

	/*
	 * Function: showText
	 * Return: string
	 */
	public function showText(){
		if($this->p > 1){
			$str .= "<a href=\"?p=1".$this->url."\">首页</a>&nbsp;&nbsp;";
			$str .= "<a href=\"?p=".($this->p - 1).$this->url."\">上一页</a>&nbsp;&nbsp;";
		}
		else{
			$str .= "首页&nbsp;&nbsp;";
			$str .= "上一页&nbsp;&nbsp;";
		}
		if($this->p < $this->pageCount){
			$str .= "<a href=\"?p=".($this->p + 1).$this->url."\">下一页</a>&nbsp;&nbsp;";
			$str .= "<a href=\"?p=".$this->pageCount.$this->url."\">尾页</a>&nbsp;&nbsp;";
		}
		else{
			$str .= "下一页&nbsp;&nbsp;";
			$str .= "尾页&nbsp;&nbsp;";
		}
		return $str;
	}

	/*
	 * Function: showNum
	 * Return: string
	 */
	public function showNum(){
		$str = '';
		if($this->p != 1){
			$str .= "<a href=\"?p=1".$this->url."\">首页</a>&nbsp;&nbsp;";
			$str .= "<a href=\"?p=".($this->p - 1).$this->url."\">上一页</a>&nbsp;&nbsp;";

			if(strstr($_SERVER["HTTP_USER_AGENT"],"Mozilla/5.0") == ""){
				$str .= "&nbsp;<a href=\"?p=1".$this->url."\"><font style=\"font-family:webdings\">9</font></a>&nbsp;&nbsp;";
				$str .= "&nbsp;<a href=\"?p=".($this->p - 1).$this->url."\"><font style=\"font-family:webdings\">3</font></a>&nbsp;&nbsp;";
			}
		}
		else{
			$str .= "首页&nbsp;&nbsp;";
			$str .= "上一页&nbsp;&nbsp;";

			if(strstr($_SERVER["HTTP_USER_AGENT"],"Mozilla/5.0") == ""){
				$str .= "&nbsp;<font style=\"font-family:webdings\">9</font>&nbsp;&nbsp;";

				$str .= "&nbsp;<font style=\"font-family:webdings\">3</font>&nbsp;&nbsp;";
			}
		}

		if(strstr($_SERVER["HTTP_USER_AGENT"],"Mozilla/5.0") == ""){
			for($i=$this->getStartNum();$i<=$this->getEndNum();$i++){
				if($this->p == $i){
					$str .= "&nbsp;".$i."&nbsp;";
				}
				else{
					$str .= "&nbsp;<a href=\"?p=".($i).$this->url."\">".$i."</a>&nbsp;";
				}
			}
		}

		if($this->p < $this->pageCount){
			if(strstr($_SERVER["HTTP_USER_AGENT"],"Mozilla/5.0") == ""){
				$str .= "&nbsp;<a href=\"?p=".($this->p + 1).$this->url."\"><font style=\"font-family:webdings\">4</font></a>&nbsp;&nbsp;";

				$str .= "&nbsp;<a href=\"?p=".$this->pageCount.$this->url."\"><font style=\"font-family:webdings\">:</font></a>&nbsp;&nbsp;";
			}

			$str .= "<a href=\"?p=".($this->p + 1).$this->url."\">下一页</a>&nbsp;&nbsp;";
			$str .= "<a href=\"?p=".$this->pageCount.$this->url."\">尾页</a>&nbsp;&nbsp;";
		}
		else{
			if(strstr($_SERVER["HTTP_USER_AGENT"],"Mozilla/5.0") == ""){
				$str .= "&nbsp;<font style=\"font-family:webdings\">4</font>&nbsp;&nbsp;";

				$str .= "&nbsp;<font style=\"font-family:webdings\">:</font></span>&nbsp;&nbsp;";
			}

			$str .= "下一页&nbsp;&nbsp;";
			$str .= "尾页&nbsp;&nbsp;";
		}
		return $str;
	}

	/*
	 * Function: showGoTo
	 * Parameter: btnClass;
	 * Return: string
	 */
	public function showGoTo($btnClass="button"){
		$str = '每页<input type="text" size="2" value="'.$this->pageSize.'" id="tbPageSize" style="width:auto">条 ';
		$str .= "跳到第<input style=\"width:auto\" type=\"input\" size=\"2\" id=\"tbGoto\" value=\"".$this->p."\" onkeydown=\"if(event.keyCode==13){location.href='?p='+this.value+'&pageSize='+document.getElementById('tbPageSize').value+'".$this->url."';}\">页<input type=\"button\" class=\"button\" value=\" Go \" onClick=\"javascript:location.href='?p='+document.getElementById('tbGoto').value+'&pageSize='+document.getElementById('tbPageSize').value+'".$this->url."';\">";
		return $str;
	}

	public function showPageSizeSetting(){

	}

	/*
	 * Function: showSelect
	 * Return: string
	 */
	public function showSelect(){
		$totalPage = $this->pageCount;
		$str = "转到<select onChange=\"javascript:location.href='?p='+this.value+'".$this->url."';\">";
		for($i=1;$i<=$this->pageCount;$i++){
			if($this->p == $i){
				$str .= "<option value=\"".$i."\" selected>".$i."</option>";
			}
			else{
				$str .= "<option value=\"".$i."\">".$i."</option>";
			}
		}
		$str .= "</select>共".$totalPage."页";
		return $str;
	}
	public function showAjaxNum($fun = 'getData'){
		$str = '';
		if($this->p != 1){
			$str .= "<a onclick=\"{$fun}(1)\">首页</a>&nbsp;&nbsp;";
			$str .= "<a onclick=\"{$fun}(".($this->p - 1).")\" >上一页</a>&nbsp;&nbsp;";

		}
		else{
			$str .= "首页&nbsp;&nbsp;";
			$str .= "上一页&nbsp;&nbsp;";

		}


		if($this->p < $this->pageCount){


			$str .= "<a onclick=\"{$fun}(".($this->p + 1).")\" >下一页</a>&nbsp;&nbsp;";
			$str .= "<a onclick=\"{$fun}(".$this->pageCount.")\">尾页</a>&nbsp;&nbsp;";
		}
		else{


			$str .= "下一页&nbsp;&nbsp;";
			$str .= "尾页&nbsp;&nbsp;";
		}
		return $str;
	}
	public function showIndexStyle($hostStr = ''){
		$str = '';

		if($hostStr && strpos($hostStr,'?') !== false)
			$linkStr = '&';
		else
			$linkStr = '?';
		if($this->p != 1){
			$str .= "<li><a href=\"".$hostStr.$linkStr."p=".($this->p - 1).$this->url."\" class=\"pre\">&nbsp;上一页</a></li>";
		}else{
			$str .= '<li><a class="pre">&nbsp;上一页</a></li>';
		}

		/*$totalPage = $this->pageCount;
		if($totalPage<0)$totalPage=0;
		$currPage = $this->p;
		$page_begin = ($currPage-5>0)?($currPage-5):1;
		$page_end = ($currPage+4<$totalPage)?($currPage+4):$totalPage;

		if($page_end-$page_begin+1<10){
			if($currPage-5<1)
				$page_end = 10;
			else
				$page_begin = $totalPage-9;
			if($page_begin<1)
				$page_begin = 1;
			if($page_end>$totalPage)
				$page_end = $totalPage;
		}*/
		$page_begin = $this->getStartNum();
		$page_end = $this->getEndNum();
		$totalPage = $this->pageCount;
		for($i=$page_begin;$i<=$page_end;$i++){
			if($i==$this->p)
				$str .= '<li><a class="select">'.$i.'</a></li>';
			else
				$str .= '<li><a href="'.$hostStr.$linkStr.'p='.$i.$this->url.'">'.$i.'</a></li>';
		}

		if($this->p < $totalPage){
			if($this->p < ($totalPage-2) && $totalPage > 5)$str .='<li>···</li>';
			$str .='<li><a href="'.$hostStr.$linkStr.'p='.($this->p + 1).$this->url.'" class="next">下一页&nbsp;</a></li>';
		}else{
			$str .= '<li><a class="next">下一页&nbsp;</a></li>';
		}
		return $str;
	}
	public function showPostForm($form = 'pageForm',$fun = 'getData'){
		$formstr = $this->showAjaxNum($fun);
		$formstr .= "<form name='{$form}' method='post' action=''>";
		if(isset($_POST)){
			foreach($_POST as $paramName => $paramValue){
				if(is_array($paramValue)){
					foreach($paramValue as $key=>$value){
						$tempstr = str_replace('"','&quot;',$value);
						$formstr .= '<input type="hidden" title="'.$tempstr.'" name="'.$paramName.'['.$key.']" value="'.$tempstr.'" />';
					}
				}else{
					$tempstr = str_replace('"','&quot;',$paramValue);
					$formstr .= "<input type='hidden' title='".$paramName."' name='".$paramName."' value=\"".$tempstr."\"/>";
				}
			}
		}
		$formstr .= "</form>";

		$formstr .= "<script language='javascript'>
		function {$fun}(page){
			var flag = true;
			var url = window.location.href;
			if(url.indexOf('?')==-1){
				url += '?p='+page;
			}else{
				var str = '';
				var temp = url.substr(url.indexOf('?')+1);
				var arr = temp.split('&');
				for(var i=0;i<arr.length;i++){
					var paramarr = arr[i].split('=');
					if(paramarr[0]!='p'){
						str += '&'+arr[i];
					}else{
						str += '&p='+page;
						flag = false;
					}
				}
				if(flag)str += '&p='+page;
				url = url.substr(0,url.indexOf('?'))+'?'+str.substr(1);
			}
			document.forms['{$form}'].action = url;
			document.forms['{$form}'].submit();
		}
		</script>";
		return $formstr;
	}
}
?>