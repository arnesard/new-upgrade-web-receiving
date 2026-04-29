<?php

namespace App\Http\Controllers\MonitoringTransferRak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
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

=======
use Illuminate\Support\Facades\DB;
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
>>>>>>> b99a10f (29-04-2026)
    public function start(Request $request)
    {
        try {
            $validated = $request->validate([
<<<<<<< HEAD
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
=======
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
>>>>>>> b99a10f (29-04-2026)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
<<<<<<< HEAD
                'error' => $e->getMessage()
=======
                'error'   => $e->getMessage(),
>>>>>>> b99a10f (29-04-2026)
            ], 500);
        }
    }

<<<<<<< HEAD
=======
    /**
     * Scan satu rak
     */
>>>>>>> b99a10f (29-04-2026)
    public function scan(Request $request)
    {
        try {
            $validated = $request->validate([
<<<<<<< HEAD
                'transfer_rak_id' => 'required|integer',
                'kode_rak' => 'required|string'
=======
                'transfer_rak_id' => 'required|integer|exists:transfer_raks,id',
                'kode_rak'        => 'required|string|max:100',
>>>>>>> b99a10f (29-04-2026)
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

<<<<<<< HEAD
            if (!$transfer) {
                return response()->json([
                    'success' => false,
                    'error' => 'Transfer tidak ditemukan'
                ], 404);
            }

=======
            if (!$transfer || $transfer->status !== 'proses') {
                return response()->json([
                    'success' => false,
                    'error'   => 'Transfer tidak aktif atau tidak ditemukan',
                ], 404);
            }

            // Cek duplikat
>>>>>>> b99a10f (29-04-2026)
            $exists = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])
                ->where('kode_rak', $validated['kode_rak'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
<<<<<<< HEAD
                    'error' => '❌ Rak sudah discan sebelumnya!'
=======
                    'error'   => '❌ Rak sudah discan sebelumnya!',
                    'duplicate' => true,
>>>>>>> b99a10f (29-04-2026)
                ], 400);
            }

            $detail = TransferRakDetail::create([
                'transfer_rak_id' => $validated['transfer_rak_id'],
<<<<<<< HEAD
                'kode_rak' => $validated['kode_rak'],
                'waktu_scan' => now()
            ]);

            return response()->json([
                'success' => true,
                'data' => $detail
=======
                'kode_rak'        => $validated['kode_rak'],
                'waktu_scan'      => now(),
            ]);

            // Update total_rak realtime
            $total = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])->count();
            $transfer->update(['total_rak' => $total]);

            return response()->json([
                'success'   => true,
                'kode_rak'  => $detail->kode_rak,
                'waktu_scan' => $detail->waktu_scan->format('H:i:s'),
                'total'     => $total,
>>>>>>> b99a10f (29-04-2026)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
<<<<<<< HEAD
                'error' => $e->getMessage()
=======
                'error'   => $e->getMessage(),
>>>>>>> b99a10f (29-04-2026)
            ], 500);
        }
    }

<<<<<<< HEAD
=======
    /**
     * Selesaikan transfer
     */
>>>>>>> b99a10f (29-04-2026)
    public function finish(Request $request)
    {
        try {
            $validated = $request->validate([
<<<<<<< HEAD
                'transfer_rak_id' => 'required|integer'
=======
                'transfer_rak_id' => 'required|integer|exists:transfer_raks,id',
>>>>>>> b99a10f (29-04-2026)
            ]);

            $transfer = TransferRak::find($validated['transfer_rak_id']);

            if (!$transfer) {
                return response()->json([
                    'success' => false,
<<<<<<< HEAD
                    'error' => 'Transfer tidak ditemukan'
=======
                    'error'   => 'Transfer tidak ditemukan',
>>>>>>> b99a10f (29-04-2026)
                ], 404);
            }

            $totalScanned = TransferRakDetail::where('transfer_rak_id', $validated['transfer_rak_id'])->count();

            $transfer->update([
                'waktu_selesai' => now(),
<<<<<<< HEAD
                'total_rak' => $totalScanned,
                'status' => 'selesai'
=======
                'total_rak'     => $totalScanned,
                'status'        => 'selesai',
>>>>>>> b99a10f (29-04-2026)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transfer selesai',
<<<<<<< HEAD
                'total' => $totalScanned
=======
                'total'   => $totalScanned,
>>>>>>> b99a10f (29-04-2026)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
<<<<<<< HEAD
                'error' => $e->getMessage()
=======
                'error'   => $e->getMessage(),
>>>>>>> b99a10f (29-04-2026)
            ], 500);
        }
    }

<<<<<<< HEAD
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
=======
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

    /**
     * Halaman dashboard
     */
    public function dashboard()
    {
        return view('MonitoringTransferRak.dashboard');
    }

    /**
     * API data untuk dashboard (KPI, trend, top operator, activity)
     */
    public function dashboardData(Request $request)
    {
        $range = $request->get('range', 'today');

        [$startDate, $endDate] = match ($range) {
            'week'  => [now()->startOfWeek(), now()->endOfDay()],
            'month' => [now()->startOfMonth(), now()->endOfDay()],
            default => [now()->startOfDay(), now()->endOfDay()],
        };

        // ── KPI ──
        $selesai = TransferRak::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'selesai');

        $totalRak        = (clone $selesai)->sum('total_rak');
        $transferSelesai = (clone $selesai)->count();
        $transferBatal   = TransferRak::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'batal')->count();
        $totalDone       = $transferSelesai + $transferBatal;
        $completionRate  = $totalDone > 0 ? round(($transferSelesai / $totalDone) * 100) : 0;
        $sedangProses    = TransferRak::where('status', 'proses')->count();

        // Rata-rata durasi (menit)
        $avgDurasi = TransferRak::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'selesai')
            ->whereNotNull('waktu_selesai')
            ->get()
            ->avg(fn($t) => $t->waktu_mulai && $t->waktu_selesai
                ? $t->waktu_mulai->diffInMinutes($t->waktu_selesai)
                : null);

        // ── TREND 7 HARI TERAKHIR ──
        $trendRaw = TransferRak::selectRaw('DATE(created_at) as tgl, SUM(total_rak) as total')
            ->where('status', 'selesai')
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('tgl')
            ->orderBy('tgl')
            ->pluck('total', 'tgl');

        $trend = collect(range(6, 0))->map(function ($i) use ($trendRaw) {
            $date = now()->subDays($i)->format('Y-m-d');
            return [
                'date'  => now()->subDays($i)->format('d/m'),
                'total' => (int) ($trendRaw[$date] ?? 0),
            ];
        });

        // ── TOP 5 OPERATOR ──
        $topOperators = TransferRak::select(
            'id_karyawan',
            DB::raw('SUM(total_rak) as total_rak'),
            DB::raw('COUNT(*) as jumlah')
        )
            ->with('karyawan:id,name')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'selesai')
            ->groupBy('id_karyawan')
            ->orderByDesc('total_rak')
            ->limit(5)
            ->get()
            ->map(fn($t) => [
                'nama'  => $t->karyawan?->name ?? 'Unknown',
                'total' => (int) $t->total_rak,
                'count' => (int) $t->jumlah,
            ]);

        // ── ACTIVITY FEED (10 terbaru) ──
        $activity = TransferRak::with([
            'karyawan:id,name',
            'supir:id,nama_karyawan',
            'mobil:id,nama_kendaraan',
        ])
            ->orderByDesc('created_at')
            ->limit(10)
            ->get()
            ->map(fn($t) => [
                'operator'  => $t->karyawan?->name ?? '-',
                'supir'     => $t->supir?->nama_karyawan ?? '-',
                'mobil'     => $t->mobil?->nama_kendaraan ?? '-',
                'total_rak' => $t->total_rak,
                'status'    => $t->status,
                'durasi'    => ($t->waktu_mulai && $t->waktu_selesai)
                    ? $t->waktu_mulai->diffInMinutes($t->waktu_selesai) . ' mnt'
                    : '-',
                'waktu'     => $t->created_at->format('d/m H:i'),
            ]);

        return response()->json([
            'kpi' => [
                'total_rak'        => (int) $totalRak,
                'transfer_selesai' => $transferSelesai,
                'completion_rate'  => $completionRate,
                'avg_durasi'       => $avgDurasi ? round($avgDurasi) . ' mnt' : '-',
                'sedang_proses'    => $sedangProses,
            ],
            'trend'         => $trend,
            'top_operators' => $topOperators,
            'activity'      => $activity,
        ]);
>>>>>>> b99a10f (29-04-2026)
    }
}
