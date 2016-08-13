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
        <h1>Your Tags</h1>
        <div class="card">
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Image</th>
                  <th>Nickname</th>
                  <th>State</th>
                  <th>Checkin Date</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Ingredient</th>
                  <th>Expiry Date</th>
                  <th>UID</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="#"><img class="img-responsive" src="img/tag.png"></a></td>
                    <th>Chicken</th>
                    <th><span class="text-success">Active</span></th>
                    <th>2016/08/12</th>
                    <th>Chicken Breast from Longos.</th>
                    <th>Raw Meat</th>
                    <th>Chicken</th>
                    <th>2016/08/15</th>
                    <th>123456</th>
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
                    <th><span class="text-danger">Expired</span></th>
                    <th>2016/07/11</th>
                    <th>Yukon Gold Potatoes from Costco.</th>
                    <th>Produce</th>
                    <th>Potato</th>
                    <th>2016/08/12</th>
                    <th>54321</th>
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
                    <th><span class="text-warning">Deactivated</span></th>
                    <th>2016/08/07</th>
                    <th>Carrots from Farmers Market.</th>
                    <th>Produce</th>
                    <th>Carrot</th>
                    <th>2016/08/11</th>
                    <th>890</th>
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
