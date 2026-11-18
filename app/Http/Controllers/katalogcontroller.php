<?php

namespace App\Http\Controllers;

use App\Models\no;
use Illuminate\Http\Request;

class katalogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(no $no)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(no $no)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, no $no)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(no $no)
    {
        //
    }
}

$produk = [
  ['id' => 1, 'nama' => 'Kopi Ende',
   'kategori' => 'Minuman',
   'harga' => 15000, 'stok' => 12],
  ['id' => 2, 'nama' => 'Roti Cokelat',
   'kategori' => 'Makanan',
   'harga' => 8000, 'stok' => 0],
];
