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
</head>

<body>

    <br><br>
    <center>
        <h1>My Plantita Cart</h1>
        <br>
        <a href="/customerMarketplace" class="btn btn-secondary">Cancel</a>
    </center>
    <br><br>

    <form action="{{ route('customerPayment.store') }}" method="POST">
        @csrf
        <table id="plantitas" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Plantita Name</th>
                    <th>Image</th>
                    <th>Seller</th>
                    <th>Price</th>
                    <th>Gcash Number</th>
                    <th>Enter Gcash Reference No.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{ $order->itemdesc }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/images/' . $order->img) }}" alt="Plantita Image" width="250"
                                height="250">
                        </td>
                        <td>
                            {{ $order->first_name . ' ' . $order->last_name }}
                        </td>
                        <td>
                            {{ $order->itemprice }}
                        </td>
                        <td>
                            {{ $order->gcash_no }}
                        </td>
                        <td>
                            <input type="text" name="gcash">
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

                <tr>
                    <th colspan="3">Total: </th>

                    <td>
                        @foreach ($sum as $total)
                            {{ $total->totalprice }}
                        @endforeach
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <input type="submit" class="btn btn-success btn-block" value="Order">
    </form>
</body>

</html>

<?php

}

?>
