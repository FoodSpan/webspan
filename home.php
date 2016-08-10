<?php include_once 'common.php' ?>
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
        <h1>Hi <?php echo $_SESSION['user']['name']?>, you made it!</h1>
      </div>
    </div>
    <?php include_once 'footer.html' ?>
  </body>
</html>
