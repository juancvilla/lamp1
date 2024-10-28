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
        define('DB_SERVER', '127.0.0.1');
        define('DB_USERNAME', 'user');
        define('DB_PASSWORD', 'pass');
        define('DB_NAME', 'db');
 
        /* Attempt to connect to MySQL database */
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
?>
