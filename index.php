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
