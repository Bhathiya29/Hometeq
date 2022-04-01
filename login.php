<?php

session_start();

$pagename = "Sign Up";     //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";         //Call in stylesheet

echo "<title>" . $pagename . "</title>";                                  //Display pagename as window title

echo "<body>";

include("headfile.html");                                                 //Include header layout file

echo "<h4> " . $pagename . "</h4>";                                       //Display name of the page on the webpage

echo "<form action='login_process.php' method='POST'>";
echo "<table>";
echo "<tr>";
echo "<td><label for='email'>Email:</label></td>";
echo "<td><input type='text' id='email' name='email'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='password'>Password:</label></td>";
echo "<td><input type='password' id='password' name='password'";
echo "</tr>";
echo "</table>";
echo "</form>";

include("footfile.html");                                                  //Include head layout file

echo "</body>";
