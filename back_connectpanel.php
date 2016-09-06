<?php require 'common.php'; ?>
<?php
	function connectPanel($is_endpoint, $email, $ePanelData){

	  require 'common.php';

		$panelData = JSON_decode($ePanelData);

		$query = "
		SELECT accountid
		FROM panels
		WHERE alpha_uid = :uid";

		if ($is_endpoint){
			$uid = $panelData->alphaId;
		} else {
			$uid = $_POST['uid'];
		}

		$query_params = array(
			':uid' => $uid,
		);

		try
		{
			$stmt = $db->prepare($query);
			$result = $stmt->execute($query_params);

			$row = $stmt->fetch();

			if ($row['accountid'] != null){
				return false;
			}
		}
		catch(PDOException $ex)
		{
			die("Failed to run query: " . $ex->getMessage());
		}

		if ($is_endpoint){
			$name = $panelData->name;
			$description = $panelData->description;
		} else {
			$email = $_SESSION['user']["email"];
			$name = $_POST['name'];
			$description = $_POST['description'];
		}

		$query_params = array(
			':uid' => $uid,
			':email' => $email,
			':name' =>  $name,
			':description' => $description
		);

	      $query = "
	      UPDATE panels
	      SET accountid = (
	        SELECT id
	        FROM users
	        WHERE email = :email),
					name = :name,
					description = :description
	      WHERE alpha_uid = :uid";

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
