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
            <h1>Hey <b><?php echo $_SESSION['user']['name']?></b> <small>It's <b><span id="date"></span>.</b></small></h1>
          </div>
        </div>
        <?php
          include_once "fetchpaneldata.php";
          include_once "fetchtagdata.php";
          $panel_data = fetchPanelData(false, null);
          $tag_data = fetchTagData(false, null);
        ?>
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <img class="img-responsive" src="img/control-panel.png">
              </div>
              <div class="col-sm-8">
                <?php
                if (count($panel_data) > 0){
                  if ($panel_data[0]["name"]){
                    echo "<h1>".$panel_data[0]["name"]."</h1>";
                  }
                  else{
                    echo "<h1>Control Panel <b>#".$panel_data[0]["uid"]."</b></h1>";
                  }
                  $tags_active = 0;
                  $tags_spoiling = 0;
                  $spoiling_tags = [];
                  for ($j = 0; $j < count($tag_data); $j++){
                    if ($tag_data[$j]["controluid"] == $panel_data[0]["uid"]){
                      $tags_active += 1;
                      if ($tag_data[$j]["expiry_date"] - time() <= 259200 && $tag_data[$j]["expiry_date"] - time() > 0){
                        $tags_spoiling += 1;
                        array_push($spoiling_tags, $tag_data[$j]);
                      }
                    }
                  }
                  echo "<h3><b>".$tags_active."</b> Active Tags</h3>";
                  echo "<h3 class=\"text-warning\"><b>".$tags_spoiling."</b> Tags Spoiling Soon</h3>";
                }
                else{
                  echo "<h1>You don't have any registered panels.</h1>";
                  echo "<h2>Register your panels <a href=\"#\">here.</a></h2>";
                }

                ?>
              </div>
            </div>
            <div class="text-center">
              <h3><a href="panels.php">View Control Panels</a></h3>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2>Spoiling Soon</h2>
            <?php
            if (count($spoiling_tags) > 0){
              for ($i = 0; $i < count($spoiling_tags); $i++){
                if (($i+1) % 3 == 0){
                  echo "<div class=\"row\">";
                }
                echo "<div class=\"col-sm-4\">
                        <div class=\"card card-product\">
                          <div class=\"content\">
                            <a data-toggle=\"collapse\" href=\"#tag-detail-" . ($i+1) . "\" aria-expanded=\"false\" aria-controls=\"tag-detail-" . ($i+1) . "\">";
                echo "<img class=\"img-responsive\" src=\"img/tags/" . $spoiling_tags[$i]['pattern'] . ".png\" alt=\"Tag Image\" style=\"max-width:50%;margin-left: auto;margin-right: auto;\"/>";
                echo "</a>";
                echo "<div class=\"text-center\">";
                echo "<h2>" . $spoiling_tags[$i]['name'] . "</h2>";
                //calculate state based upon expiry date
                if ($spoiling_tags[$i]['expiry_date'] > 0){ //if expiry date entered
                  $compare_date = $spoiling_tags[$i]['expiry_date'];

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
                echo "<h3 class=\"text-" . $text_color . "\">" . $text . "</h3>";
                echo "<a data-toggle=\"collapse\" href=\"#tag-detail-" . ($i+1) . "\" aria-expanded=\"false\" aria-controls=\"tag-detail-" . ($i+1) . "\">
                    More Information <i class=\"material-icons\">keyboard_arrow_down</i>
                    </a>
                    <div class=\"collapse\" id=\"tag-detail-" . ($i+1) . "\">";
                // Day Calculation Code Block
                $days = ceil(($compare_date - time())/86400);
                if ($days >= 0){
                  echo "<h3>Spoiling in: <br> <b>" . $days . " Day" . ($days > 1 ? "s":"") . "</b></h3>";
                }
                else{
                  echo "<h3 class=\"text-danger\">Spoiled for ". $days * -1 . " Day" . ($days < -1 ? "s":"") . "</h3>";
                }
                echo "<h4>" . $spoiling_tags[$i]['category'] . "</h4>";
                if (!$spoiling_tags[$i]['fridge_freezer']){
                  $text_color = "info";
                  $text = "Refrigerated";
                } else {
                  $text_color = "primary";
                  $text = "Frozen";
                }
                echo "<h4 class=\"text-" . $text_color . "\">" . $text . "</h4>";
                echo "<p>" . $spoiling_tags[$i]['description'] . "</p>";
                echo "</div>
                        </div>
                          </div>
                            </div>
                              </div>";
                if (($i+1) % 3 == 0){
                  echo "</div>";
                }
              }
            }
            else{
              echo "<h1>No tags spoiling. Fresh!</h1>";
            }

            ?>
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
      window.setInterval(function(){
        $("#date").html(moment().format('MMMM Do, h:mm a'));
      }, 1000);
    </script>
  </body>
</html>
