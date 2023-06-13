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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>Homepage</title>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            <center>
                {{ session('success') }}
            </center>
        </div>
    @endif
    <br><br>
    <center>
        <h1>WELCOME TO PLANTITA ORDERING SYSTEM SELLER
        </h1>
    </center>
    <ul>
        <li>
            <form action="sellerMyAcc" method="post">
                @csrf
                <button type="submit">My Account</button>
            </form>
        </li><br>
        <li>
            <form action="sellerPlantita" method="post">
                @csrf
                <button type="submit">View My Plantita Products</button>
            </form>

        </li><br>
        <li>
            <form action="sellerPlantita" method="post">
                @csrf
                <button type="submit">Order Listing</button>
            </form>
            {{-- <form action="sellerOrders.php" method="post"><input type="submit" value="Order Listing"
                    name="orderListing"></form> --}}
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
