<?php
    //validation
    include_once 'includes/core/utilities.php';
    // db connection script
    include_once 'includes/classes/Database.php';
    // process the form
    if(isset($_POST['registerBtn'])) {
    // initialize an array to store any error message from the form
    $form_errors = array();

    // form validation
    $required_fields = array('first_name', 'last_name', 'username', 'email', 'password', 'confirm_password', 'gender', 'month', 'day', 'year');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('first_name' => 2, 'last_name' => 2, 'username' => 2, 'password' => 8, 'confirm_password' =>8);

    //Fields that requires checking for maximum length
    $fields_to_check_max_length = array('first_name' =>15 , 'last_name' =>15 , 'username' => 20, 'password' => 25, 'confirm_password' => 25);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //call the function to check maximum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_max_length($fields_to_check_max_length));
 
    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    //password validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_passwords());

    // collect form data and store in variables
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $birthday = "{$year}-{$month}-{$day}";

    if(checkDuplicates("users", "username", $username, $db)){
        $result = flashMessage("That username is already taken. Please try a different one");
    }

    else if(checkDuplicates("users", "email", $email, $db)){
        $result = flashMessage("Error, that email has already been registered. Use a different one");
    }

    //check if error array is empty, if yes process the form data and insert record
    else if(empty($form_errors)){

        
        // encrypt the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        try{
            // create SQL insert statement
            $sqlInsert = "INSERT INTO users (first_name, last_name, username, email, password, gender, birthday, join_date)
                      VALUES (:first_name, :last_name, :username, :email, :password, :gender, :birthday, now())";
   
            // use PDO prepared to sanitize data
            $statement = $db->prepare($sqlInsert);
   
            // add the data into the database
            $statement->execute(array(':first_name' => $first_name,':last_name' => $last_name,':username' => $username, ':email' => $email, ':password' => $hashed_password, ':gender' => $gender, ':birthday' => $birthday));
   
            //check if one new row was created
            if($statement->rowCount() == 1){

                // call sweet alert
                echo $result = "<script type=\"text/javascript\">
                swal({ title: \"Congratulations $username!\", 
                    text: \"Registration completed successfully.\", 
                    type: 'success',  
                    confirmButtonText: \"Thank You!\" }); 
                    
                    setTimeout(function(){
                        window.location.href = 'index.php';
                    }, 5000);
                    
                </script>";
            }

        }catch (PDOException $ex){
            $result = flashMessage("An error occurred: " .$ex->getMessage());
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = flashMessage("There was 1 error in the form<br>");
        }else{
            $result = flashMessage("There were " .count($form_errors). " errors in the form<br>");
        }
    }

}

?>