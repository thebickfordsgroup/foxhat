<?php
include_once('include/webzone.php');

$u1 = new YgpUserSession();
if($u1->isConnected()) header('Location: '.$GLOBALS['redirect_after_login']);

include_once('include/presentation/header.php');
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<form class="form-signin" role="form" id="login_form" name="login_form">
				<input type="text" id="login" name="login" class="form-control" placeholder="Username" required autofocus style="margin-bottom:5px;">
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" required style="margin-bottom:5px;">
				<button class="btn btn-lg btn-primary btn-block" id="login_btn" type="submit">Sign in</button>
				<div id="notification" style="margin-top:10px;"></div>
			</form>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>

<?php
include_once('include/presentation/footer.php');
?>