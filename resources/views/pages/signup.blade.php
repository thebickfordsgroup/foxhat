<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up To Win!</title>
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

    @if (Session::has('subscribe'))
    <div class="success-mask" id="myMask"></div>
    <div class="success-content" id="myModal">
      <br/>
      <p class="success-msg">THANK YOU FOR SIGNING UP, GOOD LUCK!</p>
      <div class="row" style="text-align: center;">
        <button class="close-btn" type="button">Close</button><br/><br/>  
        <button id="myBtn" style="display: none;">Open Modal</button>
      </div>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="success-mask" id="myMask"></div>
    <div class="success-content" id="myModal">
      <br/>
      <p class="success-msg">SOMETHING HAS GONE WRONG, PLEASE TRY AGAIN!</p>
      <div class="row" style="text-align: center;">
        <button class="close-btn" type="button">Close</button><br/><br/>  
        <button id="myBtn" style="display: none;">Open Modal</button>
      </div>
    </div>
    @endif

    <div class="main-body">
      {{ Form::open( [ 'url' => 'sign-up', 'method' => 'post' ] ) }}
      {{ csrf_field() }}  
        <div class="container" style="text-align: center;">
          <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6"><img class="sign-up-logo" src="images/main-logo.png"> </div>
            <div class="col-md-3">&nbsp;</div>
          </div>
          <div class="row margin-bottom">
            <div class="col-md-12">
              <h1 class="comp">SIGN UP TO WIN</h1>
            </div>
          </div>
          <div class="row margin-bottom">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-5">
              <input type="text" class="contact-comp" name="fname" id="fname" placeholder="FIRST NAME" autocomplete="off" required>
            </div>
            <div class="col-md-5">              
              <input type="text" class="contact-comp" name="lname" id="lname" placeholder="LAST NAME" autocomplete="off" required>
            </div>
            <div class="col-md-1">&nbsp;</div>
          </div>
          <div class="row margin-bottom">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-5">
              <input type="text" class="contact-comp" name="email" id="email" placeholder="EMAIL ADDRESS" autocomplete="off" required>
            </div>
            <div class="col-md-5">              
              <input type="text" class="contact-comp" name="pcode" id="pcode" placeholder="POST CODE" autocomplete="off" required>
            </div>
            <div class="col-md-1">&nbsp;</div>
          </div>
          <div class="row margin-bottom">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-5">
              <button type="submit" class="contact-comp">SUBMIT</button>
            </div>
            <div class="col-md-1">
              <label class="containment">
                <input name="newsletter" value="1" type="checkbox" checked="checked">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col-md-4">
              <h2 style="font-size:24px!important; line-height:30px;">SIGN UP TO RECEIVE OUR FOX HAT NEWSLETTER</h2>
            </div>
            <div class="col-md-1">&nbsp;</div>
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </body>
</html>        
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