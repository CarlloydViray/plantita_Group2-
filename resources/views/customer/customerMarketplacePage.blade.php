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

    <title>Marketplace</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>
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
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <center>
                {{ session('error') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br><br>
    <center>
        <h1>MARKETPLACE</h1>
    </center>
    <br>
    <a href="/customerPage">Go back to Home Page</a>
    <br><br><br>

    <form action="customerPaymentDirect" method="post" enctype="multipart/form-data">
        @csrf
        <table id="plantitas" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Plantita Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Seller</th>
                    <th>Buy?</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plantitas as $plantita)
                    <tr>
                        <td>
                            {{ $plantita->itemdesc }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image"
                                width="250" height="250">
                        </td>
                        <td>
                            {{ $plantita->itemprice }}
                        </td>
                        <td>
                            {{ $plantita->first_name }}
                            {{ $plantita->last_name }}
                        </td>
                        <td>
                            <input type="checkbox" name="itemno[]" value="{{ $plantita->itemno }}">

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <input type="submit" class="btn btn-success btn-block" value="Add Checked Plantita/s to Cart">
    </form>


</body>

</html>

<?php

}
?>
