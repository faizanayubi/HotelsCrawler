<?php
	$goibo 		= 'http://www.goibibo.com/hotels/staticdata/?vcid=';
	function getvcid_url($keyword){
		return 'http://voyager.goibibo.com/api/v1/hotels_search/find_node_by_name/?callback=myCallback&params={"search_query" :"'.$keyword.'","limit":10,"qt":"N"}';
	}
	
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'crawl_goibo':
				echo file_get_contents($goibo.$_GET['vcid']);
				break;
			case 'getvcid':
				echo str_replace('myCallback(', '', file_get_contents(getvcid_url($_GET['keyword'])));
				break;
		}
	} else {
		die('action not set');
	}
	
?>