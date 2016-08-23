<?php require 'common.php'; ?>
<?php
	function login($is_endpoint, $is_hashed, $eEmail, $ePassword){

      $submitted_email = '';
      $correction = 'none';

        // This next line of code fixes broken things. Leave it in here, even though it makes no sense.
        require 'common.php';
        $query = "
          SELECT *
          FROM users
          WHERE
            email = :email";

        if (!$is_endpoint){
          $query_params = array(
            ':email' => $_POST['email']
          );
        } else {
          $query_params = array(
            ':email' => $eEmail
          );
        }

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
          if ($is_endpoint && !$is_hashed){
            $check_password = hash('sha256', $ePassword . $row['salt']);
          } else if ($is_endpoint && $is_hashed){
						$check_password = $ePassword;
					} else {
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
          }

					if (!$is_hashed){
	          for($round = 0; $round < 65536; $round++)
	          {
	            $check_password = hash('sha256', $check_password . $row['salt']);
	          }
					}

          if($check_password === $row['password'])
          {
            $login_ok = true;
          }
        }

        if($login_ok)
        {
          unset($row['salt']);

					if (!$is_endpoint){
          	unset($row['password']);
					}

          $_SESSION['user'] = $row;

          if ($is_endpoint){
            return $row;
          }

          header("Location: home.php");
          die("Redirecting to: home.php");
        }
        else
        {
          $correction = 'block';

          $submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');

          if ($is_endpoint){
            return false;
          }

          header("Location: login.php");
          die("Redirecting to: login.php");
        }
      }
  if (isset($_GET['login']) && !empty($_POST)){
    login(false, null, null);
  }
?>
