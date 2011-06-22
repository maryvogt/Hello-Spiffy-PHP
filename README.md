[Hello Spiffy PHP](http://www.spiffyui.org) - GWT made simple
==================================================

Hello Spiffy PHP is a sample application using the [Spiffy UI Framework](http://www.spiffyui.org). It builds a simple REST application with Apache Ant and runs on PHP.


Building and Running Spiffy UI
--------------------------------------

Hello Spiffy PHP is built with [Apache Ant](http://ant.apache.org/) using [Apache Ivy](http://ant.apache.org/ivy/) and deployed to [PHP](http://php.net/).  Once you've installed Ant, PHP, and a web server like [Apache HTTP](http://httpd.apache.org/),  go to your Hello-Spiffy-PHP working copy and run this command:

        <ANT_HOME>/ant
        
The ant command will download the required libraries and build the Hello Spiffy PHP project. 

To deploy the Hello Spiffy PHP application, copy the contents of the target/www directory from your Hello-Spiffy-PHP working copy of to your web server server.  Run the application by accessing the index.html file. 

Hello Spiffy PHP as a REST application
--------------------------------------

PHP files normally serve at a specific URL.  That works well for searching web pages, but not for REST.  

To make our application support the name as part of the URL we're using the <a href="http://httpd.apache.org/docs/current/mod/mod_rewrite.html">Apache mod_rewrite</a> module.  This requires your Apache server to have mod_rewrite installed and enabled.  If you do then you can just define a rewrite rule in your .htaccess file like this:

       RewriteEngine on
       RewriteRule ^hellospiffyphp/(.*)$ hellospiffyphp.php?name=$1&%{QUERY_STRING} 
       
This rule will take requests to hellospiffyphp/John and send them to hellospiffyphp.php?name=John.  If your server doesn't support mod_rewrite you can just change the client to pass the name as an URL parameter.  

License
--------------------------------------

Hello Spiffy PHP is available under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0.html).


