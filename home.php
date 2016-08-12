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
        <h1>Welcome Back <?php echo $_SESSION['user']['name']?> <small>here's what we've got for you</small></h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <img class="img-responsive" src="img/control-panel.png">
              <div class="content">
                <h1>Control Panel <b>#1</b></h1>
                <h3><b>5</b> Active Tags</h3>
                <h3><b>2</b> Days Until <b>Chicken</b> Expires</h3>
                <h3><b>1</b> Recipe Available Using <b>4</b> Ingredients</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="content">
                <div class="row">
                  <div class="col-sm-4">
                    <img class="img-responsive" src="img/tag.png">
                  </div>
                  <div class="col-sm-6">
                    <h1>Tag <b>#23</b></h1>
                    <h3><b>Chicken</b></h3>
                    <h3>Expiring in <b>2</b> Days</h3>
                    <h3>Used in <b>1</b> Recipe</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="content">
                <div class="row">
                  <div class="col-sm-4">
                    <img class="img-responsive" src="img/tag.png">
                  </div>
                  <div class="col-sm-6">
                    <h1>Tag <b>#24</b></h1>
                    <h3><b>Carrots</b></h3>
                    <h3>Expiring in <b>5</b> Days</h3>
                    <h3>Used in <b>3</b> Recipes</h3>
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
