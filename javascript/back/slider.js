// JavaScript Document
function slideIn(e){
	var width = parseInt(document.getElementById(e).style.width);
	document.getElementById(e).style.width = (width-10)+"px";
	var marginLeft = (parseInt(document.getElementById('content_area').style.marginLeft)-10);
	var contentWidth = (parseInt(document.getElementById('content_area').style.width)+10);
	if(marginLeft > 15 ){
		document.getElementById('content_area').style.width = contentWidth+"px";
		document.getElementById('content_area').style.marginLeft = marginLeft+"px";
	}
	if((width-10)<10){ document.getElementById(e).style.width = 5+"px"; }
	if( width != 5 ){ setTimeout("slideIn('"+e+"')",10); }
}
function slideOut(e){
	var width = parseInt(document.getElementById(e).style.width);
	document.getElementById(e).style.width = (width+10)+"px";
	var marginLeft = (parseInt(document.getElementById('content_area').style.marginLeft)+10);
	var contentWidth = (parseInt(document.getElementById('content_area').style.width)-10);
	document.getElementById('content_area').style.width = contentWidth+"px";
	document.getElementById('content_area').style.marginLeft = marginLeft+"px";
	if((OrignalWidth-(width+10)) < 10){ document.getElementById(e).style.width = OrignalWidth+"px"; }
	if( OrignalWidth!= parseInt(document.getElementById(e).style.width)){ setTimeout("slideOut('"+e+"')",10); }
}

function slideMe(e){
	var element = e.parentNode;
	if(document.getElementById(element.id).style.width != "5px"){
		OrignalWidth = document.getElementById(element.id).offsetWidth
	}	
	if(document.getElementById(element.id).style.width == ""){ 
		document.getElementById(element.id).style.width = OrignalWidth + "px";
	}
	if(parseInt(document.getElementById(element.id).style.width) != 5){
		setTimeout("slideIn('"+element.id+"')",10);
	} else {
		setTimeout("slideOut('"+element.id+"')",10);	
	}
}


