<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up To Win!</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <script src="js/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="css/sweetalert.css">
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> 
      <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  </head>

    @if (Session::has('success'))
      <body onload="success_msg();">
    @else
      @if (Session::has('error'))
        <body onload="error_msg();">
      @else
        <body>
      @endif
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
              <input type="email" class="contact-comp" name="email" id="email" placeholder="EMAIL ADDRESS" autocomplete="off" required>
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
              <h2 style="font-size:24px!important; line-height:30px;">SIGN UP TO RECEIVE NEWS ABOUT FOX HAT</h2>
            </div>
            <div class="col-md-1">&nbsp;</div>
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </body>
</html>        
<script type="text/javascript">

function success_msg(){
  swal({
    title: "THANK YOU FOR SIGNING UP, GOOD LUCK!",   
    type: "success",     
    confirmButtonColor: "#333",   
    confirmButtonText: "CLOSE WINDOW", 
    closeOnConfirm: true });}

function error_msg(){
  swal({
  title: "EMAIL ADDRESS HAS ALREADY BEEN ENTERED!",
  type: "warning",
  showCancelButton: false,
  confirmButtonColor: "#333", 
  confirmButtonText: "CLOSE WINDOW",
  closeOnConfirm: true});}

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