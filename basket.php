<?php

session_start();

include("db.php");

$pagename = " Smart Basket";     //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";         //Call in stylesheet

echo "<title>" . $pagename . "</title>";                                  //Display pagename as window title

if (isset($_POST['prodid'])) {
    $delprodid = $_POST['prodid'];
    $_UNSET($_POST['delprodid']);
    echo " 1 item removed from the basket";
}

echo "<body>";

include("headfile.html");                                                 //Include header layout file

echo "<h4> " . $pagename . "</h4>";                                       //Display name of the page on the webpage

if (isset($_POST['prodid'])) {

    $newprodid = $_POST['prodid'];
    $reququantity = $_POST['quantity'];

    echo "ID of Selected product:" . $_POST['prodid'];
    echo "Quantity of selected product:" . $_POST['quantity'];

    $_SESSION['basket']['$newprodid'] = $reququantity;
    echo "<P> Item added";
} else {
    echo "Basket Unchanged";
}

$total = 0;

echo "<table>";
echo "<tr>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>subtotal</th>";
echo "<th>Remove Product";

echo "</tr>";

if (isset($_SESSION['basket'])) {
    foreach ($SESSION['basket'] as $index => $value) {

        $SQL = "select prodName,prodPrice,prodQuantity from Product where prodId = $index";

        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

        while ($arrayp = mysqli_fetch_array($exeSQL)) {

            echo "<tr>";
            echo "<td>$arrayp ['prodName'] </td>";
            echo "<td>$arrayp ['prodPrice'] </td>";
            echo "<td>$arrayp ['prodQuantity']</td>";
            echo "<td>$arrayp ['prodPrice']*$arrayp ['prodQuantity']";
            $subtotal = $arrayp['prodPrice'] * $arrayp['prodQuantity'];
            $total += $subtotal;
            echo "<td><form method='post' action='basket.php'input type='hidden'>Remove</form></td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td>TOTAL</td>";
        echo "<td>.$total.</td>";
        echo "</tr>";
    }
} else {
    echo "Empty Basket";
}



echo "</table>";

echo "<a href='clearbasket.php'>CLER BASKET</a>";

if (isset($_SESSION['userid'])) {
    echo "<a href='checkout.php'>Checkout</a>";
} else {

    echo "New homteq customers :.<a href='signup.php'> Sign Up </a>.";

    echo "Returning homteq customers : . <a href='login.php>Log In </a>.";
}



include("footfile.html");                                                  //Include head layout file

echo "</body>";
