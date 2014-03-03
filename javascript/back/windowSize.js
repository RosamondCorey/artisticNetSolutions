viewportwidth = "0";
viewportheight = "0";
if (typeof window.innerWidth != 'undefined'){
	viewportwidth = window.innerWidth,
	viewportheight = window.innerHeight
} else if (typeof document.documentElement != 'undefined'
 			&& typeof document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0) {
   viewportwidth = document.documentElement.clientWidth,
   viewportheight = document.documentElement.clientHeight
} else {
   viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
   viewportheight = document.getElementsByTagName('body')[0].clientHeight
}
makeRequest(JSRL+'javascript/common/ajax_assist.php?session_id='+SESSION_ID+'&varName=viewportHeight&varValue='+								viewportheight);
makeRequest(JSRL+'javascript/common/ajax_assist.php?session_id='+SESSION_ID+'&varName=viewportWidth&varValue='+viewportwidth);

