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

    <title>Edit My Plantita</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h1>Edit Plantita</h1>
            </div>
        </div>

        @foreach ($plantitas as $plantita)
            <form action="{{ $plantita->itemno }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="desc" class="form-label">Item Description</label>
                    <input type="text" class="form-control" id="desc" placeholder="Enter Description"
                        name="desc" value="{{ $plantita->itemdesc }}">
                    @error('desc')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Item Price</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price"
                        value="{{ $plantita->itemprice }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="currentImg" class="form-label">Current Image</label>
                    <div>
                        <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Current Image"
                            style="max-width: 200px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="img" name="img">
                    @error('img')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-success btn-block" value="Update"><br><br>
                    <a href="/sellerMyPlantita" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        @endforeach
    </div>
</body>


</html>
<?php
}
?>
