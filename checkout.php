<?php

session_start();

include('db.php');

mysqli_report(MYSQLI_REPORT_OFF);


$pagename = "Checkout ";     //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";         //Call in stylesheet

echo "<title>" . $pagename . "</title>";                                  //Display pagename as window title

echo "<body>";

include("headfile.html");
include("detect_login.php");                                              //Include header layout file

echo "<h4> " . $pagename . "</h4>";                                       //Display name of the page on the webpage

$currentdatetime = date("Y-m-d H:i:s");


$SQL = "INSERT INTO  Orders (userId,orderDateTime,orderStatus) Values($_SESSION ['userId'],$currentdatetime,'Placed')";

if (mysqli_query($con, $SQL) == TRUE) {

    if (isset($_SESSION['basket']) && $_SESSION['basket'] > 0) {

        echo " Order Success ";

        $sql = "SELECT orderNo,orderDateTime from Orders where userId==$_SESSION ['userId'] and orderDateTime== $currentdatetime";

        $results = mysqli_query($con, $sql);

        $arrayo = mysqli_fetch_array($results);

        $orderNo = $arrayo['orderNo'];
        echo "$orderNo";

        echo "<table>";
        echo "<tr>";
        echo "<th>Product Name</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "<th>subtotal</th>";

        echo "</tr>";

        if (isset($_SESSION['basket'])) {
            foreach ($SESSION['basket'] as $index => $value) {

                $SQL = "select prodId,prodName,prodPrice,prodQuantity from Product where prodId = $index";

                $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

                while ($arrayb = mysqli_fetch_array($exeSQL)) {

                    echo "<tr>";
                    echo "<td>$arrayb ['prodName'] </td>";
                    echo "<td>$arrayb ['prodPrice'] </td>";
                    echo "<td>$arrayb ['prodQuantity']</td>";
                    echo "<td>$arrayb ['prodPrice']*$arrayb ['prodQuantity']";
                    $subtotal = $arrayb['prodPrice'] * $arrayb['prodQuantity'];
                    $sqlquery = "INSERT INTO Order_line(orderNo,prodId,quantityOrdered,subTotal)VALUES ($orderNo,$arrayb ['prodId'],$arrayb ['prodQuantity],$subtotal)";
                    $exection = mysqli_query($conn, $sqlquery);

                    $total += $subtotal;
                    //echo "<td><form method='post' action='basket.php'input type='hidden'>Remove</form></td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td>TOTAL</td>";
                echo "<td>.$total.</td>";
                echo "</tr>";

                $sqlupdate = "UPDATE Orders SET orderTotal=$total";
                mysqli_query($conn, $sqlupdate);
            }
        } else {
            echo "Empty Basket";
        }



        echo "</table>";
    }
} else {
    echo " order error";
}

$SESSION_UNSET('basket');

include("footfile.html");                                                  //Include head layout file

echo "</body>";
