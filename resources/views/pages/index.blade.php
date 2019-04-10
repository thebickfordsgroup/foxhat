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
    <div class="challenge-mask-50" id="challengeMask" style="display: none;"></div>
    <div class="challenge-content" id="subscribeModal" style="display: none; text-align: center; line-height: 40px!important;">
      </br><img src="/images/nav-logo.png" /></br></br>
      <span class="challenge-msg">
        SIGN UP TO FOXHAT FOR EXCLUSIVE UPDATES ON UPCOMING NEWS AND EVENTS.</br></br>
      </span>
      @include('partials.subscribe')
    </div>

<div class="header">
  @include('partials.nav')
</div>  


<div class="aboutus" id="aboutus">
  @include('partials.story')
</div>

<div id="beer" class="main-body hide-when-small" style="padding-top:50px; text-align: center;">
    <img  class="foxhat-hr" src="images/foxhat_hr.png">
    <img  class="foxhat-hr2" src="images/foxhat_hr2.png">
</div>

<div id="exp" class="container" style="padding-top: 50px;">
    <div class="col-md-12 bottom-divs">
          <div class="row nomarg">
            <h2 style="text-align: center;">TASTING EXPERIENCES<br/><br/></h2>
          </div>
            <p class="story">From a crisp and clear Strong Lager, to a viscous and hop-heavy, full-bodied Russian Imperial Stout. We’ve let the Vale Brewing brewers off the leash and they’re here to prove it with a tasting experience that really packs a punch!</p>
            <br/>
            <p class="story"><strong>TASTING: $20</strong></p>
            <p class="story">Tastings available 7 days a week.</p>
            <p class="story">Tastings are for over 18 only, ID may be required.</p><br/>

            <p class="story"><strong>Available at:</strong></p>
            <p class="story">Beresford Tasting Pavilion</p>
            <p class="story">252 Blewitt Springs Road, McLaren Flat SA 5171</p>
            <p class="story"><a href="https://www.beresfordwines.com.au/experience" target="_blank">Beresfordwines.com.au/experience</a></p><br/>

            <p class="story">23rd Street Distillery</p>
            <p class="story">Corner of Renmark Avenue and Twenty Third Street, Renmark SA 5341</p>
            <p class="story"><a href="https://www.23rdstreetdistillery.com.au/#visiting" target="_blank">23rdstreetdistillery.com.au/#visiting</a></p><br/>

            <p class="story">Beenleigh Artisan Distillery</p>
            <p class="story">142 Distillery Road, Eagleby QLD 4207</p>
            {{--<p class="story"><a href="https://www.beenleighrum.com.au/distillery" target="_blank">Beenleighrum.com.au/distillery</a></p>--}}
            <br/><br/>
    </div>
  </div>

<div id="instagram">
	<div id="story" class="main-body" style="padding-top:50px; padding-bottom:50px; text-align: center;">
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
      <iframe src="/stockists/index.php" style="width:100%; height:60vh; border:none;"></iframe>
    </div>
</div>

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

    function subscribe()
    {
      document.getElementById('subscribeModal').style.display = '';
      document.getElementById('challengeMask').style.display = '';
    }

    function close_subscribe()
    {
      document.getElementById('subscribeModal').style.display = 'none';
      document.getElementById('challengeMask').style.display = 'none';
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