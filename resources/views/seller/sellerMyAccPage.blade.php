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


    <title>My Account</title>
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

    <br><br><br>
    <center>
        <h1>MY ACCOUNT SELLER</h1>
    </center>
    @foreach ($users as $user)
        First Name: <input type="text" value="{{ $user->first_name }}" readonly><br><br>
        Last Name: <input type="text" value="{{ $user->last_name }}" readonly><br><br>
        Address: <input type="text" value="{{ $user->birthday }}" readonly><br><br>
        Birthday: <input type="date" value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}"
            readonly><br><br>
        Gcash Number: <input type="text" value="{{ $user->gcash_no }}" readonly><br><br>
        Username: <input type="text" value="{{ $user->username }}" readonly><br><br>

        <a href="/edit/seller/{{ $user->regno }}">Edit My Account</a><br>
        <a href="/sellerPage">Go back to Home Page</a>
    @endforeach
</body>

</html>
<?php

}

?>
