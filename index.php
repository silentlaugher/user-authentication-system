<?php 
    $page_title = "Edynak User Authentication System - Home Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';
    include_once 'includes/classes/Database.php';
?>

<div class="container">

  <div class="flag">
    <h1>Edynak User Authentication System</h1>
    <p class="lead">You are not currently signed in. Already have an account? <a href="login.php">Login</a></p>
    <p class="lead">You are currently signed in as {username} <a href="logout.php">Sign out</a></p>
    <p class="lead">Not yet a member? <a href="register.php">Register</a></p>
  </div>

</div><!-- /.container -->

<?php 
    include_once 'includes/partials/footers.php'
?>
