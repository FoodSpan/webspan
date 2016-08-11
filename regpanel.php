<?php require 'common.php'; ?>
<?php
	function regPanel(){
		if(!empty($_POST)){

      require 'common.php';
      $query = "
        INSERT INTO panels
        (uid, accountid, version)
        VALUES
        (:uid, null, :version)";

        $query_params = array(
          ':uid' => $_POST['uid'],
          ':version' => $_POST['version']
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
    }
  }
  regPanel();
?>

<!DOCTYPE html>
<html>
  <body>
    <form class="form" method="post" action="?">
      <input type="number" placeholder="uid" name="uid" id="uid" required="">
      <input type="text" placeholder="version" name="version" id="version" required="">
      <input type="submit">
    </form>
  <body>
</html>
