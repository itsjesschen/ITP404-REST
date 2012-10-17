<?php

function redirect($togo) {
	header('Location: ' . $togo);
}

    function searchVideos($term) {
	$term = urlencode($term);
    $url = "http://gdata.youtube.com/feeds/api/videos?";
    $url = $url . "&q=" . $term;//q=football+-soccer
    $url = $url ."&orderby=viewCount&start-index=1&max-results=10&v=2";
	$xmlString = file_get_contents($url);
	$simpleXML = simplexml_load_string($xmlString);
    
	return $simpleXML;
}
