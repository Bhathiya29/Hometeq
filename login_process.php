<?php

session_start();

include("db.php");

$pagename = "Your Login Results";     //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";         //Call in stylesheet

echo "<title>" . $pagename . "</title>";                                  //Display pagename as window title

echo "<body>";

include("headfile.html");                                                 //Include header layout file

echo "<h4> " . $pagename . "</h4>";                                       //Display name of the page on the webpage

$email = $_POST['email'];
$password = $_POST['password'];

echo "The email entere is " . $email . " and the password is " . $password . ".";


if (empty($email) && empty($password)) {

    echo "Both Email and Password fields are empty they need to be filled";
} else {
    $sql = "select userEmail,userPassword from Users where email== $email";
    $arrayu = mysqli_query($conn, $sql);
    $nbrecs = mysqli_num_rows($arrayu);

    if ($nbrecs == 0) {
        echo " Email not recognized, login again";
    } else {
        if (!$arrayu['userPassword'] == $password) {
            echo "Password not recognized, login again";
        } else {
            echo "Login Success";
            $_SESSION['userid'];
            $_SESSION['usertype'];
            $_SESSION['fname'];
            $_SESSION['sname'];

            echo "Hello " . $_SESSION['fname'] . "" . $_SESSION['sname'] . " .";

            echo "Welcome" . $SESSION['usertype'];
        }
    }
}




include("footfile.html");                                                  //Include head layout file

echo "</body>";
