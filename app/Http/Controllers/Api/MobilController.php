<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class MobilController extends Controller
{
    public function index()
    {
        try {
            $mobil = Vehicle::where('status', 'aktif')
                ->select('id', 'nama_mobil', 'nomor_polisi', 'kapasitas')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $mobil
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getByBarcode($barcode)
    {
        try {
            $mobil = Vehicle::where('status', 'aktif')
                ->where(function ($query) use ($barcode) {
                    $query->where('nomor_polisi', 'LIKE', '%' . $barcode . '%')
                        ->orWhere('barcode_mobil', $barcode);
                })
                ->select('id', 'nama_mobil', 'nomor_polisi', 'kapasitas')
                ->first();

            if (!$mobil) {
                return response()->json([
                    'success' => false,
                    'error' => '❌ Mobil tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $mobil
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
