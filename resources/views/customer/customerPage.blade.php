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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>Homepage</title>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <center>
                {{ session('success') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br><br>
    <center>
        <h1>WELCOME TO PLANTITA ORDERING SYSTEM CUSTOMER
        </h1>
    </center>
    <ul>
        <li>
            <form action="customerMyAcc" method="post">
                @csrf
                <button type="submit">My Account</button>
            </form>
        </li><br>
        <li>
            <form action="customerMarketplaceDirect" method="post">
                @csrf
                <button type="submit">Browse Marketplace</button>
            </form>
        </li><br>
        <li>
            <form action="customerMyOrdersDirect" method="post">
                @csrf
                <button type="submit">My Orders</button>
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
