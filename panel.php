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
                  <th>Actions</th>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="#"><img class="img-responsive" src="img/tag.png"></a></td>
                    <th>Chicken</th>
                    <th><span class="text-success">Fresh</span></th>
                    <th>2016/08/12</th>
                    <th>Chicken Breast from Longos.</th>
                    <th>Raw Meat</th>
                    <th><span class="text-info">Refrigerated</span></th>
                    <th>2016/08/15</th>
                    <th class="td-actions">
                      <a href="#" class="btn btn-info btn-round">
                        <i class="material-icons">search</i>
                      </a>
                      <a href="#" class="btn btn-danger btn-round">
                        <i class="material-icons">close</i>
                      </a>
                    </th>
                  </tr>
                  <tr>
                    <td><a href="#"><img class="img-responsive" src="img/tag.png"></a></td>
                    <th>Potatoes</th>
                    <th><span class="text-danger">Spoiling</span></th>
                    <th>2016/07/11</th>
                    <th>Yukon Gold Potatoes from Costco.</th>
                    <th>Produce</th>
                    <th><span class="text-info">Frozen</span></th>
                    <th>2016/08/12</th>
                    <th class="td-actions">
                      <a href="#" class="btn btn-info btn-round">
                        <i class="material-icons">search</i>
                      </a>
                      <a href="#" class="btn btn-danger btn-round">
                        <i class="material-icons">close</i>
                      </a>
                    </th>
                  </tr>
                  <tr>
                    <td><a href="#"><img class="img-responsive" src="img/tag.png"></a></td>
                    <th>Carrots</th>
                    <th><span class="text-warning">Spoiling Soon</span></th>
                    <th>2016/08/07</th>
                    <th>Carrots from Farmers Market.</th>
                    <th>Produce</th>
                    <th><span class="text-info">Refrigerated</span></th>
                    <th>2016/08/11</th>
                    <th class="td-actions">
                      <a href="#" class="btn btn-info btn-round">
                        <i class="material-icons">search</i>
                      </a>
                      <a href="#" class="btn btn-danger btn-round">
                        <i class="material-icons">close</i>
                      </a>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
