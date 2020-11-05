<?php 
    $page_title = "Edynak User Authentication System - Login Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';
    include_once 'includes/partials/parseLogin.php';
?>

<div class="loginContainer">

  <div class="flag">
    
  </div>
  <br>
    <div class="column">
        <div class="header">
            <h1>Sign in Form</h1>
            <h4>Login</h4>
            <span>to continue to site</span>
            <?php 
                if(isset($result)) echo $result;
                if(!empty($form_errors)) echo show_errors($form_errors); 
            ?>
        </div>
        <div class="loginForm">
            <form action="login.php" method="POST">
                <input type="text" name="email" class="form-control" placeholder="Email">
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <br>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="remember">Remember me</label>
                    <p class="forgotPasswordMessage">Forgot password?<a href="forgot_password.php"> Click here</a></p>
                </div>
				<div class="btn-div">
                    <input type="submit" class="btn btn-primary float-right" name="loginBtn" value="Login" /> 
                 </div>
            </form>
            <input type="submit" class="btn btn-danger float-left" onclick="window.location.href='index.php';" value="Back" /> 
            <br><br>
            <p class="registerMessage float-left">Not yet a member?<a href="register.php"> Register here</a></p>
        </div>
    </div>
</div><!-- /.container -->

<?php 
    include_once 'includes/partials/footers.php';
?>
