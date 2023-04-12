<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sp = Supplier::all();
        // return view('supplier.supplier')
        //         ->with('sp', $sp);

        if(\Illuminate\Support\Facades\Request::get('query') !== null){
            $query = \Illuminate\Support\Facades\Request::get('query');
            $sp = Supplier::where('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('alamat', 'LIKE', '%'.$query.'%')
                ->orWhere('no_tlp', 'LIKE', '%'.$query.'%')
                ->paginate(3);
        } else {
            $sp = Supplier::paginate(3);
        }
        return view('supplier.supplier', ['sp' => $sp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create_supplier')
                ->with('url_form', url('/supplier'));
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
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|digits_between:6,15'
        ]);

        $data = Supplier::create($request->except(['_token']));
        //jika berhasil ditambah, akan kembali ke hal.awal
        return redirect('supplier')
                ->with('success', 'Supplier Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.create_supplier')
                ->with('sp', $supplier)
                ->with('url_form', url('/supplier/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_tlp' => 'required|digits_between:6,15'
        ]);
        $data = Supplier::where('id', '=', $id)->update($request->except(['_token', '_method']));
        //jika berhasil ditambah, akan kembali ke hal.awal
        return redirect('supplier')
                ->with('success', 'Supplier Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::where('id', '=', $id)->delete();
        //jika berhasil ditambah, akan kembali ke hal.awal
        return redirect('supplier')
                ->with('success', 'Supplier Berhasil Dihapus');
    }
}
