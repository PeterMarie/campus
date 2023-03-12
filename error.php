<html>
    <head>
        <title> Error </title>
     </head>
     
     <body>
         <?php
            $id= $_GET["id"];
            
            switch ($id) {
                case 140:
                    $error= "Unable to open connection to CAMPUS servers.";
                    break;
                    
                case 141:
                    $error= "Failed to connect to the CAMPUS database.";
                    break;
                    
                case 142:
                    $error= "Failed to retrieve data from the CAMPUS database.";
                    break;
                
                case 143:
                    $error= "Cannot locate your user on the Campus <br />
                            Suggestions: <br />
                            1. Return to the welcome page and log in again. <br />
                            2. If you use an IP Address changer, disable it.<br />
                              Campus does not permit the hiding of IP addresses";
                    
                    break;
                
                case 144:
                    $error= "Fatal Server error! Please contact the 
                             Campus administrators at once!";
                    break;    
                default:
                    $error= "And now, it seems we can't recognise the error!
                            Please go back and try again!";
                    break;
            }
         ?>
         
         UH OH!
         Seems like we've encountered an error
         Please GO BACK and try again. <br />
         If you keep getting this message, contact the administrator. <br />
         
         Error Report: <br />
         <?php 
            echo $error;
            ?>
     </body>
</html>         