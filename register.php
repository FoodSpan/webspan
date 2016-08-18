<?php require 'common.php';?>

<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
        <div class="card card-signup">
						<form class="form" method="post" action="back_register.php?register">
							<div class="header header-success text-center">
								<h4 class="card-title">Register</h4>
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
                    <i class="material-icons">face</i>
                  </span>
                  <input type="text" class="form-control" placeholder="Name" name="name" id="name" required="">
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
                <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input type="password" placeholder="Confirm Password" class="form-control" name="password2" id="password2" required="">
								</div>
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-success btn-round btn-lg">Get Started</button>
							</div>
						</form>
					</div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
