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

    {{-- datatable bootsrap --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>


    <title>My Plantitas</title>
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
    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show">
            <center>
                {{ session('info') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            <center>
                {{ session('warning') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h1>My Plantitas</h1>
                <a href="/sellerPage" class="btn btn-secondary">Go back to Home Page</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form action="{{ route('sellerMyPlantita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="desc" class="form-label">Item Description</label>
                        <input type="text" class="form-control" id="desc" placeholder="Enter Description"
                            name="desc" value="{{ old('desc') }}">
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Item Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Price"
                            name="price" value="{{ old('price') }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="img" name="img">
                        @error('img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-success btn-block" value="Add Plantita">
                    </div>
                </form>


            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <table id="plantitas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Item No</th>
                            <th>Item Decription</th>
                            <th>Image</th>
                            <th>Item Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plantitas as $plantita)
                            <tr>
                                <td>{{ $plantita->itemno }}</td>
                                <td>{{ $plantita->itemdesc }}</td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image"
                                        width="250" height="250">
                                </td>
                                <td>{{ $plantita->itemprice }}</td>
                                <td>
                                    <form action="{{ route('sellerMyPlantita.destroy', $plantita->itemno) }}"
                                        method="post">
                                        <a class="btn btn-warning"
                                            href="/edit/plantita/{{ $plantita->itemno }}">Edit</a>
                                        <a class="btn btn-danger" href="/delete/plantita/{{ $plantita->itemno }}"
                                            onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Item No</th>
                            <th>Image</th>
                            <th>Item Decription</th>
                            <th>Item Price</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <br><br>
</body>

</html>
<?php
}

?>
