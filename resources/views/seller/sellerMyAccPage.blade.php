<?php
session_start();

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
