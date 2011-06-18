<?php
//echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';


?>


{
    "user": <?php echo(json_encode(htmlspecialchars($_GET["name"]))) ?>,
    "userAgent": "Firefox",
    "serverInfo": "Zack's frog"
}
