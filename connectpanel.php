<?php require 'common.php'; ?>

<?php
	function connectPanel(){

		if (!(empty($_POST))){
	    if (!(empty($_SESSION['user']))){

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
          die ("Control Panel ID not registered");
        }
      }
		}
  }
  connectPanel();
?>

<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
				<h1>Connect a Control Panel to your Account</h1>
		    <form class="form" method="post" action="?">
					<h3>Account Name: <?php echo $_SESSION['user']['name']?></h3>
					<h3>Account Email: <?php echo $_SESSION['user']['email']?></h3>
		      <input class="form-control" type="number" placeholder="Control Panel UID" name="uid" id="uid" required="">
		      <button type="submit" class="btn btn-success btn-round btn-raised">Submit</button>
		    </form>
			</div>
		</div>
		<?php include_once 'footer.html' ?>
	</body>
</html>
