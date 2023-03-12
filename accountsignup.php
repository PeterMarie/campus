<?php
  require("includes/campus_db.php");
  require_once("includes/session.php");
  require_once("includes/functions.php");
  require_once("includes/form_functions.php");
  
  $id = $_GET["id"];
  
  switch ($id) {   
    case 1: 
   $fields = all_prep($_POST);
   $_SESSION = $fields;
   
   //Start form validation
        $required = array();
        $errors = array();
        $max_length_fields = array();
        $min_length_fields = array();
        $max_value_fields = array();
        $min_value_fields = array();
        
        $required[] = "firstname";
        $required[] = "lastname";
        $required[] = "sex";
        $required[] = "year";
        $required[] = "month";
        $required[] = "day";
        $required[] = "email"; 
        $required[] = "password";
        $required[] = "Retype_Password";
        $errors = check_required($required);
        check_words($fields);
        confirm_password($fields["password"], $fields["Retype_Password"]);
       // $errors = array_merge($errors, check_words($fields));
       // $errors = array_merge($errors, confirm_password($fields["password"], $fields["Retype_Password"]));
        $max_length_fields["firstname"] = (20);
        $max_length_fields["lastname"] = (20);
   if (isset($fields['middlename'])) {$max_length_fields["middlename"] = (20); }
        $max_length_fields["sex"] = (1);
        $max_length_fields["email"] = (40);
        $errors = array_merge($errors, check_max_length_fields($max_length_fields));
        $min_length_fields["password"] = (8);
        $errors = array_merge($errors, check_min_length_fields($min_length_fields));
        $max_value_fields["year"] = (2004);
        $max_value_fields["month"] = (12);
        if($fields['year'] == 4 || $fields['year'] == 6 || $fields['year'] == 9 || $fields['year'] == 11) {
            //30-day months entered
            $max_value_fields["day"] = (30); 
            } elseif ($fields['year'] == 1 || $fields['year'] == 3 || $fields['year'] == 5 || $fields['year'] == 7
                    || $fields['year'] == 8 || $fields['year'] == 10 || $fields['year'] == 12) {
            //31-day months entered
            $max_value_fields["day"] = (31);
            } elseif ($fields['year'] == 2){
                //February entered
                $max_value_fields["day" ] = (29);
            } else {
                //invalid month entered, will return error anyway
                $max_value_fields["day"] = (31);
            }
            $errors = array_merge($errors, check_max_value_fields($max_value_fields));
        
    if (!empty($errors)){ //Check if errors were found
        $_SESSION["errors"] = $errors;
        header("location: signup form1.php");
        exit;
    } else {
   $birthday = $fields['year']. "-" .$fields['month']. "-" .$fields['day'];
   $password = sha1($fields['password']);
   //Store values in temporary array
   $_SESSION['password'] = $password;
   $_SESSION['signup'] = 1; //To use in determining if a user has begun this process
   //Redirect to 2nd form page
   header ("location: signup form2.php?id=1");
   exit; }
   
     break;
     
     case 2:
         $fields = all_prep($_POST);
         if (isset($fields["status"])) { $status = $fields["status"];
         // To enable calling of different INSERT statements for different statuses    
         }
         
         header ("location: homepage.php");
         break;
         
     default:
        header ("location: error.php?id=144");
        exit;
     break;
  }
               
  mysqli_close($connection);
?>