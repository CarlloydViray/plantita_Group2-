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


    <title>My Orders</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>
</head>

<body>
    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            <div class="container">
                <center>
                    {{ session('warning') }}
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <br><br>
    <div class="container">
        <center>
            <h1>My Orders</h1>
            <br>
            <a href="/customerPage" class="btn btn-primary">Go back to Home Page</a>
        </center>

        <br><br><br>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($users as $user)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $user->img) }}" class="card-img-top" alt="Plantita Image"
                            style="height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">Order No: {{ $user->orderno }}</h5>
                            <p class="card-text">Trans No: {{ $user->transno }}</p>
                            <p class="card-text">Item No (Plantita): {{ $user->itemno }}</p>
                            <p class="card-text">Description: {{ $user->itemdesc }}</p>
                            <p class="card-text">Price: {{ $user->price }}</p>
                            <p class="card-text">Status: {{ $user->status }}</p>
                            <p class="card-text">Remarks: {{ $user->remarks }}</p>
                            <form action="{{ route('customerOrders.destroy', $user->transno) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
}
?>
