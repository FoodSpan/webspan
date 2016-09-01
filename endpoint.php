<?php require 'common.php'; ?>
<?php

  if (isset($_SERVER['HTTP_ORIGIN'])) {
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Max-Age: 86400');    // cache for 1 day
  }

  // Access-Control headers are received during OPTIONS requests
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
          header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
          header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

      exit(0);
  }

  $postdata = file_get_contents("php://input");

  //$postdata = $_POST['request'];

  if (isset($postdata)){

    /*post in JSON format:
      {
        "email":"a@a.com",
        "password":"aaaaaa",
        "a_function":"blank",
        "parameter":"whatever"
      }
    */

    $request = json_decode($postdata, true);

    include_once('connecttag.php');

    if ($request['a_function'] == "add_tag"){
      if (connectTag($request['parameter'])){
        die ('addtag - success');
      } else {
        die('addtag - failure');
      }
    }
    //if registering
    else if ($request['a_function'] == "register"){

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
        if ($request['a_function'] == "login"){ //get user information
          die ("{\"password\": \"" . $user_info['password'] . "\",
            \"name\": \"" . $user_info['name'] . "\"}");

        } else if ($request['a_function'] == "get_default"){//get panel and tag data
          include_once('fetchpaneldata.php');
          include_once('fetchtagdata.php');
          $panel_data = fetchPanelData(true, $user_info['id']);
          $tag_data = fetchTagData(true, $user_info['id']);
          die ("{\"panel\":" . json_encode($panel_data) . ", \"tag\":" . json_encode($tag_data) . "}");

        } else if ($request['a_function'] == "get_panels"){//get panel data
          include_once('fetchpaneldata.php');
          $panel_data = fetchPanelData(true, $user_info['id']);
          die (json_encode($panel_data));

        } else if ($request['a_function'] == "get_tags_user"){//get tag data
          include_once('fetchtagdata.php');
          $tag_data = fetchTagData(true, $user_info['id']);
          die (json_encode($tag_data));

        } else if ($request['a_function'] == "reg_panel"){
          include_once('back_connectpanel.php');
          if(connectPanel(true, $request['parameter'])){
            die ("success");
          } else {
            die ("fail");
          }
        }else if ($request['a_function'] == "get_tags_cp"){
          //TODO send data to Arduino
        }
      }
    }
  }
?>
