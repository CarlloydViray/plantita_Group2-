<?php

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
    <center><br><br>
        <h1>My Plantitas</h1>
    </center>
    <br><br><br>
    <form action="{{ route('sellerMyPlantita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Item Description</label>
        <input type="text" class="form-control" placeholder="Enter Description" name="desc"
            value="{{ old('desc') }}">
        @error('desc')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        <label>Item Price</label>
        <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ old('price') }}">
        @error('price')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>
        <label>Upload Image</label>
        <input type="file" class="form-control" name="img">
        @error('img')
            <span class="mb-3" style="color: red">{{ $message }}</span>
        @enderror
        <br>

        <input type="submit" class="btn btn-success btn-block" value="Add Plantita">


    </form>
    <br>
    <a href="/sellerPage">Go back to Home Page</a>
    <br><br><br>
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

                    <td>
                        {{ $plantita->itemno }}
                    </td>
                    <td>
                        {{ $plantita->itemdesc }}
                    </td>
                    <td>
                        <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image" width="250"
                            height="250">
                    </td>
                    <td>
                        {{ $plantita->itemprice }}
                    </td>

                    <td>
                        <form action="{{ route('sellerMyPlantita.destroy', $plantita->itemno) }}" method="post">
                            <a class="btn btn-warning" href="/edit/{{ $plantita->itemno }}">Edit</a>
                            <a class="btn btn-danger" href="/delete/{{ $plantita->itemno }}"
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
</body>

</html>
<?php
}

?>
