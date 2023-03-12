<!DOCTYPE html>
<html lang= "en">
<head>
    <title> Study Rooms </title>
    <link rel= "stylesheet" href="stylesheets/studystyle.css">
    <link rel= "icon" href= "images/icon2.ico" type="image/x-icon">
 <meta name= "description" content = "Study Rooms on Campus">
 <meta name= "keywords" content= "campus, study, academics, share, free">
 <meta name= "author" content= "Software Haven inc.">
 <meta property="og:site_name" content="Campus">
 <meta charset= "UTF-8">
<script>
 function showNotify(){
   var x= document.getElementById("menuframe");
     if ((x.style.width > "0px") && (x.style.left == "220px")) {
	x.style.width = "0px";
	x.style.height = "0px";
	x.style.border = "0px";
     } else {
	x.style.width= "300px";
	x.style.height= "400px";
	x.style.border = "1px solid sienna";
	x.style.left= "220px";}
}
 function showMsgs(){
    var x= document.getElementById("menuframe");
     if ((x.style.width > "0px") && (x.style.left == "300px")) {
	x.style.width = "0px";
	x.style.height = "0px";
	x.style.border = "0px";
     } else {
	x.style.width= "300px";
	x.style.height= "400px";
	x.style.border = "1px solid sienna";
	x.style.left= "300px";}
}
 function showCalendar(){
   var x= document.getElementById("menuframe");
    if ((x.style.width > "0px") && (x.style.left == "380px")) {
	x.style.width = "0px";
	x.style.height = "0px";
	x.style.border = "0px";
     } else {
	x.style.width= "300px";
	x.style.height= "400px";
	x.style.border = "1px solid sienna";
	x.style.left= "380px";}
}
function showWorkpane(){
   var x= document.getElementById("sidepane");
   var y= document.getElementById("fullworkframe");
   var z= document.getElementById("newspane");
   var a= document.getElementById("openfullworkframe");
     if (y.style.width > "0px") {
	x.hidden = "";
	y.style.height= "0px";
	y.style.width= "0px";
	y.style.border= "0";
	y.src= "";
	z.style.left = "350px";
	z.style.width = "750px";
	a.innerHTML = "Open full work pane";
      } else {
	x.hidden = "hidden";
	y.style.height= "700px";
	y.style.width= "520px";
	y.src = "fullworkpane.php";
	z.style.left = "530px";
	z.style.width = "570px";
	a.innerHTML = "Close full work pane";}
}
function showCalc(){
   var x= document.getElementById("calcframe");
   var y= document.getElementById("opencalc");
     if (x.style.width > "0px"){
	x.style.width = "0px";
	x.style.height = "0px";
	x.src = "";
	y.innerHTML = "Open Calculator";
      } else {
	x.style.width = "340px";
	x.style.height = "340px";
	x.src = "calculator.html";
	y.innerHTML = "Close Calculator";}
}
function minimizePane(){
   var v = document.getElementById("workpane");
   var w = document.getElementById("maxi");
   var x = document.getElementById("mini");
   var y = document.getElementById("workpanetitle");
   var z = document.getElementById("workitems");
   v.style.top = "87px";
    w.hidden = "";
	x.hidden = "hidden";
	y.hidden = "";
	z.hidden = "hidden";
	return;
}
function maximizePane(){
   var v = document.getElementById("workpane");
   var w = document.getElementById("maxi");
   var x = document.getElementById("mini");
   var y = document.getElementById("workpanetitle");
   var z = document.getElementById("workitems");
   v.style.top = "0";
    w.hidden = "hidden";
	x.hidden = "";
	y.hidden = "hidden";
	z.hidden = "";
	return;
}
function showWiki(){
	var x = document.getElementById("wiki_pane");
	var y = document.getElementById("schedule_pane");
	var z = document.getElementById("wiki_schedule");
	if (z.title.match("Search Wikipedia")){
		 x.hidden = "";
		 y.hidden = "hidden";
		 z.innerHTML = "Study Schedule";
		 z.title = "Study Schedule";
		 state = 0;
		 return state;
	} else {
		 x.hidden = "hidden";
		 y.hidden = "";
		 z.innerHTML = "Search Wikipedia";
		 z.title = "Search Wikipedia";
		 state = 1;
		 return state;
	}
}
</script>
<noscript> Please enable javascript in your browser and refresh this page! </noscript>
</head>
<body>
<div class="mainhead"> <h1> <img id ="campustopicon" src="images/topmast_new2.jpg" alt="Campus mast" usemap="#home" />
<map name= "home">
	<area shape="rectangle" coords="60, 6, 180, 110" href="homepage.php" alt="Home" title="Home" />
	<area shape="rectangle" coords="300, 33, 450, 60" alt="Home" href="homepage.php" title="Home" />
</map></h1></div>
<form id="search" method="get">
<input type="text" name="search" value="" style="width: 200px;" placeholder= "Search Study Rooms"/>
<input type="submit" value="search" />
</form>
<div class= "menu"> <div class= "menubar">
<ul class= "bar"> <li class= "menuitem"> <a href= "homepage.php"> Home </a> </li>
<li class= "menuitem"> <a href="library.php" title= "Library"> <img class="menuicons" src="images/books.ico" alt="library" /> </a> </li>
<li class= "menuitem"> <a href="forums.php" title= "Forums"> <img class="menuicons" src="images/forums.png" alt="forums" /> </a> </li>
<li class= "menuitem"> <a href="questions.php" title= "Questions"> <img class="menuicons" src="images/questions.png" alt="questions" /> </a> </li>
<li class= "menuitem"> <a href="#" title="notifications" onclick= "showNotify()"> <img class= "menuicons" src="images/notifications.png" alt= "Notify" /> </a> </li>
<li class= "menuitem"> <a href="#" title= "Messages" onclick= "showMsgs()"> <img class="menuicons" src="images/message3.jpg" alt="messages" /> </a> </li>
<li class= "menuitem"> <a href="#" title= "Study Calendar" onclick= "showCalendar()"> <img class="menuicons" src="images/calendar2.png" alt="calendar" /> </a> </li>
<li class= "menuitem"> <a href="profile.php?page_id=academicprofile" title= "Your Profile"> <img class="menuicons" src="images/social.jpg" alt="profile" /> </a> </li>
<li class= "menuitem"> <a href= "settings.php" title= "Settings"> <img class= "menuicons" src= "images/settings.gif" alt= "settings" /> </a> </li>
<li class= "menuitem"> <a href= "goodbyepage.php" title= "log out"> Log out </a> </li>
</ul>
</div>
<div class= "menu-hidden-frames">
<iframe class= "menu-frame" id= "menuframe"> </iframe>
</div> </div>

<?php
	$name = array("first_name" => "Peter", "middle_name" => "marie", "last_name" => "ogwara");
	$names = implode(" ", $name);
	$forum1 = "";
	$forum2 = "";
	$forum3 = "";
	$nextschedule = "";
	$q_field = "";
	$q_int = "";
	$q_public = "";
?>

<div class= "screenleft"> <div id="sidepane">
<div class= "fullslide"> <div class="paneheader">
<h4 class="panehead"> Library </h4> <span class="paneline"> <span class= "panearrow"> <a class= "panelink" href="#" onclick = "showslide1()"> &#169; </a> </span> <hr class= "studylines"> </span> </div>
<div class="paneslide">
<form method="get" style= " position: relative; left: 25px; margin: 10px"> <input type="text" name="searchlib" value="" placeholder="Search Library" style="width: 180px;"/>
<input type="submit" value="search" hidden = "hidden"/>
</form>
<div class="rtl_link">
<a class= "panelink" href="library.php">  View full library  </a> <br />
<a class= "panelink" href="#" onclick= "sharebook()"> Share a book </a>
</div> </div> </div>
<div class= "fullslide"> <div class="paneheader">
<h4 class="panehead"> Forums </h4> <span class="paneline"> <span class= "panearrow"> <a class= "panelink" href="#" onclick = "showslide2()"> &#169; </a> </span> <hr class= "studylines"> </span> </div>
<div class="paneslide">
<p class ="in_pane"> <?php echo $forum1?> <br /> <?php echo $forum2?> <br /> <?php echo $forum3?> <br /> </p>
<div class="rtl_link">
<a class= "panelink" href="yourforums.php"> View all active forums </a> <br />
<a class= "panelink" href="#" onclick="newforum()"> Start a forum </a>
</div> </div> </div>
<div class= "fullslide"> <div class="paneheader">
<h4 class="panehead"> Questions </h4> <span class="paneline"> <span class= "panearrow"> <a class= "panelink" href="#" onclick = "showslide3()"> &#169; </a> </span> <hr class= "studylines"> </span> </div>
<div class="paneslide">
<p class ="in_pane"> <?php echo $q_field?> <br /> <?php echo $q_int?> <br /> <?php echo $q_public?> <br /> </p>
<div class="rtl_link">
<a class= "panelink" href="yourquestions.php"> View questions in your field &amp; interests </a> <br />
<a class= "panelink" href="questions.php"> View all questions </a> <br />
<a class= "panelink" href="#" onclick="newquestion()"> Ask a question </a>
</div> </div> </div>

</div>
<div id="fullworkpane"> <iframe class= "hiddenframe" id= "fullworkframe"> </iframe>
</div>
<div id="lowpane"> <ul>
<li> <a href="calendarpage.php" title= "Full Calendar"> <div class= "lowpaneicons"> <img class="icons" src="images/calendar2.png" alt="calendar"> </div> <p class="bottomleft"> Calendar/Events </p> </a> </li>
<li> <a href="profile.php?page_id=all_profiles" title= "View your Profiles"> <div class= "lowpaneicons"> <img class="icons" src="images/social.jpg" alt="profile picture"> </div> <p class="bottomleft"> <?php echo ucwords($names); ?> </p> </a> </li> <br>
<li> <a href="goodbyepage.php" title="log out"> <p class="bottomleft"> Log out </p> </a> </li>
</ul> </div> </div>

<div class= "newspane" id= "newspane"> <div class= "autoenlarge"> <div class= "newsingle">

</div></div></div>

<div class= "calculator">
<iframe class= "hiddenframe" id= "calcframe" src= "calculator.html"> </iframe>
</div>

<div class= "right_pane">
<div class= "clock_pane"> <iframe class= "clockframe" src= "webclock.html"> </iframe> </div> <hr class= "studylines">
<div id= "wiki_pane" hidden = "hidden"> <iframe class= "wiki_frame" src= "wiki.php"> </iframe> </div> 
<div id= "schedule_pane"> <p style= "text-align:center;"> <?php echo $nextschedule?> <br /> <?php echo $nextschedule?> <br> <?php echo $nextschedule?> <br>
<a class="panelink" href="#" onclick= "newSchedule()"> Add study activity </a> </p> </div> <hr class= "studylines">
<div id = "hiddenspace">
<div class="workpane" id= "workpane">
<div id= "mini" class = "mini"> <a class="panelink" id= "mini2" href="#" title= "Minimize" onclick= "minimizePane()"> - </a> </div>
<div id= "maxi" class = "mini" hidden = "hidden"> <a class="panelink" id= "maxi2" href="#" title= "Maximize" onclick= "maximizePane()"> - </a> </div>
<div id= "workpanetitle" hidden= "hidden"> <b> Study tools </b> </div><div class= "workitems" id= "workitems">
<a id = "wiki_schedule" class="panelink" href="#" title= "Search Wikipedia" onclick= "showWiki()"> Search Wikipedia </a> <br />
<a class="panelink" id= "opencalc" href="#" title="calculator" onclick= "showCalc()"> Open Calculator </a> <br />
<a class="panelink" id= "openfullworkframe" href="#" title= "Full-work area" onclick= "showWorkpane()"> Open full-work area </a> <br />
<small> Take a break? Switch to </small>
<div class= "switch">
<a class= "sociallink" href= "social.php" title= "Go to Social"> Social </a> <br />
<a class= "extracurrlink" href= "extracurricular.php" title= "Go to Extracurriculars"> Extracurricular </a>
</div> </div> </div> </div> </div>

<div>
<p id="shaven"> &#169; <small>Created by </small><a href= "softwarehaven.html"  target= "_blank"> Software Haven inc. <img src= "images/software haven logo 1.jpg" class = "icons" id= "shlogo" alt= "Software Haven Inc. logo">
</a> </p> </div>
</body>
</html>