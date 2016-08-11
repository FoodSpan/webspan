<?php require 'common.php'; ?>
<?php
	function assoPanel(){

    if (!empty($_SESSION['user'])){

      require 'common.php';

      $query = "
      UPDATE panels
      SET accountid = (
        SELECT id
        FROM users
        WHERE email = :email)
      WHERE uid = :uid";

        $query_params = array(
          ':uid' => $_POST['uid'],
          ':email' => $_SESSION['user'][1]
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
  assoPanel();
?>

<!DOCTYPE html>
<html>
  <body>
    <form class="form" method="post" action="?">
      <input type="number" placeholder="uid" name="uid" id="uid" required="">
      <input type="submit">
    </form>
  <body>
</html>
