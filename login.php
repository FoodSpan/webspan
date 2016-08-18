<?php require 'common.php'; ?>
<?php
  if(!(empty($_SESSION['user']))) {
    header("Location: home.php");
		die("Redirecting to home.php");
  }
?>
<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
        <div class="card card-signup">
						<form class="form" method="post" action="back_login.php?login">
							<div class="header header-rose text-center">
								<h4 class="card-title">Log in</h4>
                <!--
								<div class="social-line">
									<a href="#" class="btn btn-just-icon btn-simple">
										<i class="fa fa-facebook-square"></i>
									</a>
									<a href="#" class="btn btn-just-icon btn-simple">
										<i class="fa fa-google"></i>
									</a>
								</div>
              -->
							</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>
									<input type="email" class="form-control" placeholder="Email" name="email" id="email" required="">
								</div>

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input type="password" placeholder="Password" class="form-control" name="password" id="password" required="">
								</div>
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-rose btn-round btn-lg">Open Your Fridge</button>
							</div>
						</form>
					</div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
