<?php

// emit_user_encoded()
//      outputs the name passed in the URL parameters, encoded for JSON
function emit_user(){

	echo(json_encode(htmlspecialchars($_GET["name"])));
}

// emit_agent()
//      outputs the userAgent as stored by the server, encoded for JSON
function emit_agent(){

	if(isset($_SERVER['HTTP_USER_AGENT'])){
		// no need for htmlspecialchars, userAgent won't have them
   		echo json_encode($_SERVER['HTTP_USER_AGENT']);
   	}
}

// emit_server_info 
//      outputs the server's hostname, PHP version and server software version, encoded for JSON
function emit_server_info(){

    // use PHP functions to get hostname and PHP version
    $str = gethostname();
    $str = $str . " (PHP: " . phpversion();
    
    // if the server software version is known, get that too
    if(isset($_SERVER['SERVER_SOFTWARE'])){
        $str = $str . ", server software: " . $_SERVER['SERVER_SOFTWARE'] ;
    }
    
    // close the parenthesis around phpversion and serverinfo    
    $str = $str . ")";
   	
  	echo json_encode($str);
}

//  emit_json_data()
//      outputs the desired info as JSON data
function emit_json_data(){

    //  start with a header to set our MIME type
    header("Content-Type: application/json");
    ?> 
    
    {
    "user" : <?php emit_user() ?> ,
    "userAgent" : <?php emit_agent() ?>,
    "serverInfo" : <?php emit_server_info() ?>    
    }
    <?php
}

// Here it is: construct and output the wanted JSON data
emit_json_data();
?> 






