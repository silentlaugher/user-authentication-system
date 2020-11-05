<?php 
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

            isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";

    
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
                   // get ip address
                   $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
                   $_SESSION['last_active'] = time();
                   $_SESSION['fingerprint'] = $fingerprint;

                   if($remember === "yes") {
                       rememberMe($id);
                   }
                   // call sweet alert
                   echo $welcome = "<script type=\"text/javascript\">
                    swal({ title: \"Welcome back $username!\", 
                        text: \"You have successfully logged in.\", 
                        type: 'success', 
                        timer: 6000, 
                        showConfirmButton: false });                   

                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 5000);
                    </script>";

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