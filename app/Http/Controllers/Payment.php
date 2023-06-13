<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Payment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {



        //return view('customer.sellerPlantitaPage', ['plantitas' => $plantitas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function customerPaymentDirect(Request $request)
    {
        $itemnos = $request->input('itemno');
        $itemdescs = $request->input('itemdesc');
        $prices = $request->input('price');

        // Now you can access the selected items and their corresponding data
        foreach ($itemnos as $key => $itemno) {
            $itemdesc = $itemdescs[$key];
            $price = $prices[$key];

            //DB::insert('INSERT INTO temp_pay (itemno) VALUES (?)', [$itemno]);

            $plantitas = DB::select('SELECT plantita.itemno, plantita.itemdesc, plantita.itemprice, plantita.img, users.username, users.first_name, users.last_name FROM plantita INNER JOIN users ON plantita.regno=users.regno WHERE itemno = ?', [$itemno]);

            dd($plantitas);

            // echo "Item No: $itemno<br>";
            // echo "Item Description: $itemdesc<br>";
            // echo "Price: $price<br>";
            // echo "<br>";
        }

        $total = DB::select('SELECT SUM(plantita.itemprice) AS totalprice FROM temp_pay INNER JOIN plantita ON temp_pay.itemno =
        plantita.itemno');

        // return view('customer.customerPaymentPage', compact('plantitas', 'total'));.


    }
}
