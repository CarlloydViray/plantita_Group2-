<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Login</title>
</head>

<body>
    <form action="login" method="post">
        @csrf
        <input type="text" name="username" placeholder="Input Username"><br>
        <br>
        <input type="password" name="password" placeholder="Input Password"><br>
        <br>
        <input type="submit" value="Login" name="login">
    </form>

    <p><a href="/signup">Don't have an account?</a></p>
</body>

</html>
