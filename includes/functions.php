<?php
    
    // All functions for the campus website
    
    function check_connect($query, $error) {
        global $connection;
        if(!$query){
           header ("location: error.php?id={$error}");
           exit;
        }
   } 
    
      // Using the user's email to retrieve all other details from the db 
     function get_user_by_email($email){
         global $connection;
         $query = "SELECT * ";
         $query .= " FROM users ";
        // $query .= " WHERE email=" ;
         //$query .= '{$email}' ;
        // $query .= "  LIMIT 1";
         $set_user = mysqli_query($connection, $query);
         
         check_connect($set_user, "142");
         while ($user = mysqli_fetch_array($set_user)) {
             if ($user["email"] == $email) {
                 return $user;
         } else {
           header ("location: error.php?id=143");
           //echo "error";
          exit;
         }
     }
     }

     function get_tables($table){ //returns my_sqli result
         global $connection;
         $query = "SELECT * FROM ";
         $query .= $table;
         $get_tables = mysqli_query($connection, $query);
         check_connect($get_tables, "142");
      // $tables = mysqli_fetch_array($get_tables);
         return $get_tables;
     }
     
     function get_values_by_id($table, $id){ //returns array of attributes
         global $connection;
         $query = "SELECT * FROM ";
         $query .= $table;
         $query .= " WHERE id= " . $id;
         $get_values = mysqli_query($connection, $query);
         check_connect($get_values, "142");
         $value = mysqli_fetch_array($get_values);
         return $value;
     }
     
     function add_location($name, $type="countries", $other_id, $user_email){
         global $connection;
            $find_location = 0;
            $location = ucwords(trim($name));
                $get_locations = get_tables($type);
                $location_count = mysqli_num_rows($get_locations);
                //But first of all, check if the Country already exists in database
                while ($locations = mysqli_fetch_array($get_locations)) {
                for ($location_id = 1; $location_id <= $location_count; $location_id++){
                $locationfind = get_values_by_id($type, $location_id);
                if ($type == "states"){
                        $types = "country";
                        if (($locationfind["country_id"] == $other_id)) {
                            //Will only run for selected country
                            if ($locationfind["name"] == $location) {
                            $id = $location_id;
                            $find_location = 1;
                        }
                        } 
                }
                if ($type == "countries"){
                        $types = "continent";
                            if ($locationfind["name"] == $location) {
                            $id = $location_id;
                            $find_location = 1;
                  } 
                }
                        break; 
               }
                    break;
                    }
            if ($find_location != 1) {
                $query = "INSERT into ";
                $query .= " {$type} ";
                $query .= " (name, {$types}_id, added_by ) ";
                $query .= " VALUES ";
                $query .= " (\"{$location}\", {$other_id}, \"{$user_email}\") ";
                $add = mysqli_query($connection, $query);
                //check_connect($add, "142");
                //new country added successfully!
                //Set country id to be given to university as that just inserted
                $id = mysqli_insert_id($connection);
                return $id;
                } 
                else { return $id;}
     }
    ?>