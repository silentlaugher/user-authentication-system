<?php
/**
 * @param $required_fields_array, n array containing the list of all required fields
 * @return array, containing all errors
 */
function check_empty_fields($required_fields_array){
    //initialize an array to store error messages
    $form_errors = array();

    //loop through the required fields array snd popular the form error array
    foreach($required_fields_array as $name_of_field){
        if(!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL){
            $form_errors[] = $name_of_field . " is a required field";
        }
    }

    return $form_errors;
}

/**
 * @param $fields_to_check_length, an array containing the name of fields
 * for which we want to check min required length e.g array('username' => 4, 'email' => 12)
 * @return array, containing all errors
 */
function check_min_length($fields_to_check_length){
    //initialize an array to store error messages
    $form_errors = array();

    foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
        if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required){
            $form_errors[] = $name_of_field . " is too short, it must be no shorter than {$minimum_length_required} characters long";
        }
    }
    return $form_errors;
}

/**
 * @param $fields_to_check_max_length, an array containing the name of fields
 * for which we want to check min required length e.g array('first_name' => 15, 'last_name' => 15, 'username' => 30, 'password' => 30)
 * @return array, containing all errors
 */
function check_max_length($fields_to_check_max_length){
    //initialize an array to store error messages
    $form_errors = array();

    foreach($fields_to_check_max_length as $name_of_field => $maximum_length_required){
        if(strlen(trim($_POST[$name_of_field])) > $maximum_length_required){
            $form_errors[] = $name_of_field . " is too long, it must be no longer than {$maximum_length_required} characters long";
        }
    }
    return $form_errors;
}

/**
 * @param $data, store a key/value pair array where key is the name of the form control
 * in this case 'email' and value is the input entered by the user
 * @return array, containing email error
 */
function check_email($data){
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'email';
    //check if the key email exist in data array
    if(array_key_exists($key, $data)){

        //check if the email field has a value
        if($_POST[$key] != null){

            // Remove all illegal characters from email
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);

            //check if input is a valid email address
            if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false){
                $form_errors[] = $key . " is not a valid email address";
            }
        }
    }
    return $form_errors;
}
/**
 * password validation, check that password fields match
 */
function check_passwords(){
    //initialize an array to store error messages
    $form_errors = array();
    $key = 'password';
    $key2 = 'confirm_password';

    //check if the password fields match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $form_errors[] = " Your password fields do not match";
    }
    return $form_errors;

}

/**
 * check for duplicate email and usernames
 */
function checkDuplicates($table, $column_name, $value, $db) {
    try{
        $sqlQuery = "SELECT * FROM " .$table. " WHERE " .$column_name."=:$column_name";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(":$column_name" => $value));

        if($row = $statement->fetch()){
            return true;
        }
        return false;

    }catch (PDOException $ex){
        //handle exception
    }
}

/**
 * @param $form_errors_array, the array holding all
 * errors which we want to loop through
 * @return string, list containing all error messages
 */
function show_errors($form_errors_array){
    $errors = "<p><ul style='color: red;'>";

    //loop through error array and display all items in a list
    foreach($form_errors_array as $the_error){
        $errors .= "<li> {$the_error} </li>";
    }
    $errors .= "</ul></p>";
    return $errors;
}

/**
 * flashMessage function
 */
function flashMessage($message, $passOrFail = "Fail"){
    if($passOrFail === "Pass"){
        $data = "<div class='alert alert-success'>{$message}</p>";
    }else{
        $data = "<div class='alert alert-danger'>{$message}</p>";
    }
    return $data;
}
/**
 * redirect function
 **/ 
function redirectTo($page){
    header("Location: {$page}.php");
}
