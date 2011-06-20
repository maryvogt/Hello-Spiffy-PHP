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
In this sample application, the GWT client passes information to the PHP server using URL parameters. This is not a truly REST-compliant way to pass the information. Accessing the PHP file using different URLs for different operations would be more in line with REST philosophy. However, the preferred way to do this in Apache is URL rewriting, which is done in server configuration. See http://httpd.apache.org/docs/2.0/misc/rewriteguide.html for more information on URL rewriting. We feel that this is beyond the scope of this small sample application. 

License
--------------------------------------

Hello Spiffy PHP is available under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0.html).


