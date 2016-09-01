<?php require 'common.php'; ?>
<?php
  if(empty($_SESSION['user'])) {
    header("Location: login.php");
		die("Redirecting to login.php");
  }
?>
<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
				<h1>Connect a Control Panel to your Account</h1>
				<p class="lead">
					Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.
				</p>
		    <form class="form" method="post" action="back_connectpanel.php">
					<h3>Account Name: <?php echo $_SESSION['user']['name']?></h3>
					<h3>Account Email: <?php echo $_SESSION['user']['email']?></h3>
					<div class="form-group">
						 <label for="uid">Control Panel Unique ID</label>
		      	<input class="form-control" type="text" placeholder="e.g. 4EVA" name="uid" id="uid" required="">
					</div>
		      <button type="submit" class="btn btn-success btn-round btn-raised">Connect Panel</button>
		    </form>
			</div>
		</div>
		<?php include_once 'footer.html' ?>
	</body>
</html>
