<?php require 'common.php'; ?>
<?php
  function fetchPanelData($is_endpoint, $eId){
    if (!(empty($_SESSION['user']))){

      $query = "
      select panels.*
      FROM panels
      WHERE accountid = :accountid
      ";

      $query_params = array(
        ':accountid'=> $_SESSION['user']['id']
      );

      require 'common.php';

      try
      {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex)
      {
        die("Failed to run query: " . $ex->getMessage());
      }

      $panel_data = $stmt->fetchAll();

      return $panel_data;
    }
  }
?>
