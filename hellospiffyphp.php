<?php

function get_user_encoded(){

	return json_encode(htmlspecialchars($_GET["name"]));
}

function get_agent_encoded(){

	if(isset($_SERVER['HTTP_USER_AGENT'])){
		// no need for htmlspecialchars, userAgent won't have them
   		return json_encode($_SERVER['HTTP_USER_AGENT']);
   	}
}

function emit_server_info(){

    $str = gethostname();
    $str = $str . " (PHP: " . phpversion();
    
    
    if(isset($_SERVER['SERVER_SOFTWARE'])){
        $str = $str . ", server software: " . $_SERVER['SERVER_SOFTWARE'] ;
    }
    
    $str = $str . ")";
   	
  	echo json_encode($str);
}

function emit_json_data(){

    header("Content-Type: application/json");
    ?> 
    
    {
    "debugversion" : "406",
    "user" : <?php echo(get_user_encoded()) ?> ,
    "userAgent" : <?php echo(get_agent_encoded()) ?>,
    "serverInfo" : <?php emit_server_info() ?>    
    }
    <?php
}

emit_json_data();
?> 






