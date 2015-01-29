
var Calendar=(function(){
	var g=[19416,19168,42352,21717,53856,55632,91476,22176,39632,21970,19168,42422,42192,53840,119381,46400,54944,44450,38320,84343,18800,42160,46261,27216,27968,109396,11104,38256,21234,18800,25958,54432,59984,28309,23248,11104,100067,37600,116951,51536,54432,120998,46416,22176,107956,9680,37584,53938,43344,46423,27808,46416,86869,19872,42416,83315,21168,43432,59728,27296,44710,43856,19296,43748,42352,21088,62051,55632,23383,22176,38608,19925,19152,42192,54484,53840,54616,46400,46752,103846,38320,18864,43380,42160,45690,27216,27968,44870,43872,38256,19189,18800,25776,29859,59984,27480,21952,43872,38613,37600,51552,55636,54432,55888,30034,22176,43959,9680,37584,51893,43344,46240,47780,44368,21977,19360,42416,86390,21168,43312,31060,27296,44368,23378,19296,42726,42208,53856,60005,54576,23200,30371,38608,19415,19152,42192,118966,53840,54560,56645,46496,22224,21938,18864,42359,42160,43600,111189,27936,44448,84835];
	var p=new Array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
	var q=new Array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
	var b=new Date();var e=b.getFullYear();var i=b.getMonth();
	var m=b.getDate();
	function format(g,c){
	if(arguments.length>1){
		var i=format,f=/([.*+?^=!:${}()|[\]\/\\])/g,b=(i.left_delimiter||"{").replace(f,"\\$1"),d=(i.right_delimiter||"}").replace(f,"\\$1"),j=i._r1||(i._r1=new RegExp("#"+b+"([^"+b+d+"]+)"+d,"g")),h=i._r2||(i._r2=new RegExp("#"+b+"(\\d+)"+d,"g"));if(typeof(c)=="object"){return g.replace(j,function(l,k){var m=c[k];if(typeof m=="function"){m=m(k)}return typeof(m)=="undefined"?"":m})}else{if(typeof(c)!="undefined"){var a=Array.prototype.slice.call(arguments,1),e=a.length;return g.replace(h,function(k,l){l=parseInt(l,10);return(l>=e)?k:a[l]})}}}return g}
	function r(s){return(p[s%10]+q[s%12])}
	function h(u){var s,t=348;for(s=32768;s>8;s>>=1){t+=(g[u-1900]&s)?1:0}return(t+f(u))}
	function f(s){if(a(s)){return((g[s-1900]&65536)?30:29)}else{return(0)}}
	function a(s){return(g[s-1900]&15)}
	function j(t,s){return(g[t-1900]&(65536>>s))?30:29}
	function k(w){
		var u,t=0,s=0;
		var v=new Date(1900,0,31);
		var x=(w-v)/86400000;
		this.dayCyl=x+40;
		this.monCyl=14;
		for(u=1900;u<2050&&x>0;u++){
			s=h(u);x-=s;this.monCyl+=12
			}if(x<0){x+=s;u--;this.monCyl-=12}
		this.year=u;
		this.yearCyl=u-1864;
		t=a(u);
		this.isLeap=false;
		for(u=1;u<13&&x>0;u++){
			if(t>0&&u==(t+1)&&this.isLeap==false){--u;this.isLeap=true;s=f(this.year)}
			else{s=j(this.year,u)}if(this.isLeap==true&&u==(t+1)){
				this.isLeap=false}x-=s;
				if(this.isLeap==false){
					this.monCyl++
				}}
		if(x==0&&t>0&&u==t+1){
			if(this.isLeap){this.isLeap=false}else{this.isLeap=true;--u;--this.monCyl}}
		if(x<0){x+=s;--u;--this.monCyl}this.month=u;this.day=x+1}
	function l(t,x){
		var v=["日","一","二","三","四","五","六","七","八","九","十"];
		var u=["初","十","廿","卅"];
		var w;
		if(t>10){w="十"+v[t-10]}else{w=v[t]}if(w=="一"){w="正"}w+="月";
		switch(x){
		case 10:w+="初十";break;case 20:w+="二十";break;case 30:w+="三十";break;default:w+=u[Math.floor(x/10)];w+=v[parseInt(x%10)]}
		return(w)
		}
	function n(){
		var t=new k(new Date(e,i,m));
		var s=l(t.month,t.day);
		return(s)
		}
	function d(){
		var u="日一二三四五六";
		var t='<a href="http://site.baidu.com/list/wannianli.htm" rel="nr" target="_blank" title="点击查看万年历">#{YY}年#{MM}月#{DD}日 星期#{week}</a>';
		var s=format(t,{YY:e,MM:i+1,DD:m,week:u.charAt(b.getDay())});
		return s
		}
	function c(){
		m=m+1;
		var s=i<9?("0"+(i+1)):i+1;
		var t=m+1<10?("0"+m):m;
		return(e+"-"+s+"-"+t)
		}
	function o(){var s='<a href="http://site.baidu.com/list/wannianli.htm" target="_blank" rel="nr" title="点击查看万年历">农历 '+n()+"</a>";
	return s
	}
	return{day:d,cnday:o,date:c}
	})();