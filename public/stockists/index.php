<?php
include_once('include/webzone.php');
$address = $_GET['address'];
$category_id = $_GET['category_id'];
$max_distance = $_GET['max_distance'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Beenleigh Rum - Stockists</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
	<link rel="stylesheet" href="./include/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./include/css/style.css" />

    <style>

    body
    {
    	background-color: #111;
    }

    input.btn-primary, input.btn-primary:link, input.btn-primary:visited, input.btn-primary:hover, input.btn-primary:active
    {
    	background-color: #fff;
    	color: #111;
    	border:none;
    	height: 34px;
    }

	</style>
    
	<script type='text/javascript'> 
	var Store_locator = {
		ajaxurl:"", lat:"", lng:"", current_lat:"", current_lng:"", category_id:"", max_distance:"",
		page_number:1, nb_display: <?php echo $GLOBALS['nb_display']; ?>, map_all_stores: "<?php echo $GLOBALS['map_all_stores']; ?>",
		marker_icon:"<?php echo $GLOBALS['marker_icon']; ?>", marker_icon_current:"<?php echo $GLOBALS['marker_icon_current']; ?>", 
		autodetect_location:"<?php echo $GLOBALS['autodetect_location']; ?>",
		streetview_display:<?php echo $GLOBALS['streetview_display']; ?>,
		display_type:"2"
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
	
	<div style="width:100%; margin-bottom:10px; text-align: center;">
		<div style="padding-top:20px; text-align: center;">
			<?php
			display_search(array('address'=>$address, 'category_id'=>$category_id, 'max_distance'=>$max_distance));
			?>
		</div>
	</div>
	
	<div style="padding:10px; width:100%; text-align: center;">	
		<div id="sl_current_location"></div>	
		<span id="sl_pagination_loading"></span>
		<div class="col-md-6">		
		  	<div id="sl_sidebar" class="store_locator_sidebar"></div>
			<div id="sl_pagination" class="store_locator_pagination"></div>
		</div>
		<div class="col-md-6">
			<div id="sl_map" style="width:100%; height:460px"></div>	
		</div>
	</div>
</div>

</body>
</html>