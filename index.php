<?php
        echo "Hello from php! <BR>";
        $dbhost = '127.0.0.1';
        $dbuser = 'user';
        $dbpass = 'pass';
        $conn = new mysqli($dbhost, $dbuser, $dbpass);
        if ($conn->connect_error) {
                // print_r($conn);
                die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        $database = mysqli_select_db($conn, 'db');
?>
<html>
        <head>
        <title>PHP Test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
        </head>

<body>
        <h1>PHP Test</h1>
                <p><b>An juancvilla Example of PHP in Action</b></p>
                <?php echo "The Current Date and Time is: <br />";
                echo date("g:i A l, F j Y.");?> </p>
        </body>
</html>
