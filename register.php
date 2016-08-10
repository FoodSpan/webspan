<?php require 'common.php'; ?>
<?php
  if(!(empty($_SESSION['user']))) {
    header("Location: home.php");
		die("Redirecting to home.php");
  }
?>
<?php
  function register(){
    if (isset($_GET['register'])){
      if(!empty($_POST)) {
        if( empty($_POST['email'])     ||
          empty($_POST['password'])  ||
          empty($_POST['password2']) ||
          empty($_POST['name'])

          ) {
          die("You missed a field");
        }

        if($_POST['password'] != $_POST['password2']) {
          die("Password Mismatch");
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          die("Invalid Email Address");
        }
        // This next line of code fixes broken things. Leave it in here, even though it makes no sense.
        require 'common.php';
        $query = "
          SELECT
            1
          FROM users
          WHERE
            email = :email
        ";

        $query_params = array(
          ':email' => $_POST['email']
        );

        try {
          $stmt = $db->prepare($query);
          $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex) {
          die("Failed to run query: " . $ex->getMessage());
        }

        $row = $stmt->fetch();

        if($row) {
          die("This email address is already registered");
        }

        $query = "
          INSERT INTO users (
            password,
            salt,
            email,
            name
          ) VALUES (
            :password,
            :salt,
            :email,
            :name
          );
        ";

        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

        $password = hash('sha256', $_POST['password'] . $salt);

        for($round = 0; $round < 65536; $round++) {
          $password = hash('sha256', $password . $salt);
        }

        $query_params = array(
          ':password' => $password,
          ':salt' => $salt,
          ':email' => $_POST['email'],
          ':name' => $_POST['name']
        );

        try {
          $stmt = $db->prepare($query);
          $result = $stmt->execute($query_params);

          header("Location: login.php");
        }

        catch(PDOException $ex)
        {
          die("Failed to run query: " . $ex->getMessage());
          header("Location: register.php");
        }
      }
    }
  }
  register();
?>
<!DOCTYPE html>
<html>
  <?php include_once 'header.html' ?>
  <body>
    <?php include_once 'navbar.php' ?>
    <div class="main main-raised" style="padding-top:100px;">
      <div class="container">
        <div class="card card-signup">
						<form class="form" method="post" action="?register">
							<div class="header header-success text-center">
								<h4 class="card-title">Register</h4>
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
                    <i class="material-icons">face</i>
                  </span>
                  <input type="text" class="form-control" placeholder="Name" name="name" id="name" required="">
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
                <div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input type="password" placeholder="Confirm Password" class="form-control" name="password2" id="password2" required="">
								</div>
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-success btn-round btn-lg">Get Started</button>
							</div>
						</form>
					</div>
        </div>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
