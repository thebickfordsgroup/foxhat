<nav class="navbar navbar-default fixed-nav">
  <div class="container">

    @if (Session::has('message'))
    <div class="success-mask" id="myMask"></div>
    <div class="success-content" id="myModal">
      <p class="success-msg">
        <img src="/images/email_success.png" /><br/><br/>
        <b>Thanks for getting in touch</b><br/><br/>We will get back to you as soon as possible</p>
        <br/>
          <button class="close-btn" type="button">Close</button><br/><br/>  
          <button id="myBtn" style="display: none;">Open Modal</button>
    </div>
    @endif

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img class="nav-logo" src="images/nav-logo.png" style="padding-left: 25px;">
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="#story">THE STORY</a></li>
            <li><a href="#beer" class="page-scroll">THE BEER</a></li>
            <li><a href="#find" class="page-scroll">FIND US</a></li>
            <li><a href="#contact" class="page-scroll">CONTACT US</a></li>
        </ul>  
    </div>
    <!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>