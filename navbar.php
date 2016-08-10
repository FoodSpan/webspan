<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-container" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">WebSpan</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-container">
      <ul class="nav navbar-nav">
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">App</a>
        </li>
        <li>
          <a href="#">Blog</a>
        </li>
        <li>
          <a href="#">Shop</a>
        </li>
        <li>
          <a href="#">Team</a>
        </li>
        <li>
          <a href="#">Contact Us</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(empty($_SESSION['user'])) { ?>
          <li>
            <a href="register.php" class="btn btn-success btn-raised btn-round">
              Register
            </a>
          </li>
          <li>
            <a href="login.php" class="btn btn-rose btn-raised btn-round">
              Login
            </a>
          </li>
        <?php } else { ?>
          <li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo $_SESSION['user']['name'];?>'s Fridge <b class="caret"></b>
            </a>
          	<ul class="dropdown-menu dropdown-menu-right">
              <li><a href="home.php">Home</a></li>
              <li><a href="#">Control Panels</a></li>
              <li><a href="#">Tags</a></li>
              <li class="divider"></li>
              <li><a href="#">Settings</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
        	</li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
