<?php 
    $page_title = "Edynak User Authentication System - Login Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';

    include_once 'includes/core/session.php';
    include_once 'includes/classes/Database.php';
    include_once 'includes/core/utilities.php';


    if(isset($_POST['loginBtn'])){
        // array to hold errors
        $form_errors = array();
    
        // validate
        $required_fields = array('email', 'password');
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    
        if(empty($form_errors)){
    
            // collect form data
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // check if user exist in the database
            $sqlQuery = "SELECT * FROM users WHERE email = :email";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array(':email' => $email));
    
           if($row = $statement->fetch()){
               $id = $row['user_id'];
               $hashed_password = $row['password'];
               $email = $row['email'];
               $username = $row['username'];
    
               if(password_verify($password, $hashed_password)){
                   $_SESSION['user_id'] = $id;
                   $_SESSION['email'] = $email;
                   $_SESSION['username'] = $username;
                   redirectTo('index');
               }else{
                   $result = flashMessage("Your credentials are incorrect. Invalid email or password");
               }
           }else{
             $result = flashMessage("Your credentials are incorrect. Invalid email or password");
           }
    
        }else{
            if(count($form_errors) == 1){
                $result = flashMessage("There was one error in the form");
            }else{
                $result = flashMessage("There were " .count($form_errors). " errors in the form");
            }
        }
    }
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
