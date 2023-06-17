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
            <center>
                {{ session('warning') }}

            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br><br>
    <center>
        <h1>
            My Orders
        </h1>
    </center>
    <br>
    <a href="/customerPage">Go back to Home Page</a>
    <br><br><br>

    <table id="plantitas" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Trans No</th>
                <th>Item No (Plantita)</th>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Cancel?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->orderno }}
                    </td>
                    <td>
                        {{ $user->transno }}
                    </td>
                    <td>
                        {{ $user->itemno }}
                    </td>
                    <td>
                        <img src="{{ asset('storage/images/' . $user->img) }}" alt="Plantita Image" width="250"
                            height="250">
                    </td>
                    <td>
                        {{ $user->itemdesc }}
                    </td>
                    <td>
                        {{ $user->price }}
                    </td>
                    <td>
                        {{ $user->status }}
                    </td>
                    <td>
                        {{ $user->remarks }}
                    </td>
                    <td>
                        <form action="{{ route('customerOrders.destroy', $user->transno) }}" method="post">
                            <a class="btn btn-danger" href="/delete/order/{{ $user->transno }}"
                                onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</a>
                        </form>
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
