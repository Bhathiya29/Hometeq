<?php

session_start();
include("db.php");
mysqli_report(MYSQLI_REPORT_OFF);

$pagename = "Sign Up Results";     //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";         //Call in stylesheet

echo "<title>" . $pagename . "</title>";                                  //Display pagename as window title

echo "<body>";

include("headfile.html");                                                 //Include header layout file

echo "<h4> " . $pagename . "</h4>";                                       //Display name of the page on the webpage

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$pcode = $_POST['postcode'];
$tel = $_POST['telno'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];





if (!empty($fname || $lname || $address || $tel || $mail || $password || $cpassword)) {
    if (!$password == $cpassword) {
        echo " Error passwords do not match";
        echo "<a href='signup.php'>Sign Up</a>";
    } else {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {

            $sql = "insert into users (userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword) 
                    values ($fname,$lname,$address,$pcode,$tel,$mail,$password,$cpassword";

            $conn->query($sql);

            if (!$conn->connect_error) {
                echo " Sign up confirmed successfully";
                echo "<a href='signup.php'>signup</a>";
            } else {
                echo "Connection failed:  . $conn->connect_error";
                echo ".$mysqli_errno('$conn').";

                if ($mysqli_errno('$conn') == 1062) {
                    echo "Email has already been taken";
                    echo "<a href='signup.php'>signup</a>";
                } else if ($mysqli_errno('$conn') == 1064) {
                    echo " invalid characters entered";
                    echo "<a href='signup.php'>signup</a>";
                }
            }
        } else {
            echo " Email not in the right format";
            echo "<a href='signup.php'>signup</a>";
        }
    }
} else {
    echo "All mandatory fields are required";
    echo "<a href='signup.php'>signup</a>";
}



include("footfile.html");                                                  //Include head layout file

echo "</body>";
