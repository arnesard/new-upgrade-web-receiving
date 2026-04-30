<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonitoringTransferRak\TransferRakController;
use App\Http\Controllers\MonitoringTransferRak\KaryawanTransfer;
use App\Http\Controllers\pilihmenu\PilihMenuController;
use App\Http\Controllers\PenerimaanController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return redirect('/dashboard');
    });

    // ================= PRODUCTION =================
    Route::get('/api/trend-data', [ProductionController::class, 'trendData'])->name('api.trend-data');
    Route::get('/api/trend-7days', [ProductionController::class, 'trendData7Days'])->name('api.trend-7days');
    Route::get('/api/plant-group', [ProductionController::class, 'plantGroupData'])->name('api.plant-group');

    Route::get('/input/{plant?}', [ProductionController::class, 'inputForm'])->name('input.form');
    Route::post('/input/{plant}', [ProductionController::class, 'storeInput'])->name('input.store');
    Route::get('/production/{plant}/edit/{id}', [ProductionController::class, 'editInput'])->name('input.edit');
    Route::put('/production/{plant}/update/{id}', [ProductionController::class, 'updateInput'])->name('input.update');
    Route::delete('/production/{plant}/delete/{id}', [ProductionController::class, 'deleteInput'])->name('input.delete');

    // ================= OVERTIME =================
    Route::get('/overtime', [OvertimeController::class, 'index'])->name('overtime.index');
    Route::get('/overtime/create', [OvertimeController::class, 'create'])->name('overtime.create');
    Route::post('/overtime', [OvertimeController::class, 'store'])->name('overtime.store');
    Route::put('/overtime/{overtime}', [OvertimeController::class, 'update'])->name('overtime.update');
    Route::delete('/overtime/{overtime}', [OvertimeController::class, 'destroy'])->name('overtime.delete');

    // ================= ADMIN ONLY =================
    Route::middleware(['admin.only'])->group(function () {

        // Employees
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
        Route::patch('/employees/{employee}/toggle-status', [EmployeeController::class, 'toggleStatus'])->name('employees.toggle-status');

        // Reports
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/export/excel', [ReportController::class, 'exportExcel'])->name('reports.export.excel');

        // Export
        Route::get('/filter/shift/{shift}', [ProductionController::class, 'filterByShift'])->name('filter.shift');
        Route::get('/export/pdf', [ProductionController::class, 'exportPDF'])->name('export.pdf');
        Route::get('/export/excel', [ProductionController::class, 'exportExcel'])->name('export.excel');
        Route::get('/export/harian', [ProductionController::class, 'exportPDF'])->name('export.harian');

        // Users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // ================= TRANSFER RAK =================
    Route::get('/transfer-rak', [TransferRakController::class, 'index'])->name('transfer.index');
    Route::get('/transfer-rak/drivers', [TransferRakController::class, 'getDrivers'])->name('transfer.drivers');

    Route::post('/transfer-rak/start', [TransferRakController::class, 'start'])->name('transfer.start');
    Route::post('/transfer-rak/scan', [TransferRakController::class, 'scan'])->name('transfer.scan');
    Route::post('/transfer-rak/finish', [TransferRakController::class, 'finish'])->name('transfer.finish');
    Route::post('/transfer-rak/cancel', [TransferRakController::class, 'cancel'])->name('transfer.cancel');

    // Dashboard Transfer
    Route::get('/transfer-rak/dashboard', [TransferRakController::class, 'dashboard'])->name('transfer.dashboard');
    Route::get('/transfer-rak/dashboard/data', [TransferRakController::class, 'dashboardData'])->name('transfer.dashboard.data');

    // Karyawan Transfer
    Route::prefix('transfer-rak/karyawan')->group(function () {
        Route::get('/', [KaryawanTransfer::class, 'index'])->name('karyawan.index');
        Route::post('/store', [KaryawanTransfer::class, 'store'])->name('karyawan.store');
        Route::post('/update/{id}', [KaryawanTransfer::class, 'update'])->name('karyawan.update');
        Route::delete('/delete/{id}', [KaryawanTransfer::class, 'destroy'])->name('karyawan.delete');
    });

    // ================= MENU =================
    Route::get('/dashboard', [PilihMenuController::class, 'index'])->name('dashboard');
    Route::get('/menu', [PilihMenuController::class, 'index'])->name('pilihmenu.index');
    Route::post('/pilih-menu/set-session', [PilihMenuController::class, 'pilih'])->name('pilihmenu.set');

    // ================= PENERIMAAN =================
    Route::get('/penerimaan-produksi', [ProductionController::class, 'inputForm'])->name('penerimaan.index');
});
