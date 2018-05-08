<!DOCTYPE html>
<html>
<head>
<title>Fox Hat Brewing</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> 
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body>

<?php
    if (!isset($_COOKIE["challenge-user"]))
    {
?>
    <div class="challenge-mask" id="challengeMask"></div>
    <div class="challenge-content" id="challengeModal">
      <p class="challenge-msg">
        <img src="/images/wait.png" /><br/><br/>
        <strong>Are you of legal drinking age in your country?</b><br/><br/>
      </p>
      <div style="padding-left: 50px;">
          <button class="yes-btn" type="button" onclick="enterWebsite()">YES</button>
          <span style="color: #fff; font-family: monopro; font-size: 18px;">&nbsp; Continue To Foxhat Website</span><br/><br/>
          <button class="no-btn" type="button" onclick="exitWebsite()">NO</button>
          <span style="color: #fff; font-family: monopro; font-size: 18px;">&nbsp; Get Me Out Of Here</span><br/><br/> 
          <button id="myBtn" style="display: none;"></button>
      </div>
      <div style="float: right; padding-right:10px; padding-bottom:5px;">
          <a href="https://drinkwise.org.au/">
            <img src="/images/drinkwise.png" />
          </a>
      </div>
    </div>
<?php
    }
?>


<div class="header">
  @include('partials.nav')
</div>  


<div class="aboutus" id="aboutus">
  @include('partials.story')
</div>


<div id="instagram">
	<div id="story" class="main-body" style="padding-top:150px; padding-bottom:50px; text-align: center;">
		<img src="images/instagram_header.png">
	</div>
	<div class="container">				
    <div class="desktop-only" id="fh-instafeed"></div>
    <div class="mobile-only" id="fh-instafeed-m"></div>
	</div>
</div>


<div id="find" class="main-body" style="padding-top:100px; padding-bottom:50px; text-align: center;">
	<img src="images/findus_header.png">
</div>

<div class="container" style="text-align: center;">
    <div class="col-md-12">
        <input id="pac-input" class="controls" type="text" placeholder="Enter your address">
        <div id="map"></div>
        <!-- Replace the value of the key parameter with your own API key. -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVjYbSZCeHMbs7Wr4a12jVQTd7Xqhuj9c&libraries=places&callback=initAutocomplete" 
        async defer></script>
    </div>
</div>


    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      
      function initAutocomplete() {

      @include('partials.stockists')

        var map = new google.maps.Map(document.getElementById('map'), 
        {
          center: {lat: -28.000, lng: 133.000},
          zoom: 4,
          mapTypeId: 'roadmap', 
          styles: [{"featureType":"all","elementType":"geometry","stylers":[{"color":"#cf1111"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#999999"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"off"},{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

   var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

      }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVjYbSZCeHMbs7Wr4a12jVQTd7Xqhuj9c&libraries=places&callback=initAutocomplete" async defer></script>


	<div id="contactus">
    <div id="story" class="main-body" style="padding-top:100px; text-align: center;">
      <img src="images/contactus_header.png">
    </div>
    <section id="contact" style="padding-top:50px;""> 
      @include('partials.contact')
    </section>
  </div>

  <div class="container" style="padding-top: 50px;">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="text-align: center;">
      <a href="https://www.facebook.com/foxhatbrewing" target="_blank" style="padding: 20px;">
        <img src="/images/social_icons_fb.png" alt="Facebook" title="Facebook" />
      </a>
      <a href="https://www.instagram.com/foxhatbrewing" target="_blank" style="padding: 20px;">
        <img src="/images/social_icons_ig.png" alt="Instagram" title="Instagram" />
      </a>
      <a href="https://www.twitter.com/foxhatbrewing" target="_blank" style="padding: 20px;">
        <img src="/images/social_icons_tw.png" alt="Twitter" title="Twitter" />
      </a>
      <a href="https://www.untappd.com/foxhatbrewing" target="_blank" style="padding: 20px;">
        <img src="/images/social_icons_ut.png" alt="Untappd" title="Untappd" />
      </a>
    </div>
    <div class="col-md-4"></div>
  </div>


  <div class="main-body" style="padding-top:50px; text-align: center;">
      <img  class="foxhat-hr" src="images/foxhat_hr.png">
      <img  class="foxhat-hr2" src="images/foxhat_hr2.png">
  </div>


  <div class="container">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="padding-top: 50px;">
      <p style="text-align: center;">
        <a href="">Terms &amp; Conditions</a> &nbsp; | &nbsp; <a href="">Privacy Statement</a> 
        <br/><br/>
        Copyright &#169; <?php echo date("Y"); ?> Foxhat Brewing
      </p>
      <br/><br/>
  </div>
  <div class="col-md-4"></div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/move-top.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/grayscale.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/instafeed.min.js"></script>

  <script type="text/javascript">

    function enterWebsite()
    {
      document.cookie = "challenge-user";
      document.getElementById('challengeModal').style.display = 'none';
      document.getElementById('challengeMask').style.display = 'none';
    }

    function exitWebsite()
    {
      window.location.href = "https://drinkwise.org.au/";
    }

  </script>

	<script type="text/javascript">

		$(window).load(function(){
			$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
				$('body').removeClass('loading');
			}
			});
		});

	</script>
    <script type="text/javascript">
            var feed = new Instafeed({
                target: 'fh-instafeed',
                get: 'user',
                accessToken: '1649343184.d3f10f8.335460faca464cf4b7d9ea33d4243cbb',
                userId: '1649343184',
                sortBy: 'most-recent',
                limit: '6',
                resolution: 'low_resolution',
                template: '<div class="col-md-4" style="padding:5px!important"><img style="width:100%;border:1px solid #aaa;" src="@{{image}}" /></div>',
            });
            feed.run();
    </script>
    <script type="text/javascript">
            var feed = new Instafeed({
                target: 'fh-instafeed-m',
                get: 'user',
                accessToken: '1649343184.d3f10f8.335460faca464cf4b7d9ea33d4243cbb',
                userId: '1649343184',
                sortBy: 'most-recent',
                limit: '6',
                resolution: 'low_resolution',
                template: '<div class="col-md-4" style="padding:5px!important"><img style="width:75%;border:1px solid #aaa;" src="@{{image}}" /></div>',
            });
            feed.run();
    </script>
  <script type="text/javascript">

    $(document).ready(function() {
    var defaults = {
    containerID: 'toTop', // fading element id
    containerHoverID: 'toTopHover', // fading element hover id
    scrollSpeed: 1200,
    easingType: 'linear' 
    };
    $().UItoTop({ easingType: 'easeOutQuart' });
    });

  </script>
  <script type="text/javascript">

  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});

</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');
var mask = document.getElementById('myMask');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-btn")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    mask.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>