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

    <title>Payment</title>
</head>

<body>
    <br><br>
    <center>
        <h1>My orders</h1>
        <form action="browse.php" method="post">
            <center>
                <input type="submit" value="Go back to marketplace" name="browse">
            </center>
        </form>
    </center>


    <table class="table table-striped">

        <thead>
            <tr>
                <th>Plantita Name</th>
                <th>Image</th>
                <th>Seller</th>
                <th>Price</th>
            </tr>
        </thead>
        @foreach ($plantitas as $plantita)
            <tr>
                <td>
                    {{ $plantita->itemdesc }}
                </td>
                <td>
                    <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image" width="250"
                        height="250">
                </td>
                <td>
                    {{ $plantita->first_name }} {{ $plantita->last_name }}
                </td>
                <td>
                    {{ $plantita->itemprice }}
                </td>
            </tr>
        @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total: </th>
                <td>
                    {{ $total[0]->totalprice }}
                </td>
            </tr>
        </tfoot>
    </table>
    <form action="payment.php" method="post">
        <input type="submit" value="Purchase" name="purchase">
    </form>
</body>

</html>
<?php

}

?>
