<?php 
  require_once("includes/campus_db.php");
  require_once("includes/session.php");
  require_once("includes/functions.php");
  require_once("includes/form_functions.php"); 
?>
<?php
    //Restrict access to users in the process of signing up
    if (empty($_SESSION["signup"])) {
        header("campussignup.php");
        exit;
    }
?>
<?php
    $fields = all_prep($_POST);
    
    if (isset($fields["country"]) && !isset($fields["send"])){
        $sel_country = $fields["country"];
        //break;
    } 
    elseif (isset($_POST["send"])) {
        //start formvalidation
        $required = array();
        $errors = array();
        $required[] = "name";
        $errors = check_required($required);
        $add_country = 0;
        $add_state = 0;
        $name = ucwords(trim($fields["name"]));
        
        //check for country or countryadd, and then state or stateadd
        if ((!isset($fields["country"])) && (empty($fields["countryadd"]))) {
            //Neither Country nor add country fields are set
          $errors[] =  "The Country where the Institution is 
                            Located must be entered";
        }
        elseif (isset($fields["country"]) && empty($fields["countryadd"])) {
            //Country is set but add country is not
            if (!empty($fields["stateadd"])) {
                //User intends to add a new State to an existing country
                $add_state = 1;
            } else { //If not, he MUST have chosen an existing State
            $required[] = "state";
            $errors = array_merge($errors, check_required($required));
            $country = ucwords(trim($fields["country"]));
            }
        }
        elseif (isset($fields["country"]) && !empty($fields["countryadd"])) {
            //Both Country and Add Country are set... We check if continent is also set and use it to assume user's intent
            if (!empty($fields["continent"])) {
            $required[] = "stateadd";
            $required[] = "continent";
            $errors = array_merge($errors, check_required($required));
            $country = ucwords(trim($fields["countryadd"]));
            $add_country = 1; 
            $add_state = 1; //if the user is adding a Country, he must add a State as well
            } else {
            if (!empty($fields["stateadd"])) {
                //User intends to add a new State to an existing country
                $add_state = 1;
            } else { //If not, he MUST have chosen an existing State
            $required[] = "state";
            $errors = array_merge($errors, check_required($required));
            $country = $fields["country"];
               }
            }
         }
        else { // Last possible scenario: Add Country field is set, and Country is not
            $required[] = "stateadd";
            $required[] = "continent";
            $errors = array_merge($errors, check_required($required));
            $country = ucwords(trim($fields["countryadd"]));
            $add_country = 1;
            $add_state= 1;
        }
    //add institute and reload signup form2 if there are no errors
    
    if(!empty($errors)){ //check for errors
        //    print_r($errors);
    } else { //perform INSERT query
        if($add_country == 1){ //Check if user intends to add a Country and perform that query
            $fields["country"] = add_location($country, "countries", $fields["continent"], $_SESSION['email']);
          //  echo "country id: " . $returned_id;
        }
        if ($add_state == 1) { //determine if the user intends to add a state
            $fields["state"] = add_location($fields["stateadd"], "states", $fields["country"], $_SESSION['email']);
         //  echo $returned_id_state;
        }
        //INSERT complete Institution details
        $query = "INSERT into ";
        $query .= "universities ";
        $query .= " (name, country_id, state_id, ";
        if (isset($fields['motto'])) {
            $query .= " motto, ";
        }
        $query .= " added_by ";
        $query .= ") VALUES ( \"{$name}\", ";
        $query .= " {$fields['country']}, ";
        $query .= " {$fields['state']}, ";
        if (isset($fields['motto'])) {
        $query .= " \"{$fields['motto']}\", ";
        }
        $query .= " \"{$_SESSION['email']}\" ";
        $query .= ") ";
        $add_uni = mysqli_query($connection, $query);
        check_connect($add_uni, "142");
        $university_id = mysqli_insert_id($connection);
                if(isset($add_uni)){     
                if($add_uni){
                    $_SESSION["university"] = $university_id;
                }}
    }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>  </title>
        <script> 
            function reload(){
                var x= document.getElementById("uni_form");
                x.submit();
            }
            <?php
                if(isset($add_uni)){     
                if($add_uni){
                    $script = "function complete(){
                        window.document = \" signup form2.php\";
                    }";
                    echo $script;
                }}
            ?>
        </script>
        <noscript> Enable javascript in your browser to add Institutions to this site! </noscript>
     </head>
     
     <body 
      <?php  
            if(isset($add_uni)){
                if($add_uni){ 
                $script2 = "onload=\"complete()\" ";
                echo $script2;
             } }
      ?> />
         <h4> Add INSTITUTIONS to Campus </h4>
    <form action= "adduniversity.php" id= "uni_form" method= "post" autocomplete = "on">
         Institution Name (In full) <br />
    <input type= "text" name= "name" required= "required" 
        <?php if(isset($fields["name"])) {echo "value= \"" . $fields["name"] . "\" "; } ?>/> <br />
    <br />
    Select Country located <br />
    <?php 
        $form = "<select name= \"country\" placeholder= \"Select Country\" onchange= \"reload()\" />";
        $form .= "<option value= \"0\" ";
        if(!isset($sel_country)) {
               $form .= "selected = \"selected\" ";
           }
        $form .= "> Select Country </option>";
        $get_countries = get_tables("countries");
        $country_count = mysqli_num_rows($get_countries);
        while ($countries = mysqli_fetch_array($get_countries)) {
             //  $country_id = $countries["id"];
               for ($country_id = 1; $country_id <= $country_count; $country_id++){
               $country = get_values_by_id("countries", $country_id);
               $form .= "<option value= \"" . $country["id"] ;
               $form .= "\" ";
               if(isset($sel_country)){
                   if ($sel_country == $country["id"]) {
                    $form .= "selected = \"selected\" ";
               }
               }
               
               $form .= ">" . $country["name"] ;
               $form .= " </option> ";       
               }
               break;
         }
         echo $form;
     ?>
     </select> <br />
     If you can't find your Country above, enter it here: <br />
    <input type= "text" name= "countryadd" /> <br />
    And select the Continent on which it is located <br />
    <?php
        $form = "<select name= \"continent\" placeholder= \"Select Continent\" />";
        $form .= "<option value= \"0\" ";
        if(!isset($sel_country)) {
               $form .= "selected = \"selected\" ";
           }
        $form .= "> Select Continent </option>";
        $get_continents = get_tables("continents");
        $continent_count = mysqli_num_rows($get_continents);
        while ($continents = mysqli_fetch_array($get_continents)) {
               for ($continent_id = 1; $continent_id <= $continent_count; $continent_id++){
               $continent = get_values_by_id("continents", $continent_id);
               $form .= "<option value= \"" . $continent["id"] ;
               $form .= "\" ";
               if(isset($fields["continent"])){
                   if ($fields["continent"] == $continent["id"]) {
                    $form .= "selected = \"selected\" ";
               }
               }
               
               $form .= ">" . $continent["name"] ;
               $form .= " </option> ";       
               }
               break;
         }
         $form .= "</select> <br />";
         echo $form;
         
    ?>
    <br />
    Select State Located <br />
    <?php
        $form = "<select name= \"state\" placeholder= \"Select state\" ";
        if (!empty($sel_country)){
            $form .= "> ";
        $form .= "<option value= \"0\" ";
        $form .= "selected = \"selected\" ";
        $form .= "> Select State </option>";
        $get_states = get_tables("states");
        $state_count = mysqli_num_rows($get_states);
        while ($states = mysqli_fetch_array($get_states)) {
               for ($state_id = 0; $state_id <= $state_count; $state_id++){
               $state = get_values_by_id("states", $state_id);
               if ($state["country_id"] == $sel_country) {
               $form .= "<option value= \"" . $state["id"] ;
               $form .= "\" ";
               $form .= ">" . $state["name"] ;
               $form .= " </option> "; 
               }      
               }
               break;
         }
        
           $form .= "</select> <br />";
           $form .= "If you can't find your State, add it here: <br/>";
           $form .= " <small>Note that if your Country wasn't listed above none of her states will be listed either</small> <br/>";
           $form .= "<input type= \"text\" name= \"stateadd\" ";
           if(isset($fields["stateadd"])) {$form .=  "value= \"" . $fields["stateadd"] . "\" "; }
           $form .= "/> <br />";
       } else {
           $form .= "disabled = \"disabled\" >";
           $form .= "<option value= \"0\" ";
               $form .= "selected = \"selected\" ";
        $form .= "> Select Country </option>  </select>";
           $form .= "Enter a country above <br />";
           $form .= "Or type your state below if your country was not listed <br />";
           $form .= "<input type= \"text\" name= \"stateadd\" /> <br />";
       }
         echo $form;
     ?>
    <br />
   <!-- Upload Institution emblem HERE <br /> -->
    <br />
    Institution motto <br />
    <input type= "text" name="motto"
        <?php if(isset($fields["motto"])) {echo "value= \"" . $fields["motto"] . "\" " ;} ?> > <br />
    <br />
   Ensure the above are FILLED carefully AND accurately. <br />
   <b> Any User found to have Fabricated Information will be removed from Campus! </b> <br />
   <br />
    <input type= "submit"  name= "send" value= "Add Institution">
 </form>
     </body>
</html>
<?php  if (isset($connection)) {
        mysqli_close($connection);    
    }
?>