<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => Mutasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'data' => $validator->errors()
            ]);
        }

        $mutasi = Mutasi::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $mutasi
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutasi $mutasi)
    {
        return response()->json([
            'success' => true,
            'data' => $mutasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Mutasi $mutasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mutasi $mutasi)
    {
        $validate = Validator::make($request->all(), [
            'barang_id' => 'required|integer',
            'user_id' => 'required|integer',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|string',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'data' => $validate->errors()
            ]);
        }

        $mutasi->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'data' => $mutasi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mutasi $mutasi)
    {
        $mutasi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus',
            'data' => $mutasi
        ]);
    }

    public function historyByBarang($id)
    {
        $mutasi = Mutasi::where('barang_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $mutasi
        ]);
    }

    public function historyByUser($id)
    {
        $mutasi = Mutasi::where('user_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $mutasi
        ]);
    }
}
