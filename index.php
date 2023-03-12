<!DOCTYPE html> <html lang="en">
<head> 
 <title> Campus </title>
 <!-- [if IE]>
  <link rel= "stylesheet" type="text/css" href= "stylesheets/homestyle.css" />
 <![endif]--> 
 <link rel="stylesheet" type="text/css" href= "stylesheets/homestyle.css" />
 <link rel= "icon" href= "images/icon2.ico" type="image/x-icon" />
 <meta name= "description" content = "Connect with academics from all over the world and share ideas, books and other material on various fields." />
 <meta name= "keywords" content= "campus, studies, academics, books, share, free" />
 <meta name= "author" content= "Software Haven inc." />
 <meta property="og:site_name" content="Campus" />
 <meta charset= UTF-8 />
</head>

<!--#9020ff light purple-->
<body>

	<?php
		if(!isset($_GET["id"])){
			$id= 0000;
		} else {
			$id = $_GET["id"];
		}
		
		$warning1= "!The email-password pair you entered doesn't match";
		$warning2= "!This email hasn't been signed up yet";
		$warning3= "!Sign in fields can't be left blank";
	?>
<span id="mainhead"> <h1><img id= "campustopicon" src= "images/topmast_new.jpg" alt = "campus icon" /> </h1> </span>

<div id="signsbuttons">
<a href= "campussignup.php"><button> <span class= buttons> Sign up </span> </button></a>
<button id="campussignin" onclick="signin()"> <span class= buttons> Sign in </span> </button>
<div style= "z-index: 7";>
<div class= "signin">
	
	<?php 
		//To notify the user in case of signin error
		switch ($id) {
			case 1:
				echo "<b> {$warning1} </b>";
				break;
			
			case 2:
				echo "<b> {$warning2} </b>";
				break;
				
			case 37707:
				echo "<b> {$warning3} </b>";
				break;	
				
			default:
				//Does nothing on default, like this php block doesnt exist.
				break;
		}
	?> </div>
<iframe id= "signinform" src="campussignin.php" height="0px" width="0px" style= "border:0;" > </iframe> </div>
</div>

<script>
function signin() {
	var x = document.getElementById("signinform");
	if (x.height=="0px"){
	 x.height = "46px";
 	 x.width = "400px";
	} else {
		x.height = "0px";
		x.width = "0px";
}}
</script>
<noscript> To sign in, please enable Javascript in your browser! </noscript>

<div id="block"> <div id="sidehead"><h2> Welcome to Campus! </h2>

<!--<h3> The global campus! </h3> --> </div>
<!-- Marketing/ Descriptive paragraph -->
<p id="p1" > 
	Connect with other academics from all around the globe!<br>
	Share ideas and discuss with others in your field, or any other.<br>
	Get information on available online courses!<br>
	Learn about other Colleges, Universities and Academic Institutions!<br>
	Share books and other academic materials!<br>
</p>

	<p style= "text-align: center; font-size: 120%">It's all <strong><em> free </em></strong>!
</p>
</div>

<div style= "direction: rtl;">
<img src= "images/world it.jpg" style= " width: 48%; height:70%; border:0;" alt = "World connected">
</div>

<?php 
	include("includes/footer.php");
?>