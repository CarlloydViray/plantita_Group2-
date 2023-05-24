<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="login" method="post">
        @csrf
        <input type="text" name="username" placeholder="Input Username"><br>
        @error('username')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        <input type="password" name="password" placeholder="Input Password"><br>
        @error('password')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Login" name="login">
    </form>

    <p><a href="createAcc.php">Don't have an account?</a></p>
</body>

</html>
