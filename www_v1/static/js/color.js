var caller_type='';
var caller_id=1;
function QrColorPicker(_defaultColor){
    if(!_defaultColor) _defaultColor = "";
    QrXPCOM.init();
    this.id = QrColorPicker.lastid++;
    this.defaultColor = _defaultColor;
	QrColorPicker.DefaultColor = "";
    QrColorPicker.instanceMap["QrColorPicker"+this.id] = this;
	this.path = "static/qrx/";
}

function showcolorbord(id,type){
	caller_id = id;
	caller_type = type;
	document.getElementById('QrColorPicker0').style.display='';
	g=($('#'+caller_type+'label_'+caller_id).offset());
	$('#QrColorPicker0').css({left:g.left,top:g.top+$('#'+caller_type+'label_'+caller_id).outerHeight()});
}

QrColorPicker.setCustomColor = function(id, color){
	QrColorPicker.activeId=id;
	// 点固定色
	document.getElementById(caller_type+'label_'+caller_id).style.background=color;
  document.getElementById(caller_type+'siteName_'+caller_id).style.color=color;
  document.getElementById(caller_type+'siteColor_'+caller_id).value=color;
  document.getElementById(id).style.display = "none";
}

QrColorPicker.GetActiveId = function(){
	return QrColorPicker.activeId.replace(/QrColorPicker/,'');
}



QrColorPicker.prototype.set = function(color){
    if(QrColorPicker.instanceMap[QrColorPicker.activeId].onChange){
        QrColorPicker.instanceMap[QrColorPicker.activeId].onChange(color);
    }
    if(color == "") color = "";
    document.getElementById(QrColorPicker.activeId+"#input").value = color;
    document.getElementById(QrColorPicker.activeId+"#text").innerHTML = color;
    document.getElementById(QrColorPicker.activeId+"#color").style.background = color;
}

QrColorPicker.prototype.get = function(){
    return document.getElementById(QrColorPicker.activeId+"#input").value;
}

QrColorPicker.lastid = 0;

QrColorPicker.instanceMap = new Array;
QrColorPicker.restorePool = new Array;

QrColorPicker.transparent= function(id){
    QrColorPicker.instanceMap[id].set("transparent");
    document.getElementById(id).style.display = "none";
    if(QrColorPicker.instanceMap[id].onChange){
        QrColorPicker.instanceMap[id].onChange("transparent");
    }
}

QrColorPicker.SetDefaultColor = function(id,color){
	// 点恢复默认
	document.getElementById(caller_type+'label_'+caller_id).style.background=color;
  document.getElementById(caller_type+'siteName_'+caller_id).style.color=color;
  document.getElementById(caller_type+'siteColor_'+caller_id).value=color;
  document.getElementById(id).style.display = "none";
}



QrColorPicker.popupPicker= function(id){
	QrColorPicker.activeId = id;
    var pop = document.getElementById(id);
    var p = QrXPCOM.getDivPoint(pop);
    QrXPCOM.setDivPoint(document.getElementById(id), p.x, p.y+ 20);

    document.getElementById(id).style.display = "";
    QrXPCOM.onPopup(document.getElementById(id));
}

QrColorPicker.InputValueChange = function(ele){
	try{
		
	}catch(e){}
}

QrColorPicker.keyColor = function(id){
    try{
        document.getElementById(id+"#color").style.background = document.getElementById(id+"#input").value;
        QrColorPicker.restorePool[id] = document.getElementById(id+"#input").value;
        document.getElementById(id+"#text").innerHTML = QrColorPicker.restorePool[id];
    }catch(e){}
};


QrColorPicker.selectColor = function(event,id){
    var picked = QrColorPicker.setColor(event,id);

    document.getElementById(id).style.display = "none";
    QrColorPicker.restorePool[id] = picked;
    // 点调色板

    document.getElementById(caller_type+'label_'+caller_id).style.background=picked;
    document.getElementById(caller_type+'siteName_'+caller_id).style.color=picked;
    document.getElementById(caller_type+'siteColor_'+caller_id).value=picked;

};

QrColorPicker.restoreColor = function(id){
    if(QrColorPicker.restorePool[id]){
        document.getElementById(id+"#input").value = QrColorPicker.restorePool[id];

        QrColorPicker.restorePool[id] = null;
    }
};

QrColorPicker.setColor = function(event,id){
    if(!QrColorPicker.restorePool[id]) QrColorPicker.restorePool[id] = document.getElementById(id+"#input").value;

    var d = QrXPCOM.getMousePoint(event,document.getElementById(id));
    var picked = QrColorPicker.colorpicker(d.x,d.y).toUpperCase();

    document.getElementById(id+"#input").value = picked;
    document.getElementById(caller_type+'label_'+caller_id).style.background=picked;

    return picked;
};

QrColorPicker.colorpicker = function(prtX,prtY){
    var colorR = 0;
    var colorG = 0;
    var colorB = 0;

    if(prtX < 32){
        colorR = 256;
        colorG = prtX * 8;
        colorB = 1;
    }
    if(prtX >= 32 && prtX < 64){
        colorR = 256 - (prtX - 32 ) * 8;
        colorG = 256;
        colorB = 1;
    }
    if(prtX >= 64 && prtX < 96){
        colorR = 1;
        colorG = 256;
        colorB = (prtX - 64) * 8;
    }
    if(prtX >= 96 && prtX < 128){
        colorR = 1;
        colorG = 256 - (prtX - 96) * 8;
        colorB = 256;
    }
    if(prtX >= 128 && prtX < 160){
        colorR = (prtX - 128) * 8;
        colorG = 1;
        colorB = 256;
    }
    if(prtX >= 160){
        colorR = 256;
        colorG = 1;
        colorB = 256 - (prtX - 160) * 8;
    }

    if(prtY < 64){
        colorR = colorR + (256 - colorR) * (64 - prtY) / 64;
        colorG = colorG + (256 - colorG) * (64 - prtY) / 64;
        colorB = colorB + (256 - colorB) * (64 - prtY) / 64;
    }
    if(prtY > 64 && prtY <= 128){
        colorR = colorR - colorR * (prtY - 64) / 64;
        colorG = colorG - colorG * (prtY - 64) / 64;
        colorB = colorB - colorB * (prtY - 64) / 64;
    }
    if(prtY > 128){
        colorR = 256 - ( prtX / 192 * 256 );
        colorG = 256 - ( prtX / 192 * 256 );
        colorB = 256 - ( prtX / 192 * 256 );
    }

    colorR = parseInt(colorR);
    colorG = parseInt(colorG);
    colorB = parseInt(colorB);

    if(colorR >= 256){
        colorR = 255;
    }
    if(colorG >= 256){
        colorG = 255;
    }
    if(colorB >= 256){
        colorB = 255;
    }

    colorR = colorR.toString(16);
    colorG = colorG.toString(16);
    colorB = colorB.toString(16);

    if(colorR.length < 2){
    colorR = 0 + colorR;
    }
    if(colorG.length < 2){
    colorG = 0 + colorG;
    }
    if(colorB.length < 2){
    colorB = 0 + colorB;
    }

    return "#" + colorR + colorG + colorB;
}