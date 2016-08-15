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

    $query = "
      SELECT uid
      FROM tags
      WHERE uid = :uid
    ";

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
      ':last_activation_date' => time(),
      ':category' => $_POST['category']
    );

    //no match, add tag as new entry
    if ($stmt->rowCount() == 0){

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
