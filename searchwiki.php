<?php
            $item = $_POST['item'];
            $item2= urlencode($item);
    header ("location: http://www.wikipedia.com/search?query={$item2}");
    exit;
?>
<html>
    <head>
      
    </head>
    <body>
        
    </body>
</html>  