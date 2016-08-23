<?php require 'common.php'; ?>
<?php
  if (!(empty($_POST))){
    /*post in JSON format:
      {
        "email":"a@a.com",
        "password":"aaaaaa",
        "function":"blank",
        "parameter":"whatever"
      }
    */

    $request = $_POST['request'];
    $request = json_decode($request, true);

    //if registering
    if ($request['function'] == "register"){

      include_once('back_register.php');

      if(register(true, $request['email'], $request['password'])){
        die ("reg_success");
      } else {
        die ("reg_fail");
      }

    } else { //validate credentials

      include_once("back_login.php");

      if ($request['parameter'] == "hashed"){
        $user_info = login(true, true, $request['email'], $request['password']);
      } else {
        $user_info = login(true, false, $request['email'], $request['password']);
      }

      if (!$user_info){
        die ("bad_credentials");
      } else {
        if ($request['function'] == "login"){ //get user information
          die ($user_info['password']);

        } else if ($request['function'] == "get_default"){//get panel and tag data
          include_once('fetchpaneldata.php');
          include_once('fetchtagdata.php');
          $panel_data = fetchPanelData(true, $user_info['id']);
          $tag_data = fetchTagData(true, $user_info['id']);
          die ("{\"panel\":" . json_encode($panel_data) . ", \"tag\":" . json_encode($tag_data) . "}");

        } else if ($request['function'] == "get_panels"){//get panel data
          include_once('fetchpaneldata.php');
          $panel_data = fetchPanelData(true, $user_info['id']);
          die (json_encode($panel_data));

        } else if ($request['function'] == "get_tags_user"){//get tag data
          include_once('fetchtagdata.php');
          $tag_data = fetchTagData(true, $user_info['id']);
          die (json_encode($tag_data));

        } else if ($request['function'] == "get_tags_cp"){
          //TODO send data to Arduino
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html>
  <body>
    <form class="form" method="post" action="?">
      <input type="text" placeholder="request" name="request" id="request" required="">
      <input type="submit">
    </form>
  <body>
</html>
