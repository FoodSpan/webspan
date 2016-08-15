<?php require 'common.php'; ?>
<?php
  if(empty($_SESSION['user'])) {
    header("Location: login.php");
		die("Redirecting to login.php");
  }
?>
<?php
  if (!(empty($_POST))){

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

    $raw_data = $_POST['tag_data'];

    $tag_data = json_decode($raw_data, true);

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
      ':controluid' => $tag_data['controluid'],
      ':state' => $tag_data['state'],
      ':last_activation_date' => time(),
      ':category' => $tag_data['category']
      //TODO add to webspan.SQL before implementing
      //,':raw_cooked' => $_tag_data['raw_cooked'],
      //':fridge_freezer' => $tag_data['fridge_freezer']
    );

    //no match, add tag as new entry
    if ($stmt->rowCount() == 0){

      //TODO modify query to add raw_cooked & fridge_freezer
      $query = "
        INSERT INTO tags
        (uid, pattern, controluid, state, last_activation_date, category)
        VALUES
        (:uid, :pattern, :controluid, :state, :last_activation_date, :category)
      ";

      try
      {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex)
      {
        die("Failed to run query: " . $ex->getMessage());
      }

    } else {//found match, update existing tag information

      //TODO modify query to add raw_cooked & fridge_freezer
      $query = "
        UPDATE tags
        SET pattern = :pattern,
          controluid = :controluid,
          state = :state,
          last_activation_date = :last_activation_date,
          category = :category
        WHERE uid = :uid
      ";

      try
      {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex)
      {
        die("Failed to run query: " . $ex->getMessage());
      }
    }
  }
?>

<!DOCTYPE html>
<html>
  <body>
    <form class="form" method="post" action="?">
      <input type="text" placeholder="tag_data" name="tag_data" id="tag_data" required="">
      <input type="submit">
    </form>
  <body>
</html>
