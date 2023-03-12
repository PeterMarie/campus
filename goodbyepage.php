<!DOCTYPE html> <html lang="en">
<head> 
 <title> Campus </title>
 <link rel= "stylesheet" href="stylesheets/homestyle.css">
 <link rel= "icon" href= "images/icon2.ico" type="image/x-icon">
 <meta name= "description" content = "Connect with academics from all over the world and share ideas, books and other      material on various fields.">
 <meta name= "keywords" content= "campus, studies, academics, books, share, free">
 <meta name= "author" content= "Software Haven inc.">
 <meta property="og:site_name" content="Campus">
 <meta charset= UTF-8>
</head>

<!--#9020ff light purple-->
<body>

<span id="mainhead"> <h1><img id= "campustopicon" src= "images/topmast_new.jpg" alt = "campus icon" /> </h1> </span>

<div id="signsbuttons">
<a href= "campussignup.php"><button> <span class= buttons> Sign up </span> </button></a>
<button id="campussignin" onclick="signin()"> <span class= buttons> Sign in </span> </button>
<div> <iframe id= "signinform" src="campussignin.php" height="0px" width="0px" style= "border:0;" > </iframe> </div>
</div>

<script>
function signin() {
	var x = document.getElementById("signinform");
	x.height = "46px";
	x.width = "400px";
}
</script>
<noscript> To sign in, please enable Javascript in your browser! </noscript>


<div id="block"> <div id="sidehead"><h2> Goodbye! </h2> </div>

<!-- Marketing/ Descriptive paragraph -->
<p id="p1" > 
	Come back again, and soon!<br>
</p>
	<p style= "text-align: center; font-size: 120%"> We'll <strong> miss</strong> you!
</p>
</div>

<div style= "direction: rtl;">
<img src= "images/goodbye.jpg" style= " width: 48%; height:70%; border:0;" alt = "Bye!!!">
</div>

<!-- for recognition of the makers and a link to the official company site-->

<div>
<p id="shaven"> &#169 <small>Created by </small><a href= "softwarehaven.html"  target= "_blank"> Software Haven inc. 
	<img src= "images/software haven logo 1.jpg" class = "icons" alt= "Software Haven Inc. logo">
	</img></a>
</p> </div>

</body>
</html>