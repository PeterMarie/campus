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

    <?php
        // get the user's viewing intention
        $id = $_GET["page_id"];
        // direct to page wanted
        switch ($id) {
            case "all_profiles":
                
                break;
                
            case "academic_profile":
            
                break;
                
            case "social_profile":
            
                break;
                
            case "extracurricular_profile":
            
                break;
            
            default:
                
                break;
        }
    ?>
</body>
</html>