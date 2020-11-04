<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<a class="navbar-brand" href="index.php">EUAS</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
            
  <div class="collapse navbar-collapse" id="navbar">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <?php if(isset($_SESSION['username'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="#About">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="#About">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">SignUp</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="#Contact">Contact</a>
      </li>
      <?php endif ?>
    </ul>
  </div><!--/.nav-collapse -->
</nav>