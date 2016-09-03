<?php require 'common.php';?>
<?php
//TODO code is_endpoint
  function editTag($is_endpoint, $eId, $eTagData){

    $tagData = json_decode($eTagData);

    //die (var_dump($tagData));

    $query = "
      UPDATE tags INNER JOIN panels, users
      SET tags.name = :name,
        tags.description = :description,
        tags.state = :state,
        tags.category = :category,
        tags.raw_cooked = :raw_cooked,
        tags.fridge_freezer = :fridge_freezer,
        tags.expiry_date = :expiry_date
      WHERE tags.uid = :uid
      AND tags.controluid = panels.uid
      AND panels.accountid = :userid
    ";

    if ($is_endpoint){
      $query_params = array(
        ':userid' => $eId,
        ':uid' => $tagData->uid,
        ':name' => $tagData->name,
        ':description' => $tagData->description,
        ':state' => $tagData->state,
        ':category' => $tagData->category,
        ':raw_cooked' => $tagData->raw_cooked,
        ':fridge_freezer' => $tagData->fridge_freezer,
        ':expiry_date' => $tagData->expiry_date
      );
    } else {
      //TODO POST online stuff
    }

    include 'common.php';

    try
    {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
      if ($is_endpoint){
        return true;
      }
    }
    catch(PDOException $ex)
    {
      if ($is_endpoint){
        return false;
      }
      die("Failed to run query: " . $ex->getMessage());
    }

    return true;
  }
?>
