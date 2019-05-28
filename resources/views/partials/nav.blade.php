<nav class="navbar navbar-default fixed-nav">
  <div class="container" style="width:1200px!important;">

    @if (Session::has('message'))
    <div class="success-mask" id="myMask"></div>
    <div class="success-content" id="myModal">
      <br/>
      <p class="success-msg">
        THANKS FOR GETTING IN TOUCH<br/>WE WILL GET BACK TO YOU ASAP!
      </p>
      <div style="text-align: right;">
        <img class="success-sig" src="/images/signature2.png" />
      </div>
      <div class="row">
        <button class="close-btn" type="button">Close</button><br/><br/>  
        <button id="myBtn" style="display: none;">Open Modal</button>
      </div>
    </div>
    @endif

    @if (Session::has('subscribe'))
    <div class="success-mask" id="myMask"></div>
    <div class="success-content" id="myModal">
      <br/><br/>
      <p class="success-msg">
        YOU HAVE SUCCESSFULLY SUBSCRIBED<br/>FOR THE FOXHAT BREWING NEWSLETTER!
      </p>
      <div class="row" style="padding-top:20px;">
        <button class="close-btn" type="button">CLOSE</button><br/><br/>  
        <button id="myBtn" style="display: none;">Open Modal</button>
      </div>
    </div>
    @endif

    @if (Session::has('subscribe-error'))
    <div class="success-mask" id="myMask"></div>
    <div class="success-content" id="myModal">
      <br/><br/>
      <p class="success-msg">
        YOU ARE ALREADY A REGISTERED SUBSCRIBER.<br/>STAY TUNED FOR UPDATES!
      </p>
      <div class="row" style="padding-top:20px;">
        <button class="close-btn" type="button">CLOSE</button><br/><br/>  
        <button id="myBtn" style="display: none;">Open Modal</button>
      </div>
    </div>
    @endif

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/">
        <img class="nav-logo" src="images/nav-logo.png" style="padding-left: 25px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="#story">STORY</a></li>
            <li><a href="#beer" class="page-scroll">BEER</a></li>
            <li><a href="#exp" class="page-scroll">EXPERIENCE</a></li>
            <li><a href="#find" class="page-scroll">FIND US</a></li>
            <li><a href="#contact" class="page-scroll">CONTACT US</a></li>
            <li><a href="#subscribe" class="page-scroll" onclick="subscribe()">SIGN ME UP</a></li>
        </ul>  
    </div>
    <!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>