<?php require 'common.php'; ?>
<?php
  if(empty($_SESSION['user'])) {
    header("Location: login.php");
		die("Redirecting to login.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <script>
      var ID;
      function clickEditTag(id){
        ID = id;
      }

      function editTag(){

        params = {
          id:ID,
          name:document.getElementById("tagName").value,
          description:document.getElementById("tagDescription").value,
          state:1,
          category:document.getElementById("tagCategory").value,
          raw_cooked:((document.getElementById("cooked").checked)?1:0),
          fridge_freezer:((document.getElementById("frozen").checked)?1:0),
          expiry_date:(new Date(document.getElementById("tagExpiry").value)).getTime()/1000

        };

        post("back_edittag.php", params , "post")


      }

      function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
    </script>
  </head>
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
                <?php
                //TODO fix card shifting
                //get tag data
                include_once("fetchtagdata.php");
                $tag_data = fetchTagData(false, null);
                for ($i = 0; $i < count($tag_data); $i++){
                  if (($i+1) % 3 == 0){
                    echo "<div class=\"row\">";
                  }
                  echo "<div class=\"col-sm-4\">
                          <div class=\"card card-product\">
                            <div class=\"content\">
                              <a data-toggle=\"collapse\" href=\"#tag-detail-" . ($i+1) . "\" aria-expanded=\"false\" aria-controls=\"tag-detail-" . ($i+1) . "\">";
                  echo "<img class=\"img-responsive\" src=\"img/tags/" . $tag_data[$i]['pattern'] . ".png\" alt=\"Tag Image\" style=\"max-width:50%;margin-left: auto;margin-right: auto;\"/>";
                  echo "</a>";
                  echo "<div class=\"text-center\">";
                  echo "<h2>" . $tag_data[$i]['name'] . "</h2>";
                  //calculate state based upon expiry date
                  if ($tag_data[$i]['expiry_date'] > 0){ //if expiry date entered
                    $compare_date = $tag_data[$i]['expiry_date'];

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
                  echo "<h4>" . $tag_data[$i]['category'] . "</h4>";
                  if (!$tag_data[$i]['fridge_freezer']){
                    $text_color = "info";
                    $text = "Refrigerated";
                  } else {
                    $text_color = "primary";
                    $text = "Frozen";
                  }
                  echo "<h4 class=\"text-" . $text_color . "\">" . $text . "</h4>";
                  echo "<p>" . $tag_data[$i]['description'] . "</p>";
                  echo "<button type=\"button\" id=\"" . $tag_data[$i]['uid'] . "\" class=\"btn btn-primary btn-lg\" data-toggle=\"modal\" data-target=\"#editTagsModal\" onclick=\"clickEditTag(this.id);\">
                        Edit
                      </button>";
                  echo "</div>
                          </div>
                            </div>
                              </div>
                                </div>";
                  if (($i+1) % 3 == 0){
                    echo "</div>";
                  }
                }
                ?>
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
                      <th></th>
                    </thead>
                    <tbody>
                      <?php
                        //get tag data
                        include_once("fetchtagdata.php");
                        $tag_data = fetchTagData(false, null);
                        echo "<tr>";
                        for ($i = 0; $i < count($tag_data); $i++){
                          echo "<th><img class=\"img-responsive\" src=\"img/tags/" . $tag_data[$i]['pattern'] . ".png\" alt=\"Tag Image\" style=\"max-width:25%;margin-left: auto;margin-right: auto;\"/></a></th>";
                          echo "<th>" . $tag_data[$i]['name'] . "</th>";
                          //calculate state based upon expiry date
                          if ($tag_data[$i]['expiry_date'] > 0){ //if expiry date entered
                            $compare_date = $tag_data[$i]['expiry_date'];

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
                          echo "<th>" . date('Y/m/d', $tag_data[$i]['last_activation_date']) . "</th>";
                          if ($tag_data[$i]['description']){
                            echo "<th>" . $tag_data[$i]['description'] . "</th>";
                          }
                          else{
                            echo "<th>No Description Available.</th>";
                          }
                          echo "<th>" . $tag_data[$i]['category'] . "</th>";
                          if (!$tag_data[$i]['fridge_freezer']){
                            $text_color = "info";
                            $text = "Refrigerated";
                          } else {
                            $text_color = "primary";
                            $text = "Frozen";
                          }
                          echo "<th><span class=\"text-" . $text_color . "\">" . $text . "</span></th>";
                          echo "<th>" . date('Y/m/d', $tag_data[$i]['expiry_date']) . "</th>";
                          echo "<th>";
                          echo "<button class=\"btn btn-primary btn-lg\" type=\"button\" id=\"" . $tag_data[$i]['uid'] . "\" data-toggle=\"modal\" data-target=\"#editTagsModal\" onclick=\"clickEditTag(this.id);\">
                                Edit
                              </button>";
                          echo "</th>";
                          echo "</tr>";
                        }

                      ?>
                      <!--<tr>
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
                      </tr>-->
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
    <!--MODAL-->
    <div class="modal fade" id="editTagsModal" tabindex="-1" role="dialog" aria-labelledby="editTagsModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    					<i class="material-icons">clear</i>
    				</button>
    				<h4 class="modal-title" id="editTagsModalLabel">Edit Tag <b><span id="modal-header"></span></b></h4>
    			</div>
    			<div class="modal-body">
    				<form>
            	<div class="form-group">
            		<label for="tagName" class="control-label">Tag Nickname</label>
          	  	<input type="text" class="form-control" id="tagName" />
    					</div>
    					<div class="form-group">
    						<label class="control-label">Datepicker</label>
    						<input id="tagExpiry" type="text" class="datepicker form-control" value="03/12/2016" />
    					</div>
        			<select id="tagCategory" class="select form-control" placeholder="Choose Tag Food Category">
	        	    <option disabled selected class="disabled"> Choose Tag Food Category</option>
	            	<option value="produce">Produce </option>
	            	<option value="meat">Meat</option>
	            	<option value="dairy (liquid)">Liquid Dairy</option>
	            	<option value="dairy (solid)">Solid Dairy</option>
	            	<option value="other">Other</option>
			        </select>
              <div class="row">
                <div class="col-sm-6">
                  <div class="radio">
        						<label>
        							<input type="radio" name="rf" id="frozen" value="frozen" /> Frozen
        						</label>
        					</div>
            	 		<div class="radio">
        						<label>
        							<input type="radio" name="rf" id="refrigerated" value="refrigerated" /> Refrigerated
        						</label>
        					</div>
                </div>
                <div class="col-sm-6">
                  <div class="radio">
                    <label>
                      <input type="radio" name="rc" id="cooked" value="cooked" /> Cooked
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="rc" id="raw" value="raw" /> Raw
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="tagDescription" class="control-label">Tag Description</label>
                <textarea class="form-control" rows="1"  id="tagDescription"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success btn-simple" onclick="editTag()">Submit</button>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL-->
  </body>
</html>
