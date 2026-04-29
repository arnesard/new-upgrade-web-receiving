<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class KaryawanController extends Controller
{
    public function index()
    {
        try {
            $karyawan = Employee::where('status', 'aktif')
                ->select('id', 'nama', 'nip', 'divisi')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $karyawan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
