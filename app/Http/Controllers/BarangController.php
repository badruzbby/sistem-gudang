<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class BarangController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', ['except' => ['index', 'show']]),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barang = Barang::all();
        return response()->json($barang, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $barang = Barang::create($request->all());
        return response()->json(['message' => 'Barang berhasil ditambahkan', 'data' => $barang], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $barang = $request->user()->barang()->create($request->all());
        return response()->json(['message' => 'Barang berhasil ditambahkan', 'data' => $barang], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return response()->json(['data' => $barang], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $fields = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
        ]);
        $barang = Barang::find($request->id);
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
        $barang->update($request->all());
        return response()->json(['message' => 'Barang berhasil diupdate', 'data' => $barang], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        Gate::authorize('modify', $barang);
        $fields = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
        ]);
        $barang = Barang::find($request->id);
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
        $barang->update($request->all());
        return response()->json(['message' => 'Barang berhasil diupdate', 'data' => $barang], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Barang $barang)
    {
        Gate::authorize('modify', $barang);
        $barang = Barang::find($request->id);
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
        $barang->delete();
        return response()->json(['message' => 'Barang berhasil dihapus'], 200);
    }
}
