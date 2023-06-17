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


    <title>Edit Order</title>
</head>

<body>
    <br><br>
    <center>
        <h1>
            Edit Order
        </h1>
    </center>

    @foreach ($plantitas as $plantita)
        <label>Customer Name</label>
        <input type="text" class="form-control" value="{{ $plantita->first_name . ' ' . $plantita->last_name }}"
            readonly>

        <label>Order No</label>
        <input type="text" class="form-control" value="{{ $plantita->orderno }}" readonly>

        <label>Trans No</label>
        <input type="text" class="form-control" value="{{ $plantita->transno }}" readonly>
        <label>Item No</label>
        <input type="text" class="form-control" value="{{ $plantita->itemno }}" readonly>
        <label>Image</label>
        <div class="d-flex justify-content-center">
            <img class="img-fluid" src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image"
                width="250" height="250">
        </div>
        <label>Description</label>
        <input type="text" class="form-control" value="{{ $plantita->itemdesc }}" readonly>
        <label>Price</label>
        <input type="text" class="form-control" value="{{ $plantita->price }}" readonly>

        <form action="{{ $plantita->transno }}" method="post">
            @csrf
            <label>Status</label>
            <select class="form-select" name="status">
                <option value="On Process" {{ $plantita->status == 'On Process' ? 'selected' : '' }}>On Process
                </option>
                <option value="Cancelled" {{ $plantita->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                <option value="Paid" {{ $plantita->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                <option value="TBD" {{ $plantita->status == 'TBD' ? 'selected' : '' }}>To Be Delivered</option>
            </select>
            <br>
            <div class="form-group">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea class="form-control" name="remarks" id="remarks" rows="2">{{ $plantita->remarks }}</textarea>
            </div>

            <br>

            <input type="submit" class="btn btn-success btn-block" value="Update">
        </form>



        <a href="javascript:void(0);" onclick="history.back();">Cancel</a>
    @endforeach
</body>

</html>
<?php
}
?>
