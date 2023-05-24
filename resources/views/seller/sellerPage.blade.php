<?php

if(session('regno') == null){
    echo "<br><br><center>Log in first</center>";

    //add a template here for redirecting
    header("refresh: 3; url=/");
} else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <br><br>
    <center>
        <h1>WELCOME TO PLANTITA ORDERING SYSTEM SELLER
        </h1>
    </center>
    <ul>
        <li>
            <form action="sellerMyAcc.php" method="post"><input type="submit" value="My Account" name="myAcc"></form>
        </li><br>
        <li>
            <form action="sellerPlantita.php" method="post"><input type="submit" value="View My Plantita Products"
                    name="view"></form>
        </li><br>
        <li>
            <form action="sellerOrders.php" method="post"><input type="submit" value="Order Listing"
                    name="orderListing"></form>
        </li><br>
        <li>
            <a href="/logout"><button>Logout</button></a>
        </li><br>
    </ul>


</body>

</html>
<?php
}
?>
