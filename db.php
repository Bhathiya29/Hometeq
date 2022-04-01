<?php

$dbhost = "phpmyadmin.ecs.westminster.ac.uk";
$dbuser = "w1810000";
$dbpass = "8BvbvSMQSpIo";
$dbname = "w1810000_0";

//Create a DB Connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// If the DB connection fails,display an error message and FAMEndExist
if (!$conn) {
    die('Could not connect:' . mysqli_connect_error());   //changed the code a little bit from stackoeverflow as a solution
}
//Select the Database
mysqli_select_db($conn, $dbname);
