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
              </div>
            </div>
            <div class="text-center">
              <h3><a data-toggle="collapse" href="#collapsePanel1" aria-expanded="false" aria-controls="collapsePanel1">View Tags <i class="material-icons">keyboard_arrow_down</i></a></h3>
            </div>
            <div class="collapse" id="collapsePanel1">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th class="text-center">Image</th>
                    <th>Nickname</th>
                    <th>State</th>
                    <th>Checkin Date</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Stored</th>
                    <th>Expiry Date</th>
                  </thead>
                  <tbody>
                    <tr>
                      <th><a href="#"><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></th>
                      <th>Chicken</th>
                      <th><span class="text-success">Fresh</span></th>
                      <th>2016/08/12</th>
                      <th>Chicken Breast from Longos.</th>
                      <th>Raw Meat</th>
                      <th><span class="text-info">Refrigerated</span></th>
                      <th>2016/08/15</th>
                    </tr>
                    <tr>
                      <th><a href="#"><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></td>
                      <th>Potatoes</th>
                      <th><span class="text-danger">Spoiled</span></th>
                      <th>2016/07/11</th>
                      <th>Yukon Gold Potatoes from Costco.</th>
                      <th>Produce</th>
                      <th><span class="text-info">Frozen</span></th>
                      <th>2016/08/12</th>
                    </tr>
                    <tr>
                      <td><a href="#"><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></td>
                      <th>Carrots</th>
                      <th><span class="text-warning">Spoiling Soon</span></th>
                      <th>2016/08/07</th>
                      <th>Carrots from Farmers Market.</th>
                      <th>Produce</th>
                      <th><span class="text-info">Refrigerated</span></th>
                      <th>2016/08/11</th>
                    </tr>
                  </tbody>
                </table>
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
              </div>
            </div>
            <div class="text-center">
              <h3><a data-toggle="collapse" href="#collapsePanel2" aria-expanded="false" aria-controls="collapsePanel2">View Tags <i class="material-icons">keyboard_arrow_down</i></a></h3>
            </div>
            <div class="collapse" id="collapsePanel2">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th class="text-center">Image</th>
                    <th>Nickname</th>
                    <th>State</th>
                    <th>Checkin Date</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Stored</th>
                    <th>Expiry Date</th>
                  </thead>
                  <tbody>
                    <tr>
                      <th><a href="#"><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></th>
                      <th>Chicken</th>
                      <th><span class="text-success">Fresh</span></th>
                      <th>2016/08/12</th>
                      <th>Chicken Breast from Longos.</th>
                      <th>Raw Meat</th>
                      <th><span class="text-info">Refrigerated</span></th>
                      <th>2016/08/15</th>
                    </tr>
                    <tr>
                      <th><a href="#"><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></td>
                      <th>Potatoes</th>
                      <th><span class="text-danger">Spoiled</span></th>
                      <th>2016/07/11</th>
                      <th>Yukon Gold Potatoes from Costco.</th>
                      <th>Produce</th>
                      <th><span class="text-info">Frozen</span></th>
                      <th>2016/08/12</th>
                    </tr>
                    <tr>
                      <td><a href="#"><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></td>
                      <th>Carrots</th>
                      <th><span class="text-warning">Spoiling Soon</span></th>
                      <th>2016/08/07</th>
                      <th>Carrots from Farmers Market.</th>
                      <th>Produce</th>
                      <th><span class="text-info">Refrigerated</span></th>
                      <th>2016/08/11</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
