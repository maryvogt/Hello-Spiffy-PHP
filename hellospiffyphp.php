
{
"user": <?php echo(json_encode(htmlspecialchars($_GET["name"]))); ?>,
"userAgent": <?php echo(json_encode(htmlspecialchars($_SERVER['HTTP_USER_AGENT']))) ?>,
"serverInfo": <?php echo (json_encode(htmlspecialchars($SERVER['SERVER_NAME']))) ?>

}
