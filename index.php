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
        <div class="row">
          <div class="col-sm-6">
            <div class="card card-raised card-carousel">
    					<div id="carousel-home" class="carousel slide" data-ride="carousel">
    						<div class="carousel slide" data-ride="carousel">
    							<ol class="carousel-indicators">
    								<li data-target="#carousel-home" data-slide-to="0" class="active"></li>
    								<li data-target="#carousel-home" data-slide-to="1"></li>
    								<li data-target="#carousel-home" data-slide-to="2"></li>
    							</ol>

    							<div class="carousel-inner">
    								<div class="item active">
    									<img src="img/carousel/home.png" alt="Dashboard">
    								</div>
    								<div class="item">
                      <img src="img/carousel/cards.png" alt="Awesome Image">
    								</div>
    								<div class="item">
                      <img src="img/carousel/multiple.png" alt="Awesome Image">
    								</div>
    							</div>
    							<a class="left carousel-control" href="#carousel-home" data-slide="prev">
    								<i class="material-icons">keyboard_arrow_left</i>
    							</a>
    							<a class="right carousel-control" href="#carousel-home" data-slide="next">
    								<i class="material-icons">keyboard_arrow_right</i>
    							</a>
    						</div>
    					</div>
    				</div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="content">
                <h1>Webspan</h1>
                <p class="lead">
                  Part of the FoodSpan family, WebSpan allows you to access your FoodSpan fridge anywhere: know what's been tagged, what tags are spoiling, and more awesome features on your laptop, phone, or tablet. Plus, WebSpan is free to use, and is supported with updates to keep it fresh.
                </p>
                <a href="register.php" class="btn btn-white btn-raised btn-round">
                  Register
                </a> <a href="login.php" class="btn btn-white btn-raised btn-round">
                  Login
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
