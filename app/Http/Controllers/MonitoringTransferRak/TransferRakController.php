<?php

namespace App\Http\Controllers\MonitoringTransferRak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\MonitoringTransferRak\TransferRak;
use App\Models\MonitoringTransferRak\TransferRakDetail;
use App\Models\MonitoringTransferRak\Driver;
use App\Models\MonitoringTransferRak\Vehicle;

class TransferRakController extends Controller
{
    /**
     * Halaman utama input transfer rak
     */
    public function index()
    {
        $karyawan = Employee::orderBy('name')->get();
        return view('MonitoringTransferRak.monitoring', compact('karyawan'));
    }

    /**
     * API: Cari/list supir (untuk autocomplete)
     */
    public function getDrivers(Request $request)
    {
        $search = $request->get('q', '');
        $drivers = Driver::when($search, function ($query) use ($search) {
                $query->where('nama_karyawan', 'like', "%{$search}%");
            })
            ->orderBy('nama_karyawan')
            ->limit(20)
            ->get(['id', 'nama_karyawan']);

        return response()->json($drivers);
    }

    /**
     * Mulai transfer baru: simpan header, return transfer_rak_id
     */
    public function start(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_karyawan'  => 'required|integer|exists:employees,id',
                'nama_supir'   => 'required|string|max:255',
                'nama_kendaraan' => 'required|string|max:255',
            ]);

            // Find-or-create supir by nama
            $driver = Driver::firstOrCreate(
                ['nama_karyawan' => trim($validated['nama_supir'])]
            );

            // Find-or-create kendaraan by nama
            $vehicle = Vehicle::firstOrCreate(
                ['nama_kendaraan' => trim($validated['nama_kendaraan'])]
            );

            // Buat record transfer baru
            $transfer = TransferRak::create([
                'user_id'     => Auth::id(),
                'id_karyawan' => $validated['id_karyawan'],
                'id_supir'    => $driver->id,
                'id_mobil'    => $vehicle->id,
                'waktu_mulai' => now(),
                'status'      => 'proses',
            ]);

            return response()->json([
                'success'      => true,
                'transfer_id'  => $transfer->id,
                'supir_id'     => $driver->id,
                'vehicle_id'   => $vehicle->id,
                'message'      => 'Transfer dimulai',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Scan satu rak
     */
    public function scan(Request $request)
    {
        try {
            $validated = $request->validate([
                'transfer_rak_id' => 'required|integer|exists:transfer_raks,id',
                'kode_rak'        => 'required|string|max:100',
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

            if (!$transfer || $transfer->status !== 'proses') {
                return response()->json([
                    'success' => false,
                    'error'   => 'Transfer tidak aktif atau tidak ditemukan',
                ], 404);
            }

            // Cek duplikat
            $exists = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])
                ->where('kode_rak', $validated['kode_rak'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'error'   => '❌ Rak sudah discan sebelumnya!',
                    'duplicate' => true,
                ], 400);
            }

            $detail = TransferRakDetail::create([
                'transfer_rak_id' => $validated['transfer_rak_id'],
                'kode_rak'        => $validated['kode_rak'],
                'waktu_scan'      => now(),
            ]);

            // Update total_rak realtime
            $total = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])->count();
            $transfer->update(['total_rak' => $total]);

            return response()->json([
                'success'   => true,
                'kode_rak'  => $detail->kode_rak,
                'waktu_scan'=> $detail->waktu_scan->format('H:i:s'),
                'total'     => $total,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Selesaikan transfer
     */
    public function finish(Request $request)
    {
        try {
            $validated = $request->validate([
                'transfer_rak_id' => 'required|integer|exists:transfer_raks,id',
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

            if (!$transfer) {
                return response()->json([
                    'success' => false,
                    'error'   => 'Transfer tidak ditemukan',
                ], 404);
            }

            $totalScanned = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])->count();

            $transfer->update([
                'waktu_selesai' => now(),
                'total_rak'     => $totalScanned,
                'status'        => 'selesai',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transfer selesai',
                'total'   => $totalScanned,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Batalkan transfer
     */
    public function cancel(Request $request)
    {
        try {
            $validated = $request->validate([
                'transfer_rak_id' => 'required|integer|exists:transfer_raks,id',
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

            if ($transfer) {
                $transfer->update(['status' => 'batal']);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
