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
            <div class="container">
                <center>
                    {{ session('success') }}
                </center>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <div class="container">
                <center>
                    {{ session('error') }}
                </center>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <br><br>
        <center>
            <h1>MARKETPLACE</h1>
            <br>
            <a href="/customerPage" class="btn btn-primary">Go back to Home Page</a>
        </center>

        <br><br><br>

        <form action="customerPaymentDirect" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @foreach ($plantitas as $plantita)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/images/' . $plantita->img) }}" class="card-img-top"
                                alt="Plantita Image" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $plantita->itemdesc }}</h5>
                                <p class="card-text">Price: {{ $plantita->itemprice }}</p>
                                <p class="card-text">Seller: {{ $plantita->first_name }} {{ $plantita->last_name }}</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="itemno[]"
                                        value="{{ $plantita->itemno }}">
                                    <label class="form-check-label" for="plantitaCheckbox">Buy?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <center>
                <input type="submit" class="btn btn-success btn-block" value="Add Checked Plantita/s to Cart">
            </center>
        </form>
        <br><br>
    </div>
</body>


</html>

<?php

}
?>
