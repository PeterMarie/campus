<?php
    require_once("includes/campus_db.php");
    require_once("includes/session.php");
    require_once("includes/functions.php");
    require_once("includes/form_functions.php");
?>
<?php
    //Confirm login status
    if (!isset($_SESSION["user_login"]) || ($_SESSION["user_login"] != 1)) {
        header("location: index.php");
    }
?>
<?php
    $fields = all_prep($_POST);
    
    if (isset($fields["send"])) {
        //start form validation
        $required = array();
        $errors = array();
        $required[] = "name";
        $errors = check_required($required);
        $errors = array_merge($errors, check_words($fields));
    if (!empty($errors)){
        $message = "There was an error with your request <br />
                        Please check the interest field and try again";
    } else { //Everything all right, perform query
        $user = $_SESSION["user_id"];
        $name = trim($fields["name"]);
        //Check if user interest directory already exists
        $directory = "user" . $user . "_interests";
        $query = "select 1 from `{$directory}` LIMIT 1";
        $val = mysqli_query($connection, $query);
            if($val !== FALSE) {
                //User has an interest directory, perform INSERT query
                $query = "INSERT into ";
                $query .= " `{$directory}` ";
                $query .= " (name) ";
                $query .= " VALUE (\"{$name}\")";
                $add = mysqli_query($connection, $query);
                echo mysqli_error($connection);
               // check_connect($add, "142");
                if ($add) { $message = "Interest successfully added!"; 
                    } else {
                        $message = "It seems there was an error, please try again";
                    }
            } else {
                //User doesn't have an interest directory, perform CREATE
                $query = "CREATE TABLE ";
                $query .= " `{$directory}`(";
                $query .= " id INT (11) NOT NULL AUTO_INCREMENT , ";
                $query .= " name VARCHAR (40) NOT NULL, ";
                $query .= " PRIMARY KEY (id) )";
                $create = mysqli_query($connection, $query);
                echo mysqli_error($connection);
               // check_connect($create, "142");
                if ($create){
                    //User's interest directory successfully created, perform INSERT
                    $query = "INSERT into ";
                    $query .= " `{$directory}` ";
                    $query .= " (name) ";
                    $query .= " VALUE (`{$name}`)";
                    $add = mysqli_query($connection, $query);
                echo mysqli_error($connection);
                 //   check_connect($add, "142");
                    if ($add) { $message = "Interest successfully added!"; 
                        } else {
                        $message = "It seems there was an error, please try again";
                    }
                }
            }
        }
    }
?>
<html>
    <head>
        <title> </title>
     </head>
     <body>
         <p id="message"> <?php if(isset($message)) {echo $message;} ?> </p>
         <h4>  What are your Interests? </h4>
         <form action= "addinterest.php" method= "post" autocomplete= "off">
             Enter Interest here <br />
             <input type= "text" name= "name" value="" placeholder= ""/> &nbsp; &nbsp;
             <input type = "submit" name= "send" value= "Add Interest" />
         </form>
         <a href= "" onclick= "window.close()"> Done </a>
     </body>
</html>
<?php  if (isset($connection)) {
        mysqli_close($connection);    
    }
?>
