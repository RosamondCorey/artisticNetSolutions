function hero_slider_interval_change(){
	var found = false;
	for( var i=0; i<SliderItems.length; i++ ){
		var sliderFrame = document.getElementById(SliderItems[i]);
		if(sliderFrame.style.display=="block"){ var active = i; }
	}
	if((active+1)<SliderItems.length){ active = (active +1); } else { active = 0; }
	for( var i=0; i<SliderItems.length; i++ ){
		var sliderFrame = document.getElementById(SliderItems[i]);
		if(i==active){
			sliderFrame.style.display = 'block';
			sliderFrame.style.visibility = 'visible';
		} else {
			sliderFrame.style.display = 'none';
			sliderFrame.style.visibility = 'hidden';
		}
	}
}