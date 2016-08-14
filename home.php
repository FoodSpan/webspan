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
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="content">
                <h1>Welcome Back <b><?php echo $_SESSION['user']['name']?></b></h1>
                <h2>It's <b><span id="date"></span>.</b></h2>
                <h2>Here's what's up.</h2>
                <h3><b>1</b> Active Control Panels</h3>
                <h3><b>25</b> Active Tags</h3>
                <div class="text-center">
                  <h3><a href="panels.php">Settings</a></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <img class="img-responsive" src="img/control-panel.png" style="max-width:50%;margin-left: auto;margin-right: auto;">
              <div class="content">
                <h1>Control Panel <b>#1</b></h1>
                <h3><b>25</b> Active Tags</h3>
                <h3><b>3</b> Tags <span class="text-warning">Spoiling Soon</span></h3>
                <div class="text-center">
                  <h3><a href="panels.php">View Control Panels</a></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2>Spoiling Soon</h2>
            <div class="row">
              <div class="col-sm-4">
                <div class="card card-product">
                  <div class="content">
                    <a data-toggle="collapse" href="#tag-detail-1" aria-expanded="false" aria-controls="tag-detail-1">
                      <img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/>
                    </a>
                    <div class="text-center">
                      <h2>Onion</h2>
                      <h3 class="text-warning">Spoiling Soon</h3>
                      <a data-toggle="collapse" href="#tag-detail-1" aria-expanded="false" aria-controls="tag-detail-1">
                        More Information <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                      <div class="collapse" id="tag-detail-1">
                        <h3>Spoiling in: <b>1 Day</b></h3>
                        <h4>Produce</h4>
                        <h4 class="text-info">Refrigerated</h4>
                        <p>Onions from Farmers Market</p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card card-product">
                  <div class="content">
                    <a data-toggle="collapse" href="#tag-detail-2" aria-expanded="false" aria-controls="tag-detail-2">
                      <img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/>
                    </a>
                    <div class="text-center">
                      <h2>Lettuce</h2>
                      <h3 class="text-warning">Spoiling Soon</h3>
                      <a data-toggle="collapse" href="#tag-detail-2" aria-expanded="false" aria-controls="tag-detail-2">
                        More Information <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                      <div class="collapse" id="tag-detail-2">
                        <h3>Spoiling in: <b>1 Day</b></h3>
                        <h4>Produce</h4>
                        <h4 class="text-info">Refrigerated</h4>
                        <p>Lettuce from Farmers Market</p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card card-product">
                  <div class="content">
                    <a data-toggle="collapse" href="#tag-detail-3" aria-expanded="false" aria-controls="tag-detail-3">
                      <img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/>
                    </a>
                    <div class="text-center">
                      <h2>Carrot</h2>
                      <h3 class="text-warning">Spoiling Soon</h3>
                      <a data-toggle="collapse" href="#tag-detail-3" aria-expanded="false" aria-controls="tag-detail-3">
                        More Information <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                      <div class="collapse" id="tag-detail-3">
                        <h3>Spoiling in: <b>1 Day</b></h3>
                        <h4>Produce</h4>
                        <h4 class="text-info">Refrigerated</h4>
                        <p>Carrots from Farmers Market</p>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3><a href="tags.php">View More Tags</a></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
    <script src="js/moment.js"></script>
    <script>
      $("#date").html(moment().format('MMMM Do, h:mm a'));
    </script>
  </body>
</html>
