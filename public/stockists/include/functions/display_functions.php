<?php

function display_search($criteria) {
	$address = $criteria['address'];
	$category_id = $criteria['category_id'];
	$max_distance = $criteria['max_distance'];
	
	echo '<form method="GET" class="form-inline">';
		
		echo '<input type="text" id="address" name="address" value="'.$address.'" class="form-control" style="width:410px; margin-right:5px;" 
		placeholder="Enter Street AND Suburb" />';
		
		//display the categories filter
		if($GLOBALS['categories_filter']=='1') {
			$categories = get_categories_list();
			
			echo '&nbsp;&nbsp;<select id="category_id" name="category_id" class="form-control" onchange="form.submit();">';
				echo '<optgroup label="Packaged Beer">';
				for($i=0; $i<6; $i++) {
					if($categories[$i]['id']==$category_id) echo '<option selected value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
					else echo '<option value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
				}
				echo '</optgroup>';
	  			echo '<optgroup label="On Tap">';
				for($i=6; $i<12; $i++) {
					if($categories[$i]['id']==$category_id) echo '<option selected value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
					else echo '<option value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
				}
				echo '</optgroup>';
			echo '</select>';
		}
		
		if($GLOBALS['max_distance_filter']=='1') {
			$distance_tab = array('50'=>'50 '.$GLOBALS['distance_unit'], '100'=>'100 '.$GLOBALS['distance_unit'], '500'=>'500 '.$GLOBALS['distance_unit']);
			
			echo '&nbsp;&nbsp;';
			echo '<span id="ipad-br" style="display:none;"><br/><br/></span>';
			echo '<select id="max_distance" name="max_distance" class="form-control" onchange="form.submit();">';
			echo '<option value="25" selected>25 km</option>';
			foreach($distance_tab as $ind=>$value) {
				if($ind==$max_distance) echo '<option selected value="'.$ind.'">'.$value.'</option>';
				else echo '<option value="'.$ind.'">'.$value.'</option>';
			}
			echo '</select>';
		}
		
		echo '&nbsp;&nbsp;<input type="submit" value="Search" class="btn btn-primary" />';
		
	echo '</form>';
}

function get_sidebar_display_1($criteria=array()) {
	$locations = $criteria['locations'];
	$lat = $criteria['lat'];
	$lng = $criteria['lng'];
	
	for($i=0; $i<count($locations);$i++) {
		$name = $locations[$i]['name'];
		$logo = $locations[$i]['logo'];
		$url = $locations[$i]['url'];
		$address = $locations[$i]['address'];
		$email = $locations[$i]['email'];
		$category_id = $locations[$i]['category_id'];
		$distance = round($locations[$i]['distance'],1);
		
		$d .= '<div class="store_locator_sidebar_entry sidebar_entry_btn" data-id="'.$locations[$i]['id'].'" data-lat="'.$locations[$i]['lat'].'" data-lng="'.$locations[$i]['lng'].'">';
			
			if($logo!='') {
				$d .= '<img src="'.$logo.'" style="padding-right:5px;" align="left"> ';
			}
			
			if($url=='') $d .= '<b>'.$name.'</b>';
			else $d .= '<b>'.$name.'</b>';
			
			$d .= '<br>'.$address.'';
			
			if($lat!='' && $lng!='') $d .= ' (<span class="store_locator_sidebar_entry_distance">'.$distance.' '.$GLOBALS['distance_unit'].'</span>)';
			
		$d .= '</div>';
		
		//Marker Info Window
		//$d .= '<div style="display:none;" id="marker_content_'.$locations[$i]['id'].'">'.get_marker_content($locations[$i]).'</div>';
	}
	
	return $d;
}

function get_sidebar_display_2($criteria=array()) {
	$locations = $criteria['locations'];
	$lat = $criteria['lat'];
	$lng = $criteria['lng'];
	
	if(count($locations)>0) {
		
		$d .= '<br><table class="table table-hover">';
		$d .= '<thead>
				  <tr>
					<th style="color:#fff; font-size:1.2em;">Stockist Name</th>
					<th style="color:#fff; font-size:1.2em; text-align:right;">Distance</th>
				  </tr>
				</thead>';
		
		for($i=0; $i<count($locations);$i++) {
			$name = $locations[$i]['name'];
			$logo = $locations[$i]['logo'];
			$url = $locations[$i]['url'];
			$address = $locations[$i]['address'];
			$email = $locations[$i]['email'];
			$category_id = $locations[$i]['category_id'];
			$distance = round($locations[$i]['distance'],1);
			
			$d .= '<tr class="sidebar_entry_btn tdhover" data-id="'.$locations[$i]['id'].'" data-lat="'.$locations[$i]['lat'].'" data-lng="'.$locations[$i]['lng'].'" style="cursor:pointer; text-align:left; color:#fff; background-color:#111;">';
			
				$d .= '<td style="text-align:left;">';
					if($logo!='') $d .= '<img src="'.$logo.'" style="padding-right:5px;" align="left">';
					$d .= $name;
				$d .= '</td>';
				
				//$d .= '<td style="text-align:left;">'.$address.'</td>';
				
				$d .= '<td style="text-align:right;">';
					if($lat!='' && $lng!='') $d .= ''.$distance.' '.$GLOBALS['distance_unit'].'';
					else $d .= 'N/A';
				$d .= '</td>';
				
			$d .= '</tr>';
		}
		
		$d .= '</table>';
	}
	
	return $d;
}

//Get Marker Content Display
function get_marker_content($criteria=array()) {
	$name = $criteria['name'];
	$logo = $criteria['logo'];
	$url = $criteria['url'];
	$address = $criteria['address'];
	$email = $criteria['email'];
	
	$d .= '<div class="store_locator_map_infowindow">';
	
		if($logo!='') {
			//$d .= '<img src="'.$logo.'" style="margin-bottom:5px;" width=80><br>';
		}
		
		if($url!='') $d .= '<a href="'.$url.'" target="_blank"><b>'.$name.'</b></a>';
		else $d .= '<b>'.$name.'</b>';
		
		$d .= '<br/>'.$address.'';
		
		if($email!='') $d .= '<br/>'.$email.'';
		
		//Streetview
		if($GLOBALS['streetview_display']==1) $d .= '<br/><a href="#" id="displayStreetViewBtn">Street View</a>';
		
		//Get Directions
		if($GLOBALS['get_directions_display']=='1') {
			$address = str_replace('<br />', ' ', $address);
			$d .= '<br/>Get directions: 
			<a href="http://maps.google.com/maps?f=d&z=13&daddr='.urlencode($address).'" target="_blank">To here</a> - 
			<a href="http://maps.google.com/maps?f=d&z=13&saddr='.urlencode($address).'" target="_blank">From here</a>';
		}
	
	$d .= '</div>';
	
	return $d;
}

function displayMarkersContent($locations) {
	for($i=0; $i<count($locations);$i++) {
		$markers[$i] = get_marker_content($locations[$i]);
	}
	return $markers;
}

function display_pagination($criteria) {
    $page_number = $criteria['page_number'];
    $nb_display = $criteria['nb_display'];
    $nb_stores = $criteria['nb_stores'];
	
	$nb_pages = ceil($nb_stores/$nb_display);
	
	$d .= '<span style="font-size:1em; color:#fff;">' . $nb_stores . ' Available Stockists<span>';
	
	if($nb_pages>1) {
		$d .= ' - ';
	    if($page_number==1 && $nb_stores>($page_number*$nb_display)) {
	        $d .= '<a href="#" id="store_locator_next" style="font-size:1em; color:#fff;">Next Page</a>';
	    }
	    else if($page_number>1) {
	        $d .= '<a href="#" id="store_locator_previous" style="font-size:1em; color:#fff;">Previous Page</a> - ';
	        $d .= $page_number.' / '.$nb_pages;
	        if(($page_number*$nb_display) < $nb_stores) $d .= ' - <a href="#" id="store_locator_next" style="font-size:1em; color:#fff;">Next Page</a>';
	    }		
	}
	
    return $d;
}

?>