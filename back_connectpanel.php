<?php require 'common.php'; ?>
<?php
  if(empty($_SESSION['user'])) {
    header("Location: login.php");
		die("Redirecting to login.php");
  }
?>
<?php
	function connectPanel($is_endpoint, $eUid){

		if (!(empty($_POST))){
	    if (!(empty($_SESSION['user']))){

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
		}
  }
  if (!empty($_POST)){
    connectPanel(false, null);
  }
?>
