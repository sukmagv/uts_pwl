<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $in = Inventory::all();
        return view('inventory.inventory')
                ->with('in', $in);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create_inventory')
            ->with('url_form', url('/inventory/') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'satuan' => 'required|string'
        ]);

        $data = Inventory::create($request->except(['_token']));
        return redirect('inventory')
            ->with('success', 'Data Inventory Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
       return view('inventory.create_inventory')
        ->with('in', $inventory)
        ->with('url_form', url('/inventory/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'satuan' => 'required|string'
        ]);

        $data = Inventory::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('inventory')
            ->with('success', 'Data Inventory Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::where('id', '=', $id)->delete();
        return redirect('inventory')
        ->with('success', 'Data Inventory Berhasil Ditambahkan');
    }
}
