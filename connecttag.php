<?php require 'common.php'; ?>
<?php
  if (!(empty($_POST))){

    require 'common.php';

    $query = "
    SELECT uid
    FROM tags
    WHERE uid = :uid";

    $query_params = array(
      ':uid' => $_POST['uid']
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
      ':uid' => $_POST['uid'],
      ':pattern' => $_POST['pattern'],
      ':controluid' => $_POST['controluid'],
      ':state' => $_POST['state'],
      ':last_activation_date' => $_POST['last_activation_date'],
      ':category' => $_POST['category']
    );

    //no match, add tag as new entry
    if ($stmt->rowCount() == 0){

      $query = "
      INSERT INTO tags
      (uid, pattern, controluid, state, last_activation_date, category)
      VALUES
      (:uid, :pattern, :controluid, :state, :last_activation_date, :category)";

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

      $query = "
      UPDATE tags
      SET pattern = :pattern,
        controluid = :controluid,
        state = :state,
        last_activation_date = :last_activation_date,
        category = :category
      WHERE uid = :uid";

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
    <form action="?" class="form" method="post">
      <input type="number" placeholder="uid" name="uid" id="uid" required="">
      <input type="number" placeholder="pattern" name="pattern" id="pattern" required="">
      <input type="number" placeholder="controluid" name="controluid" id="controluid" required="">
      <input type="number" placeholder="state" name="state" id="state" required="">
      <input type="number" placeholder="date" name="last_activation_date" id="last_activation_date" required="">
      <input type="text" placeholder="category" name="category" id="category" required="">
      <input type="submit">
    </form>
  </body>
</html>
