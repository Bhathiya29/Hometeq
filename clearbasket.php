?php


$SESSION_START();
include("db.php");

$pagename = "Clear Smart Basket"; //Create and populate a variable called $pagename

echo "
<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>" . $pagename . "</title>"; //Display pagename as window title

echo "

<body>";

    include("headfile.html"); //Include header layout file

    echo "<h4> " . $pagename . "</h4>"; //Display name of the page on the webpage

    unset($_SESSION['basket']);
    echo"Your basket has been cleared";


    include("footfile.html"); //Include head layout file

    echo "</body>";