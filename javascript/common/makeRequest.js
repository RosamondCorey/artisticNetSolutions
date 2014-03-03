var http_request = false;
function makeRequest(url) {
	if (window.XMLHttpRequest) {
		http_request = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	http_request.open('GET', url, true);
	http_request.send(null);
} 
function VerifyDelete(location){
		var answer = confirm('Are you sure you want to delete? This is perminant.');
		if (answer){
			window.location = location;
		}
	}