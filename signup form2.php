<?php
  require_once("includes/campus_db.php");
  require_once("includes/functions.php");
  
  $id = $_GET["id"];
  if (isset($_POST["status"])) { $status = $_POST["status"]; }
?>
  
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="stylesheets/homestyle.css">
  
</head>
<body style= "background-color: rgb(140,200,255)">
<h3 class="steps"> Step Two </h3>
<div class="formtable">
  <?php 
    switch ($id) {
      case 1:
        $form = " <form action= \"signup form2.php?id=2\" target= \"_self\" autocomplete= \"off\" method= \"post\">
 <fieldset style= \"text-align: left;\">
  <legend> <b> Academic Information </b> </legend>
    Select your Current Academic Status <br /> 
   <input type= \"radio\" name= \"status\" value=\"1\"> Undergraduate <br>
   <input type= \"radio\" name= \"status\" value=\"2\"> Academic Staff <br>
   <input type= \"radio\" name= \"status\" value=\"3\">  Graduate in Non-Academia <br>
   <input type= \"radio\" name= \"status\" value=\"4\"> Postgraduate <br>
   <input type= \"radio\" name= \"status\" value=\"5\">  Aspiring Student <br>
 </fieldset>
   <input type= \"submit\" value=\"Next\">
  </form>";
        echo $form;
        break;
      
      case 2:
        global $status;
        $get_universities = get_tables("universities");
        $uni_count = mysqli_num_rows($get_universities);
        // $universities is an array of the details of every university currently on Campus
         $get_fields = get_tables("fields");
         $fields_count = mysqli_num_rows($get_fields);
        // $fields is an array of every field in the Campus db 
        switch ($status) {
          case 1:
            $form = " <form action= \"accountsignup.php?id=2\" target= \"_top\" autocomplete= \"off\" method= \"post\">
                      <fieldset style= \"text-align: left;\"> ";
            $form .= "<select name= \"university\" placeholder= \"Choose your Institution\" > ";
                     while ($universities = mysqli_fetch_array($get_universities)) {
                       $uni_id = $universities["id"];
                       for ($uni_id = 1; $uni_id <= $uni_count; $uni_id++){
                       $university = get_values_by_id("universities", $uni_id);
                       $form .= "<option value= \"" . $university["id"] ;
                       $form .= "\" >" . $university["name"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " Can't find your institution? Add it
                <a href= \"adduniversity.php\" target = \"insert\"> here </a> <br /> <br />"; 
            $form .= " <select name= \"field\" value= \"Choose your Major\" > ";
                     while ($fields = mysqli_fetch_array($get_fields)) {
                       $field_id = $fields["id"];
                       for ($field_id = 1; $field_id <= $fields_count; $field_id++){
                       $field = get_values_by_id("fields", $field_id);
                       $form .= "<option value= \"" . $field["id"] ;
                       $form .= "\" >" . $field["content"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " <input type= \"text\" name= \" status\" value= \"" .$status . "\" hidden= \"hidden\" />
                Can't find your Major? Add it 
                <input type= \"hidden\" name= \" addfield\" />
                <a href= \"addfield.php\" target = \"insert\"> here </a> <br /><br />";
            $form .= " <select name= \"field\" value= \"Choose your Minor\" disabled = \"disabled\" > ";
                     while ($fields = mysqli_fetch_array($get_fields)) {
                       $field_id = $fields["id"];
                       for ($field_id = 1; $field_id <= $fields_count; $field_id++){
                       $field = get_values_by_id("fields", $field_id);
                       $form .= "<option value= \"" . $field["id"] ;
                       $form .= "\" >" . $field["content"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " Can't find your Minor? Add it 
                <input type= \"hidden\" name= \" addfield\" />
                <a href= \"addfield.php\" target = \"insert\"> here </a> <br /> <br />";
            $form .= " Level <select name= \"level\" >";
                for ($level = 1; $level <= 6; $level++) {
                $form .= " <option value=\"" . $level*100;
                $form .= "\" >" . $level*100 . " </option> ";        
                } 
            $form .=  " </select> <br /> <br /> ";
            $form .= " Add your Interests <br /> ";
            $form .= " <a href=\"addinterest.php\" target=\"insert\"> Add another Interest </a> <br />";
            $form .= "<input type=\"submit\" value=\"Create Account\" /> ";
            $form .= "</form>";
                
            echo $form; 
            break;
          
          case 2:
            $form = " <form action= \"accountsignup.php?id=2\" target= \"_top\" autocomplete= \"off\" method= \"post\">
                      <fieldset style= \"text-align: left;\"> ";
            $form .= "<select name= \"university\" placeholder= \"Choose your Institution\" > ";
                     while ($universities = mysqli_fetch_array($get_universities)) {
                       $uni_id = $universities["id"];
                       for ($uni_id = 1; $uni_id <= $uni_count; $uni_id++){
                       $university = get_values_by_id("universities", $uni_id);
                       $form .= "<option value= \"" . $university["id"] ;
                       $form .= "\" >" . $university["name"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " Can't find your institution? Add it 
                <input type= \"hidden\" name= \" adduni\" />
                <a href= \"adduniversity.php\" target = \"insert\"> here </a> <br /> <br />"; 
            $form .= " <select name= \"field\" placeholder= \"Choose your Primary Field\" > ";
                     while ($fields = mysqli_fetch_array($get_fields)) {
                       $field_id = $fields["id"];
                       for ($field_id = 1; $field_id <= $fields_count; $field_id++){
                       $field = get_values_by_id("fields", $field_id);
                       $form .= "<option value= \"" . $field["id"] ;
                       $form .= "\" >" . $field["content"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " <input type= \"text\" name= \" status\" value= \"" .$status . "\" hidden= \"hidden\" />
                Can't find your Major? Add it 
                <a href= \"addfield.php\" target = \"insert\"> here </a> <br /><br />";
            $form .= "  ";
            $form .= "</form>";            
                
            echo $form;    
            break;
        
        case 3:
            $form = " <form action= \"accountsignup.php?id=2\" target= \"_top\" autocomplete= \"off\" method= \"post\">
                      <fieldset style= \"text-align: left;\"> ";
            $form .= " <select name= \"field\" value= \"CWhat was your Field of Study?\" > ";
                     while ($fields = mysqli_fetch_array($get_fields)) {
                       $field_id = $fields["id"];
                       for ($field_id = 1; $field_id <= $fields_count; $field_id++){
                       $field = get_values_by_id("fields", $field_id);
                       $form .= "<option value= \"" . $field["id"] ;
                       $form .= "\" >" . $field["content"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " <input type= \"text\" name= \" status\" value= \"" .$status . "\" hidden= \"hidden\" />
                Can't find your field? Add it 
                <input type= \"hidden\" name= \" addfield\" />
                <a href= \"addfield.php\" target = \"insert\"> here </a> <br /><br />";
            $form .= "</form>";
          
          echo $form;
          break;
          
        case 4:
            $form = " <form action= \"accountsignup.php?id=2\" target= \"_top\" autocomplete= \"off\" method= \"post\">
                      <fieldset style= \"text-align: left;\"> ";
            $form .= "<select name= \"university\" value= \"Choose your Institution\" > ";
                     while ($universities = mysqli_fetch_array($get_universities)) {
                       $uni_id = $universities["id"];
                       for ($uni_id = 1; $uni_id <= $uni_count; $uni_id++){
                       $university = get_values_by_id("universities", $uni_id);
                       $form .= "<option value= \"" . $university["id"] ;
                       $form .= "\" >" . $university["name"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " Can't find your institution? Add it 
                <input type= \"hidden\" name= \" adduni\" />
                <a href= \"adduniversity.php\" target = \"insert\"> here </a> <br /> <br />"; 
            $form .= " <select name= \"field\" value= \"Choose your Field of Study\" > ";
                     while ($fields = mysqli_fetch_array($get_fields)) {
                       $field_id = $fields["id"];
                       for ($field_id = 1; $field_id <= $fields_count; $field_id++){
                       $field = get_values_by_id("fields", $field_id);
                       $form .= "<option value= \"" . $field["id"] ;
                       $form .= "\" >" . $field["content"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " <input type= \"text\" name= \" status\" value= \"" .$status . "\" hidden= \"hidden\" />
                Can't find your field? Add it 
                <input type= \"hidden\" name= \" addfield\" />
                <a href= \"addfield.php\" target = \"insert\"> here </a> <br /><br />";
            $form .= "</form>";          
          
          echo $form;
          break;  
        
        case 5:
            $form = " <form action= \"accountsignup.php?id=2\" target= \"_top\" autocomplete= \"off\" method= \"post\">
                      <fieldset style= \"text-align: left;\"> ";
            $form .= "<select name= \"university\" value= \"Choose your Preferred Institution\" > ";
                     while ($universities = mysqli_fetch_array($get_universities)) {
                       $uni_id = $universities["id"];
                       for ($uni_id = 1; $uni_id <= $uni_count; $uni_id++){
                       $university = get_values_by_id("universities", $uni_id);
                       $form .= "<option value= \"" . $university["id"] ;
                       $form .= "\" >" . $university["name"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " Can't find your institution? Add it 
                <input type= \"hidden\" name= \" adduni\" />
                <a href= \"adduniversity.php\" target = \"insert\"> here </a> <br /> <br />"; 
            $form .= " <select name= \"field\" value= \"Choose your Preffered Major, or Field of Study\" > ";
                     while ($fields = mysqli_fetch_array($get_fields)) {
                       $field_id = $fields["id"];
                       for ($field_id = 1; $field_id <= $fields_count; $field_id++){
                       $field = get_values_by_id("fields", $field_id);
                       $form .= "<option value= \"" . $field["id"] ;
                       $form .= "\" >" . $field["content"] ;
                       $form .= " </option> ";                         
                       }
                       break;
                     } 
            $form .= " </select> <br /> ";
            $form .= " <input type= \"text\" name= \" status\" value= \"" .$status . "\" hidden= \"hidden\" />
                Can't find your Major? Add it 
                <input type= \"hidden\" name= \" addfield\" />
                <a href= \"addfield.php\" target = \"insert\"> here </a> <br /><br />";
            $form .= "</form>";    
                
          echo $form;      
          break;
              
          default:
           # code...
            break;
        }
            $frame = "<iframe id=\"insert_frame\" name=\"insert\"> </iframe>";
            echo $frame;
        
        break;
        
      default:
        //header("signup form2.php?id=2");
        break;
    }
  ?>

  <br />
  <a href= "signup form1.php" style= "float:left; " > Back </a>
  <a href= "welcomepage.php" style= "float:right; " target= "_top"> Cancel </a>
</div>
</body>
</html>