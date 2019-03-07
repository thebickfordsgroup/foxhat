<?php
include_once('include/webzone.php');
$address = $_GET['address'];
$category_id = $_GET['category_id'];
$max_distance = $_GET['max_distance'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Advanced Store Locator - Yougapi Technology</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
	<link rel="stylesheet" href="./include/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./include/css/style.css" />
    
	<script type='text/javascript'> 
	var Store_locator = {
		ajaxurl:"", lat:"", lng:"", current_lat:"", current_lng:"", category_id:"", max_distance:"",
		page_number:1, nb_display: <?php echo $GLOBALS['nb_display']; ?>, map_all_stores: "<?php echo $GLOBALS['map_all_stores']; ?>",
		marker_icon:"<?php echo $GLOBALS['marker_icon']; ?>", marker_icon_current:"<?php echo $GLOBALS['marker_icon_current']; ?>", 
		autodetect_location:"<?php echo $GLOBALS['autodetect_location']; ?>",
		streetview_display:<?php echo $GLOBALS['streetview_display']; ?>,
		display_type:""
	};
	</script>
	
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=<?php echo $GLOBALS['google_api_key']; ?>" type="text/javascript"></script>
    <script src="./include/js/script.js" type="text/javascript"></script>
    
	<script>
	$(document).ready(function() {
		init_locations();
		$('#address').focus();
	})
	</script>
	
</head>

<body>

<div class="container">
	<br>
	<a href="http://codecanyon.net/item/advanced-php-store-locator/244349?ref=yougapi"><img src="./include/graph/advanced-store-locator-mini.png" align="left" style="margin-right:30px;"></a>
	<h1 style="margin-top:0px;">Advanced Store Locator</h1>
	Enrich your website with a Google Maps powered Store Locator. <a href="http://codecanyon.net/item/advanced-php-store-locator/244349?ref=yougapi">Get this app here</a><br>
</div><br>

<div class="container">
	
	<div id="topMenu">
		<ul>
			<li><a href="./index.php" class="current">Demo1</a></li>
			<li><a href="./demo_2.php">Demo2</a></li>
		</ul>
	</div>
	
	<div style="width:100%; margin-bottom:10px;">
		<div style="padding:10px;">
			Type any city name, address or zip code to find the closest location:</br>
			<?php
			display_search(array('address'=>$address, 'category_id'=>$category_id, 'max_distance'=>$max_distance));
			?>
		</div>
	</div>
	
	<div style="padding:10px; width:100%;">
	
		<div id="sl_current_location"></div>
		
		<div class="row">
			<div class="col-xs-4">
				<div id="sl_sidebar" class="store_locator_sidebar">Loading...</div>
				<div id="sl_pagination" class="store_locator_pagination"></div>
				<span id="sl_pagination_loading"></span>
			</div>
			
			<div class="col-xs-8">
			    <div id="sl_map" style="width:100%; height:460px"></div>
			</div>
		</div>
	
	</div>
	
	<br><hr style="margin-bottom:10px;">
	<p>Powered by <a href="http://yougapi.com">Yougapi Technology</a> - <a href="http://codecanyon.net/item/advanced-php-store-locator/244349?ref=yougapi">Purchase Page</a></p>
	<br>
</div>

</body>
</html>