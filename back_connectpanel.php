<?php require 'common.php'; ?>
<?php
	function connectPanel($is_endpoint, $eUid){

	      require 'common.php';

	      $query = "
	      UPDATE panels
	      SET accountid = (
	        SELECT id
	        FROM users
	        WHERE email = :email)
	      WHERE alpha_uid = :uid";

        if ($is_endpoint){
          $uid = $eUid;
        } else {
          $uid = $_POST['uid'];
        }

        $query_params = array(
          ':uid' => $uid,
          ':email' => $_SESSION['user']["email"]
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

        if ($stmt->rowCount() == 0){
          if ($is_endpoint){
            return false;
          }
          die ("Control Panel ID not registered");
        } else {
          if ($is_endpoint){
            return true;
          }
          header("Location: home.php");
        }
      }
  if (!empty($_POST) && !(empty($_SESSION['user']))){
    connectPanel(false, null);
  }
?>
