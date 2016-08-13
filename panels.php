<?php require 'common.php'; ?>
<?php
  if(empty($_SESSION['user'])) {
    header("Location: login.php");
		die("Redirecting to login.php");
  }
?>
<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
        <h1>Your Panels</h1>
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <img class="img-responsive" src="img/control-panel.png">
              </div>
              <div class="col-sm-8">
                <h1>Control Panel <b>#1</b></h1>
                <h3><b>5</b> Active Tags</h3>
                <h3><b>2</b> Days Until <b>Chicken</b> Expires</h3>
                <h3><b>1</b> Recipe Available Using <b>4</b> Ingredients</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <img class="img-responsive" src="img/control-panel.png">
              </div>
              <div class="col-sm-8">
                <h1>Control Panel <b>#2</b></h1>
                <h3><b>27</b> Active Tags</h3>
                <h3><b>1</b> Days Until <b>Beef</b> Expires</h3>
                <h3><b>3</b> Recipes Available Using <b>2</b> Ingredients</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
