<?php 
    $page_title = "Edynak User Authentication System - Home Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';
    include_once 'includes/core/session.php';
?>

<div class="container">
  <div class="flag">
    <h1>Edynak User Authentication System</h1>
    <?php if(!isset($_SESSION['username'])): ?>
        <p class="lead">You are currently not signed in <a href="login.php">Log in</a> Not yet a member? <a href="register.php">Register here</a></p>
    <?php else: ?>
    <p class="lead">You are currently signed in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Sign out</a></p>
    <?php endif ?>
<!--get ip address and other info -->
    <?php 
      $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'];
      echo "<br>".time();
       ($_SESSION['last_active'])){
         echo $_SESSION['last_active'];
       }; 
    ?>
  </div>

</div><!-- /.container -->

<?php 
    include_once 'includes/partials/footers.php'
?>
