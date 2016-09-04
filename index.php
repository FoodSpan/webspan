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
            <h1>WebSpan</h1>
            <p class="lead">
              Part of the FoodSpan family, WebSpan allows you to access your FoodSpan fridge anywhere: know what's been tagged, what tags are spoiling, and more awesome features on your laptop, phone, or tablet. Plus, WebSpan is free to use, and is supported with updates to keep it fresh.
            </p>
            <a href="register.php" class="btn btn-success btn-raised btn-round">
              Register
            </a> <a href="login.php" class="btn btn-success btn-raised btn-round">
              Login
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <h1>FoodSpan</h1>
            <p class="lead">
              FoodSpan works in your kitchen to help you save food, time, and money, simply by swiping and attaching a tag. Not only does your leftover spaghetti not become a science experiment, but you can save hundreds of dollars every year! Plus, FoodSpan is always available using our suite of web and mobile applications, so you always know what's fresh in your fridge.
            </p>
            <a href="https://foodspan.ca" class="btn btn-success btn-raised btn-round">
              Learn More
            </a>
          </div>
          <div class="col-sm-6">
            <img class="img-responsive" src="img/logo.png" alt="FoodSpan Logo"/>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
