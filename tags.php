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
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#card" aria-controls="card" role="tab" data-toggle="tab">Card View</a></li>
          <li role="presentation"><a href="#table" aria-controls="table" role="tab" data-toggle="tab">Table View</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="card">
            <div class="card">
              <div class="content">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card card-product">
                      <div class="content">
                        <a data-toggle="collapse" href="#tag-detail-1" aria-expanded="false" aria-controls="tag-detail-1">
                          <img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/>
                        </a>
                        <div class="text-center">
                          <h2>Chicken</h2>
                          <h3 class="text-success">Fresh</h3>
                          <a data-toggle="collapse" href="#tag-detail-1" aria-expanded="false" aria-controls="tag-detail-1">
                            More Information <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                          <div class="collapse" id="tag-detail-1">
                            <h3>Spoiling in: <b>2 Days</b></h3>
                            <h4>Raw Meat</h4>
                            <h4 class="text-info">Refrigerated</h4>
                            <p>Chicken Breast from Longos</p>
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
                          <h2>Potatoes</h2>
                          <h3 class="text-danger">Spoiled</h3>
                          <a data-toggle="collapse" href="#tag-detail-2" aria-expanded="false" aria-controls="tag-detail-2">
                            More Information <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                          <div class="collapse" id="tag-detail-2">
                            <h3 class="text-danger">Spoiled for <b>1 Day</b></h3>
                            <h4>Produce</h4>
                            <h4 class="text-info">Refrigerated</h4>
                            <p>Yukon Gold Potatoes from Costco</p>
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
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="table">
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
                    </thead>
                    <tbody>
                      <tr>
                        <th><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></th>
                        <th>Chicken</th>
                        <th><span class="text-success">Fresh</span></th>
                        <th>2016/08/12</th>
                        <th>Chicken Breast from Longos.</th>
                        <th>Raw Meat</th>
                        <th><span class="text-info">Refrigerated</span></th>
                        <th>2016/08/15</th>
                      </tr>
                      <tr>
                        <th><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></td>
                        <th>Potatoes</th>
                        <th><span class="text-danger">Spoiled</span></th>
                        <th>2016/07/11</th>
                        <th>Yukon Gold Potatoes from Costco.</th>
                        <th>Produce</th>
                        <th><span class="text-info">Frozen</span></th>
                        <th>2016/08/12</th>
                      </tr>
                      <tr>
                        <td><img class="img-responsive" src="img/tag.png" alt="Tag Image" style="max-width:50%;margin-left: auto;margin-right: auto;"/></a></td>
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
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
