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
        <img class="age-logo" src="/images/nav-logo.png" /><br/>
        <img class="age-hr" src="images/foxhat_hr3.png">
        <br/>ARE YOU OVER<br/> 18 YEARS OF AGE?<br/>
        <img class="age-hr" src="images/foxhat_hr3.png">
      </p>
      <div class="challenge-div">
          <button class="age-btn-no" type="button" onclick="exitWebsite()">NO</button>
          <button class="age-btn-yes" type="button" onclick="enterWebsite()">YES</button>
          <button id="myBtn" style="display: none;"></button><br/>
      </div>
    </div>
    <script type="text/javascript">
      function enterWebsite()
      {
        document.cookie = "challenge-user";
        location.reload();
      }
      function exitWebsite()
      {
        window.location.href = "https://drinkwise.org.au/";
      }
    </script>
  </body>
</html>

<?php
    }
    else
    {
?>


<div class="header">
  @include('partials.nav')
</div>  


<div class="aboutus" id="aboutus">
  @include('partials.story')
</div>


<div id="instagram">
	<div id="story" class="main-body" style="padding-top:150px; padding-bottom:50px; text-align: center;">
		<img class="img-heading1" src="images/instagram_header.png">
	</div>
	<div class="container">				
    <div class="desktop-only" id="fh-instafeed"></div>
    <div class="mobile-only" id="fh-instafeed-m"></div>
	</div>
</div>


<div id="find" class="main-body" style="padding-top:100px; padding-bottom:50px; text-align: center;">
	<img class="img-heading2" src="images/findus_header.png">
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

        var icons = {
          lusty: {
            icon: '/images/lusty_lager_32x32.png'
          },
          metric: {
            icon: '/images/metric_ipa_32x32.png'
          },
          phat: {
            icon: '/images/phat_mongrel_32x32.png'
          },
          pelt: {
            icon: '/images/red_pelt_32x32.png'
          },
          full: {
            icon: '/images/full_mongrel_32x32.png'
          }
        };


      @include('partials.stockists')


        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(feature.name);
              infowindow.open(map, marker);
            }
          })(marker, i));

        });
  }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVjYbSZCeHMbs7Wr4a12jVQTd7Xqhuj9c&libraries=places&callback=initAutocomplete" async defer></script>


	<div id="contactus">
    <div id="story" class="main-body" style="padding-top:100px; text-align: center;">
      <img class="img-heading3" src="images/contactus_header.png">
    </div>
    <section id="contact" style="padding-top:50px;""> 
      @include('partials.contact')
    </section>
  </div>


  <div class="main-body hide-when-small" style="padding-top:50px; text-align: center;">
      <img  class="foxhat-hr" src="images/foxhat_hr.png">
      <img  class="foxhat-hr2" src="images/foxhat_hr2.png">
  </div>


  <div class="container">
    <div class="col-md-12" style="padding-top: 50px;">
      <p style="text-align: center;">
        <a href="/terms" target="_blank">Terms &amp; Conditions</a> &nbsp; | &nbsp; <a href="/privacy" target="_blank">Privacy Statement</a> 
        <br/><br/>
        Copyright &#169; <?php echo date("Y"); ?> Foxhat Brewing
      </p>
      <br/><br/>
  </div>
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
                resolution: 'thumbnail',
                template: '<div class="col-md-2" style="padding:5px!important"><img style="border:1px solid #aaa;" src="@{{image}}" /></div>',
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
                resolution: 'thumbnail',
                template: '<div class="col-md-12" style="padding:5px!important;text-align:center;"><img style="width:50%;border:1px solid #aaa;" src="@{{image}}" /></div>',
            });
            feed.run();
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
        mask.style.display = "none";
    }
}
</script>

</body>
</html>

<?php
    }
?>