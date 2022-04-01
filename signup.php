<?php

$pagename = "Sign Up";     //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";         //Call in stylesheet

echo "<title>" . $pagename . "</title>";                                  //Display pagename as window title

echo "<body>";

include("headfile.html");                                                 //Include header layout file

echo "<h4> " . $pagename . "</h4>";                                       //Display name of the page on the webpage

echo "<form action='signup_process.php' method='POST'>";
echo "<table>";
echo "<tr>";
echo "<td><label for='fname'>First name:</label></td>";
echo "<td><input type='text' id='fname' name='fname'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='lname'>Last Name:</label></td>";
echo "<td><input type='text' id='lname' name='lname'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='address'>Address:</label></td>";
echo "<td><input type='text' id='address' name='address'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='postcode'>Postcode:</label></td>";
echo "<td><input type='text' id='postcode' name='postcode'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='telno'>Tel NO:</label></td>";
echo "<td><input type='text' id='telno' name='telno'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='mail'>Email Address:</label></td>";
echo "<td><input type='text' id='mail' name='mail'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='password'>Password:</label></td>";
echo "<td><input type='password' id='password' name='password'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label for='cpassword'>Confirm password:</label></td>";
echo "<td><input type='password' id='cpassword' name='cpassword'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input type='button' value='Sign Up'</td>";
echo "<td><input type='button' value='Clear Form'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";










include("footfile.html");                                                  //Include head layout file

echo "</body>";
