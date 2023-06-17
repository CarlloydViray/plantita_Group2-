<?php

if(session('regno') == null){
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login Required</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="alert alert-warning text-center">
                    <h4>Please log in to access this page.</h4>
                    <p>If you don't have an account, you can <a href="/signup">sign up here</a>.</p>
                    <p>Already have an account? <a href="/login">Log in</a> to continue.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
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
