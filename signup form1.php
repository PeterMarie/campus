<?php
  require("includes/campus_db.php");
  require_once("includes/functions.php");
  require_once("includes/form_functions.php");
  require_once("includes/session.php");
    
     
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="stylesheets/homestyle.css">
</head>
<body style= "background-color: rgb(140,200,255)">
  
<h3 class="steps"> Step One </h3>
<?php
  if(isset($_SESSION["errors"]) && !empty($_SESSION["errors"])){
    display_errors($_SESSION["errors"]);
  }
?>

<div class="formtable">
<form action= "accountsignup.php?id=1" autocomplete= "off" method= "post">
 <fieldset>
  <legend> <b> Personal Information </b> </legend>
  <table>
   <tr> <td> First Name </td> <td> <input type= "text" name= "firstname"
      <?php if(isset($_SESSION["firstname"]) && !empty($_SESSION["firstname"])) {
          echo "value= \"" . $_SESSION["firstname"] . "\" ";
      }
      ?>
      /> </td> </tr>
   <tr> <td> Last name </td> <td> <input type= "text" name = "lastname"
   <?php if(isset($_SESSION["lastname"]) && !empty($_SESSION["lastname"])) {
          echo "value= \"" . $_SESSION["lastname"] . "\" ";
      }
      ?>
   /> </td> </tr>
   <tr> <td> Middle name <small> (optional) </small> </td> <td> <input type= "text" name= "middlename"
   <?php if(isset($_SESSION["middlename"]) && !empty($_SESSION["middlename"])) {
          echo "value= \"" . $_SESSION["middlename"] . "\" ";
      }
      ?>
   /> </td> </tr>
   <tr> <td> Sex </td> <td> <input type= "radio" name = "sex" value= "M" 
   <?php if(isset($_SESSION["sex"]) && ($_SESSION["sex"] == "M")) {
          echo "checked= \"checked\" ";
      }
      ?>
   /> Male
          <input type="radio" name="sex" value="F"
          <?php if(isset($_SESSION["sex"]) && ($_SESSION["sex"] == "F")) {
          echo "checked= \"checked\" ";
      }
      ?>
      /> Female
           <input type="radio" name="sex" value="O"
           <?php if(isset($_SESSION["sex"]) && ($_SESSION["sex"] == "O")) {
           echo "checked= \"checked\" ";
      }
      ?>
           /> Other   </td> </tr>
   <tr> <td> Birthday </td> <td> 
        <!--<input type= "date>" name= "birthday"> -->
         <input type= "number" name = "day" placeholder= "dd" style= "width: 30px" min= "1" max= "31"
         <?php if(isset($_SESSION["day"]) && !empty($_SESSION["day"])) {
          echo "value= \"" . $_SESSION["day"] . "\" ";
      }
      ?>
         /> 
             <input type= "number" name = "month" placeholder= "mm" style= "width: 30px" min= "1" max= "12"
             <?php if(isset($_SESSION["month"]) && !empty($_SESSION["month"])) {
          echo "value= \"" . $_SESSION["month"] . "\" ";
      }
      ?>
             /> 
             <input type= "number" name = "year" placeholder= "yyyy" style= "width: 30px" min= "1900" max= "2004"
             <?php if(isset($_SESSION["year"]) && !empty($_SESSION["year"])) {
          echo "value= \"" . $_SESSION["year"] . "\" ";
      }
      ?>
             />
             </td> </tr>
  </table>
 </fieldset>
   <br>
  <fieldset>
   <legend> <b> Log In Information </b> </legend>
   <table>
   <tr> <td> Enter Email </td> <td> <input type = "email" name="email"
   <?php if(isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
          echo "value= \"" . $_SESSION["email"] . "\" ";
      }
      ?>
   /> </td> </tr>
   <tr> <td> Password </td> <td> <input type= "password" name="password"> </td> </tr>
   <tr> <td> Re-type Password </td> <td> <input type= "password" name = "Retype_Password"> </td> </tr>
   <tr colgroup="2"> <td> <input type ="submit" value= "Create Account"> </td> </tr>
  </table>
  </fieldset> </form>
  
  <br />
  <a href= "welcomepage.php" style= "float:right; " target = "_top"> Cancel </a>
</div>
</body>
</html>