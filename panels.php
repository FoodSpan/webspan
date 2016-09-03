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
        <?php
          include_once "fetchpaneldata.php";
          include_once "fetchtagdata.php";
          $panel_data = fetchPanelData(false, null);
          $tag_data = fetchTagData(false, null);
          for ($i = 0; $i < count($panel_data); $i++){
            echo "<div class=\"card\">
                    <div class=\"content\">
                      <div class=\"row\">
                        <div class=\"col-sm-4\">
                          <img class=\"img-responsive\" src=\"img/control-panel.png\">
                        </div>
                        <div class=\"col-sm-8\">";
            if ($panel_data[$i]["name"]){
              echo "<h1>".$panel_data[$i]["name"]."</h1>";
            }
            else{
              echo "<h1>Control Panel <b>#".$panel_data[$i]["uid"]."</b></h1>";
            }
            $tags_active = 0;
            $tags_spoiling = 0;
            for ($j = 0; $j < count($tag_data); $j++){
              if ($tag_data[$j]["controluid"] == $panel_data[$i]["uid"]){
                $tags_active += 1;
                if ($tag_data[$j]["expiry_date"] - time() <= 259200 && $tag_data[$j]["expiry_date"] - time() > 0){
                  $tags_spoiling += 1;
                }
              }
            }
            echo "<h3><b>".$tags_active."</b> Active Tags</h3>";
            echo "<h3 class=\"text-warning\"><b>".$tags_spoiling."</b> Tags Spoiling Soon</h3>";
            echo "</div>";
            echo "</div>";
            echo "</div>";


            echo "<div class=\"text-center\">
                    <h3><a data-toggle=\"collapse\" href=\"#collapsePanel".$panel_data[$i]["uid"]."\" aria-expanded=\"false\" aria-controls=\"collapsePanel".$panel_data[$i]["uid"]."\">View Tags <i class=\"material-icons\">keyboard_arrow_down</i></a></h3>
                  </div>";
            echo"<div class=\"collapse\" id=\"collapsePanel".$panel_data[$i]["uid"]."\">
                  <div class=\"table-responsive\">
                    <table class=\"table\">
                      <thead>
                        <th class=\"text-center\">Image</th>
                        <th>Nickname</th>
                        <th>State</th>
                        <th>Checkin Date</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Stored</th>
                        <th>Expiry Date</th>
                      </thead>
                      <tbody>";
                echo "<tr>";
                for ($j = 0; $j < count($tag_data); $j++){
                  echo "<th><img class=\"img-responsive\" src=\"img/tags/" . $tag_data[$j]['pattern'] . ".png\" alt=\"Tag Image\" style=\"max-width:50%;margin-left: auto;margin-right: auto;\"/></a></th>";
                  echo "<th>" . $tag_data[$j]['name'] . "</th>";
                  //calculate state based upon expiry date
                  if ($tag_data[$j]['expiry_date'] > 0){ //if expiry date entered
                    $compare_date = $tag_data[$j]['expiry_date'];

                  } else { //if expiry date not entered
                    //TODO get food lifespan from database, add number to check-in date to get compare date
                  }
                  if (time() > $compare_date){
                    $text_color = "danger";
                    $text = "Spoiled";
                  } else if (($compare_date - time()) < 259200){
                    $text_color = "warning";
                    $text = "Spoiling Soon";
                  } else {
                    $text_color = "success";
                    $text = "Fresh";
                  }
                  echo "<th><span class=\"text-" . $text_color . "\">" . $text . "</span></th>";
                  echo "<th>" . date('Y/m/d', $tag_data[$j]['last_activation_date']) . "</th>";
                  if ($tag_data[$j]['description']){
                    echo "<th>" . $tag_data[$j]['description'] . "</th>";
                  }
                  else{
                    echo "<th>No Description Available.</th>";
                  }
                  echo "<th>" . $tag_data[$j]['category'] . "</th>";
                  if (!$tag_data[$j]['fridge_freezer']){
                    $text_color = "info";
                    $text = "Refrigerated";
                  } else {
                    $text_color = "primary";
                    $text = "Frozen";
                  }
                  echo "<th><span class=\"text-" . $text_color . "\">" . $text . "</span></th>";
                  echo "<th>" . date('Y/m/d', $tag_data[$j]['expiry_date']) . "</th>";
                  echo "</tr>";
                }
                echo "  </tbody>
                </table>
              </div>
            </div>
          </div>
        ";
      }
                ?>
        <!--
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
      -->
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
