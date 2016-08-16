<?php require 'common.php'; ?>
<?php
  if(empty($_SESSION['user'])) {
    header("Location: login.php");
		die("Redirecting to login.php");
  }
?>
<?php
  function fetchTagData(){
    if (!(empty($_SESSION['user']))){

      $query = "
      select tags.*
      FROM panels, tags
      WHERE accountid = :accountid
      AND panels.uid = controluid
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

      $tag_data = $stmt->fetchAll();

      return $tag_data;
    }
  }
?>
