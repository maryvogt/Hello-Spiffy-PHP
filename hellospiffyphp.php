<?php

/*******************************************************************************
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 ******************************************************************************/

// emit_user_encoded()
//      outputs the name passed in the URL parameters, encoded for JSON
function emit_user() {

    echo(json_encode(htmlspecialchars($_GET["name"])));
}

// emit_agent()
//      outputs the userAgent as stored by the server, encoded for JSON
function emit_agent() {

    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        // no need for htmlspecialchars, userAgent won't have them
        echo json_encode($_SERVER['HTTP_USER_AGENT']);
    }
}

// get_server_info
//      returns the server's hostname, PHP version and server software version, encoded for JSON
function get_server_info() {

    // use PHP functions to get hostname and PHP version
    $str = gethostname();
    $str = $str . " (PHP: " . phpversion();

    // if the server software version is known, get that too
    if (isset($_SERVER['SERVER_SOFTWARE'])) {
        $str = $str . ", server software: " . $_SERVER['SERVER_SOFTWARE'];
    }

    // close the parenthesis around phpversion and serverinfo
    $str = $str . ")";

    return json_encode($str);
}

function get_error_triggered()
{
    return ($_GET["triggererror"]);
}

// emit_error_code
//      if "Trigger error" checkbox was checked,
//      return error info in the format expected by RESTility
function emit_error_info() {

    if (get_error_triggered()) {
        // build a string that includes server info, to make it clear that this is
        // coming from the server
        $str = "Server reports 'trigger error' condition:  ";
        $str = $str . get_server_info();
    ?>

        "Fault" : {
            "Code" : {
                "Subcode" : {
                    "Value" : "myErrorSubcode"
                },
                "Value" : "myErrorTriggered"
            },
            "Reason" : {
                "Text" : <?php echo (json_encode($str)); ?>
            }
        }
     <?php
     } else {
        ?> "noErrorTriggered" : "nope" <?php
     }
}

//  emit_json_data()
//      outputs the desired info as JSON data
function emit_json_data() {

    //  start with a header to set our MIME type
    header("Content-Type: application/json");
    ?>

    {
    "user" : <?php emit_user() ?> ,
    "userAgent" : <?php emit_agent() ?>,
    "serverInfo" : <?php echo(get_server_info()) ?>

    <?php if (get_error_triggered()) {

        echo ",";
        emit_error_info();
    }
    ?>
    }
    <?php
}

// Here it is: construct and output the wanted JSON data
emit_json_data();
?>






