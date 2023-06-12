<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerPlantita extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regno = session('regno');
        $plantitas = DB::select('SELECT * FROM plantita WHERE regno = ?', [$regno]);


        return view('seller.sellerPlantitaPage', ['plantitas' => $plantitas]);
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
            'desc' => 'required|max:50',
            'price' => 'required|numeric',
            'img' => 'required|image',
        ]);


        $regno = session('regno');

        $path = $request->file('img')->store('images', 'public');

        $desc = $request->input('desc');
        $price = $request->input('price');

        DB::insert('INSERT INTO plantita (itemdesc, itemprice, regno, img) VALUES (?,?,?,?)', [$desc, $price, $regno, $path]);

        return redirect()->route('sellerMyPlantita.index');
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
        $plantitas = DB::select('SELECT * FROM plantita WHERE itemno = ?', [$id]);
        return view('seller.sellerPlantitaEditPage', ['plantitas' => $plantitas]);
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
}
