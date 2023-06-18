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


    <title>Preview Orders</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>

    <style>
        .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #e2e2e2;
            border-radius: 5px;
        }

        .product-card img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product-card h5 {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .product-card p {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
        }

        .total-price {
            font-weight: bold;
        }
    </style>


</head>


<body>
    <br><br>
    <div class="container">
        <center>
            <h1>My Plantita Cart</h1>
            <br>
            <a href="/customerMarketplace" class="btn btn-secondary">Cancel</a>
        </center>
        <br><br>

        <form action="{{ route('customerPayment.store') }}" method="POST">
            @csrf
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="{{ asset('storage/images/' . $order->img) }}" alt="Plantita Image">
                            <h5>{{ $order->itemdesc }}</h5>
                            <p>Seller: {{ $order->first_name . ' ' . $order->last_name }}</p>
                            <p>Price: {{ $order->itemprice }}</p>
                            <p>Gcash Number: {{ $order->gcash_no }}</p>
                            <div class="mb-3">
                                <label for="gcashRef" class="form-label">Enter Gcash Reference No.</label>
                                <input type="text" name="gcash" value="{{ old('gcash') }}" class="form-control"
                                    id="gcashRef">
                                @error('gcash')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Enter Amount</label>
                                <input type="text" name="amount" value="{{ old('amount') }}" class="form-control"
                                    id="gcashRef">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center total-price">
                Total: @foreach ($sum as $total)
                    {{ $total->totalprice }}
                @endforeach
            </div>
            <br>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-lg" value="Order">
            </div>
        </form>
    </div>
</body>

</html>

<?php

}

?>
