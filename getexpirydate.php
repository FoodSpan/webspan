<?php require 'common.php' ?>
<?php
  function getExpiryDate($category, $raw_cooked, $fridge_freezer){
    require 'common.php';

    $query = "
    SELECT span_seconds
    FROM expiry_by_category
    WHERE category = :category
    AND raw_cooked = :raw_cooked
    AND fridge_freezer = :fridge_freezer";

    $query_params = array(
      ':category'=>strtolower($category),
      ':raw_cooked'=>$raw_cooked,
      ':fridge_freezer'=>$fridge_freezer
    );

    try
    {
      $stmt = $db->prepare($query);
      $result = $stmt->execute($query_params);

      $row = $stmt->fetch();
      $span_seconds = $row['span_seconds'];

      return (time() + $span_seconds);
    }
    catch(PDOException $ex)
    {
      //no category match found, do nothing
    }
  }
?>
