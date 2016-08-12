<?php require 'common.php'; ?>
<?php
  if(!(empty($_SESSION['user']))) {
    header("Location: home.php");
		die("Redirecting to home.php");
  }
?>
<?php
	function login(){
		if (isset($_GET['login'])){
      $submitted_email = '';
      $correction = 'none';

      if(!empty($_POST))
      {
        // This next line of code fixes broken things. Leave it in here, even though it makes no sense.
        require 'common.php';
        $query = "
          SELECT *
          FROM users
          WHERE
            email = :email";

        $query_params = array(
          ':email' => $_POST['email']
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

        $login_ok = false;

        $row = $stmt->fetch();
        if($row)
        {
          $check_password = hash('sha256', $_POST['password'] . $row['salt']);
          for($round = 0; $round < 65536; $round++)
          {
            $check_password = hash('sha256', $check_password . $row['salt']);
          }

          if($check_password === $row['password'])
          {
            $login_ok = true;
          }
        }

        if($login_ok)
        {
          unset($row['salt']);
          unset($row['password']);

          $_SESSION['user'] = $row;

          header("Location: home.php");
          die("Redirecting to: home.php");
        }
        else
        {
          $correction = 'block';

          $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');

          header("Location: login.php");
          die("Redirecting to: login.php");
        }
      }
    }
  }
  login();
?>
<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
        <div class="card card-signup">
						<form class="form" method="post" action="?login">
							<div class="header header-rose text-center">
								<h4 class="card-title">Log in</h4>
                <!--
								<div class="social-line">
									<a href="#" class="btn btn-just-icon btn-simple">
										<i class="fa fa-facebook-square"></i>
									</a>
									<a href="#" class="btn btn-just-icon btn-simple">
										<i class="fa fa-google"></i>
									</a>
								</div>
              -->
							</div>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>
									<input type="email" class="form-control" placeholder="Email" name="email" id="email" required="">
								</div>

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input type="password" placeholder="Password" class="form-control" name="password" id="password" required="">
								</div>
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-rose btn-round btn-lg">Open Your Fridge</button>
							</div>
						</form>
					</div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
