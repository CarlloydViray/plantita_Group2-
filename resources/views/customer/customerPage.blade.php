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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <br><br>
    <center>
        <h1>WELCOME TO PLANTITA ORDERING SYSTEM
        </h1>
    </center>
    <ul>
        <li>
            <form action="customerMyAcc.php" method="post">
                <input type="submit" value="My Account" name="myAcc">
            </form>
        </li><br>
        <li>
            <form action="browse.php" method="post">
                <input type="submit" value="Browse Marketplace" name="browse">
            </form>
        </li><br>
        <li>
            <form action="customerOrders.php" method="post">
                <input type="submit" value="My Orders" name="myOrders">
            </form>
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