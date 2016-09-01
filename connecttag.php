<?php require 'common.php'; ?>
<?php
  function connectTag($eTagData){
    require 'common.php';

    //get json data from arduino

    //recieves data in form of
    /*{
      "uid": (UID),
      "pattern": (PATTERN),
      "controluid": (CONTROLUID),
      "state": (STATE),
      "category": (CATEGORY),
      "raw_cooked": (RAW_COOKED),
      "fridge_freezer": (FRIDGE_FREEZER)
    } where () is replaced with value */

    $raw_data = $eTagData;
    //$raw_data = $_POST['tagData'];

    $tag_data = json_decode($raw_data, true);

    $query = "
      SELECT uid
      FROM panels
      WHERE alpha_uid = :alpha_uid
    ";

    $query_params = array(
      ':alpha_uid' => $tag_data['controluid']
    );

    try
    {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex)
    {
      die("Failed to run query: " . $ex->getMessage());
    }

    $data = $stmt->fetchAll();

    $controlId = $data[0]['uid'];

    $query = "
      SELECT uid
      FROM tags
      WHERE uid = :uid
    ";

    $query_params = array(
      ':uid' => $tag_data['uid']
    );

    try
    {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex)
    {
      die("Failed to run query: " . $ex->getMessage());
    }

    $query_params = array(
      ':uid' => $tag_data['uid'],
      ':pattern' => $tag_data['pattern'],
      ':controluid' => $controlId,
      ':state' => $tag_data['state'],
      ':last_activation_date' => time(),
      ':category' => $tag_data['category'],
      ':raw_cooked' => $tag_data['raw_cooked'],
      ':fridge_freezer' => $tag_data['fridge_freezer']
    );

    //no match, add tag as new entry
    if ($stmt->rowCount() == 0){

      $query = "
        INSERT INTO tags
        (uid, pattern, controluid, state, last_activation_date, category, raw_cooked, fridge_freezer)
        VALUES
        (:uid, :pattern, :controluid, :state, :last_activation_date, :category, :raw_cooked, :fridge_freezer)
      ";

      try
      {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex)
      {
        die("Failed to run query: " . $ex->getMessage());
        return false;
      }

      return true;

    } else {//found match, update existing tag information

      $query = "
        UPDATE tags
        SET pattern = :pattern,
          controluid = :controluid,
          state = :state,
          last_activation_date = :last_activation_date,
          category = :category,
          raw_cooked = :raw_cooked,
          fridge_freezer = :fridge_freezer
        WHERE uid = :uid
      ";

      try
      {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex)
      {
        return false;
        die("Failed to run query: " . $ex->getMessage());
      }
      return true;
    }
  }
?>
