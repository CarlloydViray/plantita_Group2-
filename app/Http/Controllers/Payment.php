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
        $request->validate([
            'gcash' => 'required|',
        ]);

        $regno = session('regno');
        $price = $request->input('gcash');
        $date = date('Y-m-d H:i:s');


        DB::insert('INSERT INTO order (order_date, regno) VALUES (?,?)', [$date, $regno]);

        $lastInsertedId = DB::getPdo()->lastInsertId();

        $items = DB::select('SELECT * FROM temp_pay');

        foreach ($items as $item) {

            $price = DB::select('SELECT plantita.itemprice FROM plantita INNER JOIN temp_pay ON plantita.itemno = temp_pay.itemno WHERE plantita.itemno =?', [$item]);
            DB::insert('INSERT INTO order_plantita(itemno, orderno, `status`, price) VALUES (?,?,?, ?)', [$item, $lastInsertedId, 'On Process', $price]);
        }

        DB::delete('DELETE FROM temp_pay');

        return redirect()->route('customerMarketplace.index')->with('success', 'Please select at least one item.');
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

    public function customerPaymentRoute(Request $request)
    {
        $items = $request->input('itemno');

        if (!empty($items)) {
            $orders = DB::table('plantita')
                ->join('users', 'plantita.regno', '=', 'users.regno')
                ->whereIn('itemno', $items)
                ->select('plantita.itemno', 'plantita.itemdesc', 'plantita.itemprice', 'plantita.img', 'users.username', 'users.first_name', 'users.last_name', 'users.gcash_no')
                ->get();


            foreach ($items as $item) {
                DB::insert('INSERT INTO temp_pay (itemno) VALUES (?)', [$item]);
            }

            $sum = DB::select('SELECT SUM(plantita.itemprice) AS totalprice FROM temp_pay INNER JOIN plantita ON temp_pay.itemno = plantita.itemno');



            return view('customer.customerPaymentPreviewPage', ['orders' => $orders, 'sum' => $sum]);
        } else {
            return redirect()->route('customerMarketplace.index')->with('error', 'Please select at least one item.');
        }
    }
}
