<!DOCTYPE html> <html lang="en">
<head> 
 <title> Campus </title>
 <!-- [if IE]>
  <link rel= "stylesheet" type="text/css" href= "stylesheets/homestyle.css" />
 <![endif]--> 
 <link rel="stylesheet" type="text/css" href= "stylesheets/homestyle.css" />
 <link rel= "icon" href= "images/icon2.ico" type="image/x-icon" />
 <meta name= "description" content = "Campus administrative staff area." />
 <meta name= "keywords" content= "campus, private, restricted" />
 <meta name= "author" content= "Software Haven inc." />
 <meta property="og:site_name" content="Campus" />
 <meta charset= UTF-8 />
</head>

<body>

<span id="mainhead"> <h1><img id= "campustopicon" src= "images/topmast_new.jpg" alt = "campus icon" /> </h1> </span>
<h2> Welcome to the <b> <strong> CAMPUS </strong> Administative Area! </h2>
        Enter your username and unique password to log in!

<div> <form action="accountsignin.php" target= "_top" autofocus="autofocus" method= "post">
  <small> Username </small>
  <input type= "email" name="username" style="width:100px;" />
  <small> Password </small>
  <input type= "password" name="password" style="width:90px;" />
  <input type= "hidden" name="accessvar" value="staff" />
  <input type= "submit" value= "Submit">
</form> </div>
</body>
<?php
    include("includes/footer.php");
?>
