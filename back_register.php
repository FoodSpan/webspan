<?php require 'common.php'; ?>
<?php
  if(!(empty($_SESSION['user']))) {
    header("Location: home.php");
    die("Redirecting to home.php");
  }
?>
<?php
  function register($is_endpoint, $eEmail, $ePassword){

        if (!$is_endpoint){
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

        if (!$is_endpoint){
          $query_params = array(
            ':email' => $_POST['email']
          );
        } else {
          $query_params = array(
            ':email' => $eEmail
          );
        }

        try {
          $stmt = $db->prepare($query);
          $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex) {
          die("Failed to run query: " . $ex->getMessage());
        }

        $row = $stmt->fetch();

        if($row) {
          if ($is_endpoint){
            return false;
          }
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

        if (!$is_endpoint){
          $query_params = array(
            ':password' => $password,
            ':salt' => $salt,
            ':email' => $_POST['email'],
            ':name' => $_POST['name']
          );
        } else {
          $query_params = array(
            ':password' => $password,
            ':salt' => $salt,
            ':email' => $eEmail,
            ':name' => $ePassword
          );
        }

        try {
          $stmt = $db->prepare($query);
          $result = $stmt->execute($query_params);

          if ($is_endpoint){
            return true;
          }

          header("Location: login.php");
        }

        catch(PDOException $ex)
        {
          die("Failed to run query: " . $ex->getMessage());
          header("Location: register.php");
        }
      }
    if (isset($_GET['register']) && !empty($_POST)){
      register(false, null, null);
    }
?>
