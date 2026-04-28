<?php

namespace App\Http\Controllers\MonitoringTransferRak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransferRak;
use App\Models\TransferRakDetail;
use App\Models\Karyawan;
use App\Models\Supir;
use App\Models\Mobil;

class TransferRakController extends Controller
{
    public function monitoring()
    {
        return view('MonitoringTransferRak.monitoring');
    }

    public function start(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_karyawan' => 'required|integer',
                'id_supir' => 'required|integer',
                'id_mobil' => 'required|integer'
            ]);

            $transfer = TransferRak::create([
                'user_id' => Auth::id(),
                'id_karyawan' => $validated['id_karyawan'],
                'id_supir' => $validated['id_supir'],
                'id_mobil' => $validated['id_mobil'],
                'waktu_mulai' => now(),
                'status' => 'proses'
            ]);

            return response()->json([
                'success' => true,
                'transfer_id' => $transfer->id,
                'message' => 'Transfer dimulai'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function scan(Request $request)
    {
        try {
            $validated = $request->validate([
                'transfer_rak_id' => 'required|integer',
                'kode_rak' => 'required|string'
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

            if (!$transfer) {
                return response()->json([
                    'success' => false,
                    'error' => 'Transfer tidak ditemukan'
                ], 404);
            }

            $exists = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])
                ->where('kode_rak', $validated['kode_rak'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'error' => '❌ Rak sudah discan sebelumnya!'
                ], 400);
            }

            $detail = TransferRakDetail::create([
                'transfer_rak_id' => $validated['transfer_rak_id'],
                'kode_rak' => $validated['kode_rak'],
                'waktu_scan' => now()
            ]);

            return response()->json([
                'success' => true,
                'data' => $detail
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function finish(Request $request)
    {
        try {
            $validated = $request->validate([
                'transfer_rak_id' => 'required|integer'
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

            if (!$transfer) {
                return response()->json([
                    'success' => false,
                    'error' => 'Transfer tidak ditemukan'
                ], 404);
            }

            $totalScanned = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])->count();

            $transfer->update([
                'waktu_selesai' => now(),
                'total_rak' => $totalScanned,
                'status' => 'selesai'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transfer selesai',
                'total' => $totalScanned
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $karyawan = Karyawan::first();
        $supir = Supir::first();
        $mobil = Mobil::first();

        return view('MonitoringTransferRak.monitoring', compact(
            'karyawan',
            'supir',
            'mobil'
        ));
    }
}
