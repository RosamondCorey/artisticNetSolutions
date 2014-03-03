<?php
// Your twitter username.
$username = "artisticnets";

// Prefix - some text you want displayed before your latest tweet. 
// (HTML is OK, but be sure to escape quotes with backslashes: for example href=\"link.html\")
$prefix = "";

// Suffix - some text you want display after your latest tweet. (Same rules as the prefix.)
$suffix = "";

$url = 'http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=' . $username;
//$get = file_get_contents($url);
$headers = get_headers($url);
//print_r($headers);
$test=false;
if($test){
	$xml = file_get_contents($url);
	unlink(ABSOLUTE_PATH.'cache/twitter.xml');
	$myFile = ABSOLUTE_PATH.'cache/twitter.xml';
	$fh = fopen($myFile, 'w+') or die("can't open file");
	fwrite($fh, $xml);
	$xml = simplexml_load_file($url);	
} else { 
	$url = 'http://'.$architect->hostData['site_url'].'/cache/twitter.xml';
	$xml = simplexml_load_file($url);
}
$replace = $username.':';
$componentReturn = '<div><h2 class="twitter_header">&nbsp;</h2>';
$twitter_count=0;
foreach($xml->channel->item as $post){
	if($twitter_count<3){
	$componentReturn .= '<div class="twitter_post_containe">';
		$componentReturn .= '<div class="twitter_post_img" style="background:url(http://a0.twimg.com/profile_images/1490359084/twitterANS_normal.png) left top no-repeat;">&nbsp;</div>';
 		$componentReturn .= str_replace($replace,'',$post->description).' <br /><span style="float:right;">';
		$componentReturn .= '<strong>Posted:</strong> '.str_replace(' +0000','',$post->pubDate).'</span>';
		$componentReturn .= '<div style="clear:both;"></div>';
 	$componentReturn .= '</div>';
	}
	$twitter_count++;
}

$componentReturn .= '<a href="http://twitter.com/#artisticnets" target="_Twiter" class="twiter_follow_us">FOLLOW US ON TWITTER</a>';
$componentReturn .= '<div style="clear:both;">&nbsp;</div>';
$componentReturn .= '</div>';
?>