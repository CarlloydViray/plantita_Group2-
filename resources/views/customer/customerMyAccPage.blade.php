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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container">
                <center>{{ session('success') }}</center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br><br><br>
                <h1 class="text-center">MY ACCOUNT CUSTOMER</h1>
                @foreach ($users as $user)
                    <form>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="{{ $user->first_name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="{{ $user->last_name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" value="{{ $user->address }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday"
                                value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gcashNo">Gcash Number</label>
                            <input type="text" class="form-control" id="gcashNo" value="{{ $user->gcash_no }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" value="{{ $user->username }}"
                                readonly>
                        </div>
                    </form>
                    <br>
                    <a href="/edit/customer/{{ $user->regno }}" class="btn btn-primary">Edit My Account</a><br><br>
                    <a href="/customerPage" class="btn btn-secondary">Go back to Home Page</a>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
<?php

}

?>
