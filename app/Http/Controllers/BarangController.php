<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'code' => 422,
                    'message' => $validator->errors(),
                    'status' => 'error validation'
                ],
                'data' => null
            ], 422);
        }

        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('public/images/' . $namaGambar);

        $input = $request->all();
        $input['gambar'] = $namaGambar;

        $barang = Barang::create($input);

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'success',
                'status' => 'success'
            ],
            'data' => $barang
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showByCategory(Request $req)
    {
        $category = Category::findOrFail($req->query('category_id'));
        $barang = $category->barang;

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'success',
                'status' => 'success'
            ],
            'data' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'meta' => [
                    'code' => 422,
                    'message' => $validator->errors(),
                    'status' => 'error validation'
                ],
                'data' => null
            ], 422);
        }

        $barang = Barang::where('id', $id)->first();

        if ($barang) {
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
                $gambar->storeAs('public/images/' . $namaGambar);

                $input = $request->all();
                $input['gambar'] = $namaGambar;

                $barang = Barang::create($input);

                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'success',
                        'status' => 'success'
                    ],
                    'data' => $barang
                ]);
            }
        } else {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'message' => 'error',
                    'status' => 'error'
                ],
                'data' => null
            ], 400);
        }

        $input = $request->all();
        $barang->update($input);

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'success',
                'status' => 'success'
            ],
            'data' => $barang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang, $id)
    {
        $barang = Barang::where('id', $id)->first();
        Storage::delete('public/images/' . $barang->gambar);
        $barang->delete();

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'success',
                'status' => 'success'
            ],
            'data' => null
        ]);
    }
}
