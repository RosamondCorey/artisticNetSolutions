function flip_content_area( baseId ){
	var active = document.getElementsByClassName('tab_active');
	var temp = active[0].id;
	var active_id = temp.replace('tab_',"");
	var nextActiveTab = document.getElementById('tab_'+baseId);
	var nextActiveContent = document.getElementById('content_'+baseId);
	var currentActiveTab = document.getElementById('tab_'+active_id);
	var currentActiveContent = document.getElementById('content_'+active_id);
	currentActiveContent.style.display = 'none';
	currentActiveContent.style.visibility = 'hidden';
	nextActiveContent.style.display = 'block';
	nextActiveContent.style.visibility = 'visible';
	currentActiveTab.className = 'tab_inactive';
	nextActiveTab.className = 'tab_active';
	
}
