<?php
  require_once("includes/campus_db.php");
  require_once("includes/functions.php");
  require_once("includes/session.php");
  
  
  
  // confirm user log in status
  check_log_in();
  
  // confirm user identity
  // $user is a definitive array of all the user's details
  $user = get_values_by_id('temp_users', $_SESSION['user_id']);
   
   
  $names = $user["firstname"];
  if(isset($user["middlename"])) {
  $names .= " " . $user["middlename"] ;
  }
  $names .= " " . $user["lastname"] ; 
?>
<!DOCTYPE html>
<html lang= "en" charset= "utf-52">
<head>
  <title> Home </title>
  <link rel="stylesheet" href="stylesheets/homestyle.css">
  <link rel="icon" href="images/icon2.ico">
<meta name= "author" content= "Software Haven inc.">
<meta property= "og:site_name" content="Campus home">
<meta charset= "UTF-8">
</head>
<body>
<span class="mainhead"> <h1><img id= "campustopicon" src= "images/topmast_new.jpg" alt = "campus icon" usemap= "#home">
<map name= "home">
	<area shape="rectangle" coords="60, 6, 180, 110" href="homepage.php" alt="Home" title="Home" />
	<area shape="rectangle" coords="300, 33, 450, 60" alt="Home" href="homepage.php" title="Home" />
</map></h1> </span>
<form id="search" method="get">
<input type="text" name="search" value="" style="width: 150px;" />
<input type="submit" value="search" />
</form>
    
<img id="navigate" src= "images/navigate3.jpg" alt= "campus navigation map" usemap= "#campusmap"/>
<map name= "campusmap">
<area shape="circle" coords= "370, 80, 90" alt="Study Rooms" href="studyrooms.php" title="Study Rooms">
<area shape="circle" coords= "360, 240, 80" alt="Home" href="homepage.php" title="Home">
<area shape="circle" coords= "210, 362, 90" alt="Social" href="social.php" title="Social">
<area shape="circle" coords= "540, 350, 90" alt="Extracurriculars" href="extracurriculars.php" title="Extracurriculars">
</map>
 
<div id="welcome"><h3> Welcome <span> <?php echo $user['firstname']; ?>, </span> </h3>
<p style="font-size: 90%; text-align: center;" >  <i> Where would you like to go? </i> </p> </div>

<div id="lowpane"> <ul>
<li> <a href="messages.php" title="View Urgent Messages"> <div class= "lowpaneicons"> <img class="icons" src="images/message4.jpg" alt="urgent message"> </div> <p class="bottomleft"> Urgent Messages </p> <?php //echo $urgentno; ?> </a> </li>
<li> <a href="calendarpage.php" title= "Full Calendar"> <div class= "lowpaneicons"> <img class="icons" src="images/calendar2.png" alt="calendar"> </div> <p class="bottomleft"> Calendar/Events </p> </a> </li>
<li> <a href="profile_all.php" title= "View your Profiles"> <div class= "lowpaneicons"> <img class="icons" src="images/social.jpg" alt="profile picture"> </div> <p class="bottomleft"> 
<?php
  echo $names;
?> 
  </p> </a> </li> <br>
<li> <a href="goodbyepage.php" title="log out"> <p class="bottomleft"> Log out </p> </a> </li>
</ul> </div> 

<div>
<p id="shaven" style="top:155px; left:200px;"> &#169 <small>Created by </small><a href= "softwarehaven.html"  target= "_blank"> Software Haven inc. <img src= "images/software haven logo 1.jpg" class = "icons" id= "shlogo" alt= "Software Haven Inc. logo">
</a> </p> </div>
</body>
</html>
<?php
  mysqli_close($connection);
?>  