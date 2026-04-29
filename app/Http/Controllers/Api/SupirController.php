<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;

class SupirController extends Controller
{
    public function index()
    {
        try {
            $supir = Driver::where('status', 'aktif')
                ->select('id', 'nama', 'nip', 'no_sim')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $supir
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
