<?php
    $page_title = "Edynak User Authentication System - Forgot Password Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/partials/nav.php';
    include_once 'includes/partials/parseForgotPw.php';
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
            <p><a href="index.php">Back</a> </p>
        </div>
    </div>
</div>
<?php
    include_once 'includes/partials/footers.php';
?>