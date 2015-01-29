<?php

/*
 * ClassName: CreateImg
 * Date: 2008-03-18
 * Author: ziyan.suo@163.com
 */

class Img{
	
	var $w = 660;
	var $h = 230;
	var $x = 36;
	var $y = 20;
	var $_w = 600;
	var $_h = 180;

	var $xMin = 0;
	var $xMax = 0;
	var $s = 0;
	var $xScale = 0;

	var $yMin = 0;
	var $yMax = 0;
	var $yScale = 0;

	var $date = 0;
	var $arrData = array();
	var $img;
	
	function CreateImg(){
		//创建图片
		$this->img = imagecreate($this->w,$this->h);
		//填充背景色
		$backgroundColor = imagecolorallocate($this->img,255,255,255);
		//外边框
		$borderColor = imagecolorallocate($this->img,100,100,100);
		imageline($this->img,0,0,0,$this->h,$borderColor);
		imageline($this->img,0,0,$this->w,0,$borderColor);
		imageline($this->img,$this->w-1,0,$this->w-1,$this->h,$borderColor);
		imageline($this->img,1,$this->h-1,$this->w,$this->h-1,$borderColor);
		//内边框
		$borderColor = imagecolorallocate($this->img,120,120,120);
		imageline($this->img,$this->x,$this->y,$this->_w+$this->x,$this->y,$borderColor);
		imageline($this->img,$this->x,$this->_h+$this->y,$this->_w+$this->x,$this->_h+$this->y,$borderColor);
		imageline($this->img,$this->x,$this->y,$this->x,$this->_h+$this->y,$borderColor);
		imageline($this->img,$this->_w+$this->x,$this->y,$this->_w+$this->x,$this->_h+$this->y,$borderColor);
	}
	
	function Drawing($date,$arrData){
		//初始数据
		$this->date = $date;
		$this->arrData = $arrData;
		$i=0;
		foreach($arrData as $arr){
			$this->arrTime[$i] = $arr['t'];
			$i++;
		}
		//print_r($this->arrTime);
		$this-> s = count($this->arrTime)-1;
		//画Y轴刻度
		$this -> SetY();
		//画X轴刻度
		$this -> SetX();
		//画K线图
		//exit();
		$this -> DrawingLing();
	}
	
	function GetImg(){
		return $this->img;
	}

	//设置X轴时间刻度
	function SetX(){
		//X轴每一小时的像素
		$this -> xScale = $this -> _w / $this->s;
		//定义刻度线样式
		$black = imagecolorallocate($this->img, 100,100,100);
		$white = imagecolorallocate($this->img, 255,255,255);
		$arrWB = array($black,$white);
		//文字样式
		$fontColor = imagecolorallocate($this->img,0,0,255);
		//定义XY坐标
		imagestring($this->img,2,$this->x-strlen($this->arrTime[0])*2.7,$this->_h+$this->y+6,$this->arrTime[0],$fontColor);
		$x1 = $this->x + $this -> xScale;
		$y1 = $this->y;
		$x2 = $this->x + $this -> xScale;
		$y2 = $this->y + $this->_h;
		for($i=1;$i<$this->s;$i++){
			//画时间轴
			imagesetstyle($this->img,$arrWB);
			//标时间日期
			if($this->arrTime[$i] != $t || $t == ""){
				imageline($this->img,$x1,$y1,$x2,$y2,IMG_COLOR_STYLED);
				imagestring($this->img,2,$x2-strlen($this->arrTime[$i])*2.7,$y2+6,$this->arrTime[$i],$fontColor);
				$t = $this->arrTime[$i];
			}
			//X轴
			$x1 += $this->_w / $this->s;
			$x2 += $this->_w / $this->s;
		}
		imagestring($this->img,2,$x2-strlen($this->arrTime[$i])*2.7,$y2+6,$this->arrTime[$i],$fontColor);
	}
	
	//设置Y轴的刻度
	function SetY(){
		//初始化最大最小值
		$yMin = 0;
		for($i=0;$i<count($this->arrData);$i++){
			if($yMax < $this->arrData[$i]['v']){
				$yMax = $this->arrData[$i]['v'];
			}
			if($yMin > $this->arrData[$i]['v']){
				$yMin = $this->arrData[$i]['v'];
			}
		}
		//定义刻度线样式
		$black = imagecolorallocate($this->img, 100,100,100);
		$white = imagecolorallocate($this->img, 255,255,255);
		$arrWB = array($black,$white);
		$fontColor = imagecolorallocate($this->img,0,0,255);
		//Y轴最大值
		$this -> yMax = $v1 = $yMax;
		imagestring($this->img,2,5,$this->y-7,$v1,$fontColor);
		//定义XY坐标
		$x1 = $this->x;
		$y1 = $this->y;
		$x2 = $this->x + $this->_w;
		$y2 = $this->y;
		if($yMax - $yMin){
			$yScale = ($yMax - $yMin) / 8;
		}
		for($i=1;$i<8;$i++){
			//画刻度线
			imagesetstyle($this->img,$arrWB);
			//标刻度值
			//Y轴
			$y1 = $y1 + $this->_h/8;
			$y2 = $y2 + $this->_h/8;
			$v1 = round($v1 - $yScale,2);
			imagestring($this->img,2,5,$y1-7,$v1,$fontColor);
			imageline($this->img,$x1,$y1,$x2,$y2,IMG_COLOR_STYLED);
		}
		imagestring($this->img,2,5,$this->y+$this->_h-7,$yMin,$fontColor);
		//Y轴最小值
		$this -> yMin = $v1+=$yScale;
		//Y轴每一元钱的像素
		$this -> yScale = ($yMax - $yMin) / $this -> _h;
	}
	
	function DrawingLing(){
		$lineColor = imagecolorallocate($this->img,255,0,0);
		$fontColor = imagecolorallocate($this->img,100,100,100);
		//定位X1,Y1坐标
		$x1 = $this->x;
		if($this->arrData[0]['v']!=0){
			$y1 = $this->y + $this->_h - ($this->arrData[0]['v']/$this -> yScale);
		}
		else{
			$y1 = $this->y + $this->_h - $this -> yScale;
		}
		if($this->arrData[0]['v'] != "0"){
			imagestring($this->img,2,$x1+2,$y1-12,$this->arrData[0]['v'],$fontColor);
		}
		//循环
		for($i=1;$i<=count($this->arrData)-1;$i++){
			//定位X2,Y2坐标
			$x2 = $x1+$this->xScale;
			if($this->arrData[$i]['v']!=0){
				$y2 = $this->y + $this->_h - ($this->arrData[$i]['v']/$this->yScale);
			}
			else{
				$y2 = $this->y + $this->_h - $this -> yScale;
			}
			//画线
			imageline($this->img,$x1,$y1,$x2,$y2,$lineColor);
			$x1 = $x2;
			$y1 = $y2;
			if($this->arrData[$i]['v'] != "0"){
				imagestring($this->img,2,$x1+2,$y1-12,$this->arrData[$i]['v'],$fontColor);
			}
		}
		//文字
		$fontColor = imagecolorallocate($this->img,0,0,255);
		imagestring($this->img,2,260,4,"http://www.3393.com",$fontColor);
		imagestring($this->img,2,460,4,$this->date,$fontColor);
	}
}

?>