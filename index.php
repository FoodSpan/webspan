<?php include_once 'common.php' ?>
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
        <div class="card card-raised card-carousel">
					<div id="carousel-home" class="carousel slide" data-ride="carousel">
						<div class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-home" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-home" data-slide-to="1"></li>
								<li data-target="#carousel-home" data-slide-to="2"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<img src="img/cover-page.png" alt="Awesome Image">
									<div class="carousel-caption">
										<h4><i class="material-icons">dashboard</i> Really Cool Product</h4>
									</div>
								</div>
								<div class="item">
                  <img src="img/cover-page.png" alt="Awesome Image">
									<div class="carousel-caption">
										<h4><i class="material-icons">dashboard</i> Really Cool Product</h4>
									</div>
								</div>
								<div class="item">
                  <img src="img/cover-page.png" alt="Awesome Image">
									<div class="carousel-caption">
										<h4><i class="material-icons">dashboard</i> Really Cool Product</h4>
									</div>
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-home" data-slide="prev">
								<i class="material-icons">keyboard_arrow_left</i>
							</a>
							<a class="right carousel-control" href="#carousel-home" data-slide="next">
								<i class="material-icons">keyboard_arrow_right</i>
							</a>
						</div>
					</div>
				</div>
        <div class="card">
          <div class="content">
            <div class="text-center">
              <h2 class="title">What's FoodSpan?</h2>
              <h5 class="description">FoodSpan features two core aspects: a Control Panel, and a Tag. Using FoodSpan is simple: just attach the tag to your food container, and swipe it past your Control Panel. Then, the Control Panel alerts you to how long food has been in the fridge, and through our companion apps, can tell you when the food is about to expire!</h5>
            </div>
            <div class="row">
            	<div class="col-sm-3 col-sm-offset-1">
               	<div class="info info-horizontal">
            			<div class="icon icon-info">
            				<i class="material-icons">check</i>
            			</div>
            			<div class="description">
            				<h4 class="info-title">Simple</h4>
            				<p>FoodSpan is designed to be as simple as possible: at its core, it's usable by the entire family, including children and seniors. Just attach the tag, and swipe!</p>
            			</div>
            	   </div>
            		<div class="info info-horizontal">
            			<div class="icon">
            				<i class="material-icons">build</i>
            			</div>
            			<div class="description">
            				<h4 class="info-title">Effective</h4>
            				<p>FoodSpan features a robust software and hardware infrastructure, with a large featureset and companion apps to boot!</p>
            			</div>
            		</div>
            	</div>
            	<div class="col-sm-4">
          			<img class="img-responsive" src="img/logo.png" alt="product display" />
            	</div>
            	<div class="col-sm-3">
            		<div class="info info-horizontal">
            			<div class="icon icon-warning">
            				<i class="material-icons">filter_vintage</i>
            			</div>
            			<div class="description">
            				<h4 class="info-title">Sustainable</h4>
            				<p>FoodSpan helps you save food, both by helping you eat your food before you expire, and helping you identify purchasing patterns where you constantly overbuy food.</p>
            			</div>
            		</div>

            		<div class="info info-horizontal">
            			<div class="icon icon-success">
            				<i class="material-icons">attach_money</i>
            			</div>
            			<div class="description">
            				<h4 class="info-title">Affordable</h4>
            				<p>FoodSpan costs only $39, or 4% of the amount the average Canadian spends on food waste. FoodSpan can save the average Canadian $860!</p>
            			</div>
            		</div>
            	</div>
            </div>
          </div>
        </div>
        <div class="card text-center">
          <div class="content">
            <h2 class="title">Why our company?</h2>
            <h5 class="description">FoodSpan is an organisation dedicated first and foremost to its customers: to create an amazing, high quality product; to listen to our customers and continuously improve; and most importantly, to help consumers save on food waste! </h5>
            <div class="features">
          		<div class="row">
          			<div class="col-sm-4">
          				<div class="info">
          					<div class="icon icon-info">
          						<i class="material-icons">message</i>
          					</div>
          					<h4 class="info-title">Responsive</h4>
          					<p>We understand that problems may arise, and we can always improve! We promise to be available for customer feedback 24/7, through social media, our website, or our email, to help you troubleshoot any problems, and to listen to your feedback. In addition, we care about the community: we have our community blog, and routintely respond to social media!</p>
          				</div>
          			</div>

          			<div class="col-sm-4">
          				<div class="info">
          					<div class="icon icon-primary">
          						<i class="material-icons">group</i>
          					</div>
          					<h4 class="info-title">Dedicated</h4>
          					<p>We're dedicated to creating an amazing product, and that means we give it our all. Through our community blog, you can discover more about how we make FoodSpan. Through our community engagement, we're dedicated to making our product as great as it can, by listenting to our consumers. Through constantly improving our product, through patches and new versions, we're dedicated to making FoodSpan awesome!</p>
          				</div>
          			</div>

          			<div class="col-sm-4">
          				<div class="info">
          					<div class="icon icon-danger">
          						<i class="material-icons">favorite</i>
          					</div>
          					<h4 class="info-title">Passionate</h4>
          					<p>We're passionate about our product, and that's a promise that we stand behind. We initially created FoodSpan to help reduce food waste, and to target food insecurity: a topic that we are passionate about. No matter what, that's our company's vision, and our company's goal. </p>
          				</div>
          			</div>
              </div>
          	</div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
