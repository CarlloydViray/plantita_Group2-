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
        $orders = session('orders');
        $sum = session('sum');

        return view('customer.customerPaymentPreviewPage', ['orders' => $orders, 'sum' => $sum]);
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
            'gcash' => 'required',
            'amount' => 'required|numeric',
        ]);

        $regno = session('regno');
        $gcash = $request->input('gcash');
        $amount = $request->input('amount');
        $date = date('Y-m-d H:i:s');

        DB::insert('INSERT INTO `order` (order_date, regno) VALUES (?, ?)', [$date, $regno]);


        $lastInsertedId = DB::getPdo()->lastInsertId();

        $items = DB::select('SELECT * FROM temp_pay');

        foreach ($items as $item) {
            $itemno = $item->itemno;

            $priceResult = DB::select('SELECT plantita.itemprice FROM plantita INNER JOIN temp_pay ON plantita.itemno = temp_pay.itemno WHERE plantita.itemno = ?', [$itemno]);

            $price = $priceResult[0]->itemprice;
            $status = 'On Process';
            $remarks = null;

            DB::insert('INSERT INTO order_plantita (itemno, orderno, `status`, price, remarks) VALUES (?, ?, ?, ?, ?)', [$itemno, $lastInsertedId, $status, $price, $remarks]);

            DB::insert('INSERT INTO payment (orderno, amount, gcashrefno) VALUES (?, ?, ?)', [$lastInsertedId, $amount, $gcash]);
        }



        DB::delete('DELETE FROM temp_pay');
        session()->pull('orders');
        session()->pull('sum');

        return redirect()->route('customerMarketplace.index')->with('success', 'Order Successful');
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
    }
}
