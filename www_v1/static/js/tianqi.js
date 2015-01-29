var tflag = 1;
function rweather(){
$('#detail').show();
$('#choose').hide();	
}
function choosecity(){
$('#detail').hide();
$('#choose').show();
if(tflag){
$.getJSON("weather.php?c=weather&a=getprovince", function(json){
	for(var key in json){
		var str = "<option value='"+key+"'>"+json[key]+"</option>";
    $(str).appendTo($("#province"));
	}
	$.getJSON("weather.php?c=weather&a=getdefaultzone", function(json){
		var p = json[0];
		var c = json[1];
		$('#province').val(p);
		getcity(p);
		$('#city').val(c);
		})
	})
	tflag=0;
}
}

function getcity(p){
	$.getJSON("weather.php?c=weather&a=getcity&pid="+p, function(json){
		document.getElementById("city").length = 0;
	for(var key in json){
		var str = "<option value='"+key+"'>"+json[key]+"</option>";
    $(str).appendTo($("#city"));
	}
	})
}

function getWeather(json){
    if(undefined!=json.cityName)
    	var str ='<a style="color:#666;" href="http://weather.news.sina.com.cn" target="_blank"><strong>'+json.cityName+'</strong>';
    else
    	var str = '';
		for(var i in json.todayWeather){
			if(i==0){
				if(undefined != json.todayWeather[i].image){
					str += '&nbsp;&nbsp;<strong>今天</strong>&nbsp;&nbsp;'+json.todayWeather[i].image;
					str += '&nbsp;&nbsp;'+json.todayWeather[i].temperature+'';
					str += '&nbsp;&nbsp;'+json.todayWeather[i].weather;
				}
			}else{
				if(undefined != json.todayWeather[i].image){
					str += '&nbsp;&nbsp;<strong>明天</strong>&nbsp;&nbsp;'+json.todayWeather[i].image;
					str += '&nbsp;&nbsp;'+json.todayWeather[i].temperature+'';
					str += '&nbsp;&nbsp;'+json.todayWeather[i].weather+'</a>';
					str += '&nbsp;&nbsp;<a style="color:#666;" onclick="choosecity()">[选择城市]</a>';
				}
			}
		}
		if(str == '')str='<a style="color:#666;" href="javascript:;" onclick="window.location.reload()">连接超时，请重新获取天气</a>';
		$('#detail').html(str);
	}