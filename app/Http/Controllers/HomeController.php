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
}
