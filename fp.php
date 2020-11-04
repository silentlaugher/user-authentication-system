<?php
include_once 'includes/partials/headers.php';
include_once 'includes/partials/nav.php';
//add our database connection script
include_once 'includes/classes/Database.php';
include_once 'includes/core/utilities.php';

//process the form if the reset password button is clicked
if(isset($_POST['pwResetBtn'])){
    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'new_password', 'confirm_password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('new_password' => 8, 'confirm_password' => 8);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){
        //collect form data and store in variables
        $email = $_POST['email'];
        $password1 = $_POST['new_password'];
        $password2 = $_POST['confirm_password'];

        //check if new password and confirm password is same
        if($password1 != $password2){
            $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> New password and confirm password does not match</p>";
        }else{
            try{
                //create SQL select statement to verify if email address input exist in the database
                $sqlQuery = "SELECT email FROM users WHERE email =:email";

                //use PDO prepared to sanitize data
                $statement = $db->prepare($sqlQuery);

                //execute the query
                $statement->execute(array(':email' => $email));

                //check if record exist
                if($statement->rowCount() == 1){
                    //hash the password
                    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                    //SQL statement to update password
                    $sqlUpdate = "UPDATE users SET password =:password WHERE email=:email";

                    //use PDO prepared to sanitize SQL statement
                    $statement = $db->prepare($sqlUpdate);

                    //execute the statement
                    $statement->execute(array(':password' => $hashed_password, ':email' => $email));

                    $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Password Reset Successful</p>";
                }
                else{
                    $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> The email address provided
                                does not exist in our database, please try again</p>";
                }
            }catch (PDOException $ex){
                $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
            }
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
        }
    }
}
?>
<div class="forgotPwContainer">
    <div class="flag">
    
    </div>
    <div class="column">
        <div class="header">
            <!--site logo goes here -->
            <h1>Forgot Password</h1>
            <h4>Form</h4>
            <span>Reset your password and continue to site</span>
            <?php 
                if(isset($result)) echo $result;
                if(!empty($form_errors)) echo show_errors($form_errors); 
            ?>       
        </div>
        <div class="forgotPwForm">
            <form method="POST" action="forgot_password.php">
        <table>
            <tr><td>Email:</td> <td><input type="text" value="" name="email"></td></tr>
            <tr><td>New Password:</td> <td><input type="password" value="" name="new_password"></td></tr>
            <tr><td>Confirm Password:</td> <td><input type="password" value="" name="confirm_password"></td></tr>
            <tr><td></td><td><input style="float: right;" type="submit" name="pwResetBtn" class="btn btn-danger" value="Reset"></td></tr>
        </table>
        </form>
        </div>
    </div>
</div>
<?php
    include_once 'includes/partials/footers.php';
?>