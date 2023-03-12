<?php include_once("includes/constants.php") ?>
<!DOCTYPE html> <html lang="en">
<head> <title> Sign In </title>
 <link rel= "stylesheet" href="stylesheets/homestyle.css">
 </head>
<body style="background-color: rgb(61,143,224);">
  
<div> <form action="accountsignin.php" target= "_top" autofocus="autofocus" method= "post">
  <small> Email </small>
  <input type= "email" name="email" style="width:100px;" placeholder= "your@email.com" />
  <small> Password </small>
  <input type= "password" name="password" style="width:90px;" >
  <input type= "text" name="br456_er34" value="<?php echo ACCESS_VAR_PUBLIC ?>" hidden= "hidden" />
  <input type= "submit" value= "Submit">
</form> </div>
</body>
</html>