<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Payment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // dd($request->input('debug'));
        // $services = $request->input('itemno');
        // foreach ($services as $service) {
        //     dd($service);
        // }
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

            // Process the data or save it to the database
            // ...

            // Example: Output the selected item's data
            echo "Item No: $itemno<br>";
            echo "Item Description: $itemdesc<br>";
            echo "Price: $price<br>";
            echo "<br>";
        }

        // Redirect or perform any other actions
    }
}
