<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'message' => 'Success',
            'barang1' => Barang::where('id', '<', 5)->get(),
            'barang2' => Barang::where('id', '>=', 5)->get(),
        ]);
    }
    public function allData() {
        $data = Barang::with('category')->get()->map(function ($item) {
            $item->category_name = $item->category->name;
            unset($item->category_id, $item->category); // Menghapus category_id dan category
            return $item;
        });

        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
    }
}
