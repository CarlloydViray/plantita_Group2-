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

    <title>Order Listing</title>
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
    <br><br>
    <center>
        <h1>
            Orders Listing
        </h1>
    </center>
    <br>
    <a href="/sellerPage">Go back to Home Page</a>
    <table id="plantitas" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Order No</th>
                <th>Trans No</th>
                <th>Item No</th>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plantitas as $plantita)
                <tr>
                    <td>
                        {{ $plantita->first_name . ' ' . $plantita->last_name }}
                    </td>
                    <td>
                        {{ $plantita->orderno }}
                    </td>
                    <td>
                        {{ $plantita->transno }}
                    </td>
                    <td>
                        {{ $plantita->itemno }}
                    </td>
                    <td>
                        <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image" width="250"
                            height="250">
                    </td>
                    <td>
                        {{ $plantita->itemdesc }}
                    </td>
                    <td>
                        {{ $plantita->price }}
                    </td>
                    <td>
                        {{ $plantita->status }}
                    </td>
                    <td>
                        {{ $plantita->remarks }}
                    </td>
                    <td>
                        <a class="btn btn-warning" href="/edit/{{ $plantita->transno }}">Edit</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>


</body>

</html>
<?php

}
?>
