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
        <h1>Edit My Account</h1>
    </center>

    @foreach ($users as $user)
        <form action="{{ $user->regno }}" method="post">
            @csrf
            First Name: <input type="text" name="first_name" id="first_name" placeholder="Input First name"
                value="{{ $user->first_name }}"><br>
            @error('first_name')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>
            Last Name: <input type="text" name="last_name" id="last_name" placeholder="Input Last name"
                value="{{ $user->last_name }}"><br>
            @error('last_name')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>
            Address: <input type="text" name="address" id="address" placeholder="Input Address"
                value="{{ $user->address }}"><br>
            @error('address')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>
            Birthday <input type="date" name="userBirthday" id="userBirthday" id=""
                value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}"><br>
            @error('userBirthday')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>
            Gcash Number <input type="text" name="gcashno" id="gcashno" id=""
                placeholder="Input Gcash Number" value="{{ $user->gcash_no }}"><br>
            @error('gcashno')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>

            Username: <input type="text" name="username" id="username" placeholder="Input Username"
                value="{{ $user->username }}"><br>
            @error('username')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>
            Password: <input type="password" name="password" id="password" placeholder="Input Password"><br>
            @error('password')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>
            Re-Type Password: <input type="password" name="password2" id="password" placeholder="Input Password"><br>
            @error('password2')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <br>

            <input type="submit" value="Update Credentials" name="create">
        </form>



        <a href="javascript:void(0);" onclick="history.back();">Cancel</a>
    @endforeach
</body>

</html>