<?php 
    $page_title = "Edynak User Authentication System - Login Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';
?>

<div class="loginContainer">

  <div class="flag">
    <h1>Edynak User Authentication System</h1>
  </div>
  <br>
    <div class="column">
        <div class="header">
            <h3>Login</h3>
            <span>to continue to site</span>

        </div>
        <div class="loginForm">
            <form action="login.php">
                <input type="text" name="email" class="form-control" placeholder="Email" required>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <br>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="remember">Remember me</label>
                    <p class="forgotPasswordMessage">Forgot password?<a href="forgot_password.php"> Click here</a></p>
                </div>
				<div class="btn-div">
                    <input type="button" class="btn btn-danger float-left" onclick="window.location.href='index.php';" value="Back" /> 
                    <input type="button" class="btn btn-primary float-right" onclick="window.location.href='login.php';" value="Login" /> 
                 </div>
            </form>
            <br><br>
            <p class="registerMessage float-left">Not yet a member?<a href="register.php"> Register here</a></p>
        </div>
    </div>
</div><!-- /.container -->

<?php 
    include_once 'includes/partials/footers.php'
?>
