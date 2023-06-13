<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <title>Signup</title>
</head>

<body>
    <form action="signup" method="post">

        @csrf
        First Name: <input type="text" name="first_name" id="first_name" placeholder="Input First name"
            value="{{ old('first_name') }}"><br>
        @error('first_name')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Last Name: <input type="text" name="last_name" id="last_name" placeholder="Input Last name"
            value="{{ old('last_name') }}"><br>
        @error('last_name')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Address: <input type="text" name="address" id="address" placeholder="Input Address"
            value="{{ old('address') }}"><br>
        @error('address')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Birthday <input type="date" name="userBirthday" id="userBirthday" id=""
            value="{{ old('userBirthday') }}"><br>
        @error('userBirthday')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Gcash Number <input type="text" name="gcashno" id="gcashno" id="" placeholder="Input Gcash Number"
            value="{{ old('gcashno') }}"><br>
        @error('gcashno')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Type: <select name="usertype" id="usertype">
            <option value="">User Type</option>
            <option value="customer" {{ old('usertype') == 'customer' ? 'selected' : '' }}>Customer</option>
            <option value="seller"{{ old('usertype') == 'seller' ? 'selected' : '' }}>Seller</option>
        </select><br>
        @error('usertype')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Username: <input type="text" name="username" id="username" placeholder="Input Username"
            value="{{ old('username') }}"><br>
        @error('username')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Password: <input type="text" name="password" id="password" placeholder="Input Password"><br>
        @error('password')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Re-Type Password: <input type="text" name="password2" id="password" placeholder="Input Password"><br>
        @error('password2')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Create Account" name="create">
    </form>

    <a href="/login">Go back to login page</a>
</body>

</html>
