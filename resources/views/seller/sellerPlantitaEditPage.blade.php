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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Edit My Plantita</title>
</head>

<body>
    <center><br><br>
        <h1>Edit Plantita</h1>
    </center>

    @foreach ($plantitas as $plantita)
        <form action="{{ $plantita->itemno }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Item Description</label>
            <input type="text" class="form-control" placeholder="Enter Description" name="desc"
                value="{{ $plantita->itemdesc }}">
            @error('desc')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror

            <label>Item Price</label>
            <input type="text" class="form-control" placeholder="Enter Pride" name="price"
                value="{{ $plantita->itemprice }}" class="form-select">
            @error('price')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror
            <label>Current Image</label>
            <div>
                <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Current Image"
                    style="max-width: 200px;">
            </div>
            <label>Upload Image</label>
            <input type="file" class="form-control" name="img">
            @error('img')
                <span class="mb-3" style="color: red">{{ $message }}</span>
            @enderror


            <input type="submit" class="btn btn-success btn-block" value="Update">


        </form>
    @endforeach
</body>

</html>
<?php
}
?>
