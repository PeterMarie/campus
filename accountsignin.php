<?php
    include("includes/campus_db.php");
    require_once("includes/functions.php");
    require_once("includes/form_functions.php");
    require_once("includes/session.php");
        
        $errors = array();
        $fields = all_prep($_POST); 
   /*         $email= mysql_prep($_POST['email']) ;
            $password= mysql_prep($_POST['password']) ; */
            
    if($fields['br456_er34'] == ACCESS_VAR_PUBLIC){
         $query = "SELECT * ";
         $query .= " FROM users ";
         $query .= " WHERE email= \"{$fields['email']}\" ";
         $query .= " LIMIT 1";
         $get_user = mysqli_query($connection, $query);
         check_connect($get_user, "142");
         while ($user = mysqli_fetch_array($get_user)) {
             
         if (mysqli_num_rows($get_user) != 0) {
            //Case 0: email entered exists in database   
            // Comparing submitted password to password in database
            
             if($user["hashed_password"] == sha1($fields['password'])) {
            // Case 1: password matches, allow log in
            
                 $query = "INSERT INTO ";
                 $query .= " logged_in_users (email, user_id) ";
                 $query .= " VALUES (\"{$fields['email']}\", {$user['id']} )" ;
                 
            if (mysqli_query($connection, $query)) {
                //log in successfully recorded, create login session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_login'] = 1;
                //send to campus homepage
                header ("location: homepage.php");
                exit;
            } else {
                //log in recording failed, sql error: send to error page
                header ("location: error.php?id=141");
                exit;
            }
            
             } else {
            // Case 2: password doesnt match, return back to signin page 
                $id = 1;
                header ("location: index.php?id=". urlencode($id));
                exit;
             }
             
         } else {
            // Case 3: Email entered doesn't exist in database
            $id = 2;
            header ("location: index.php?id=". urlencode($id));
            exit;
         }
         }
    } elseif($fields['br456_er34'] == ACCESS_VAR_STAFF){
        //login to the administrative area
        
    } else {
        //someone is probably trying to hack Campus servers, take precautionary actions
    }
         
?>               