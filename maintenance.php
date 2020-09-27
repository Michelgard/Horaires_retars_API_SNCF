<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Maintenance</title>
            <!-- Favicons -->
           <link rel="shortcut icon" href="http://botV3.blog-de-michel.fr/assets/images/ico16x16.ico" type="images/x-icon">

            <style>
                body { text-align: center; padding: 150px; }
                h1 { font-size: 50px; }
                body { font: 20px Helvetica, sans-serif; color: #333; }
                article { display: block; text-align: left; width: 650px; margin: 0 auto; }
                a { color: #dc8100; text-decoration: none; }
                a:hover { color: #333; text-decoration: none; }
            </style>
    </head>

    <body>
        <article>
            <h1>Trains est en maintenance</h1>
            <div>
                <p>Retour dans très peu de temps.</p>
                <p>&mdash; L'&eacute;quipe Blog-de-michel</p>
            </div>
        </article>
        
        <article>
            <h1>Trains is under maintenance</h1>
            <div>
                <p>Back in a very short time.</p>
                <p>&mdash; The Blog-de-michel team</p>
            </div>
        </article>
    </body>
</html>
<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
