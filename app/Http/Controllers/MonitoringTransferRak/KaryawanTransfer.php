<?php

namespace App\Http\Controllers\MonitoringTransferRak;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class KaryawanTransfer extends Controller
{
    public function index()
    {
        $data = Employee::orderBy('name')->get();
        return view('MonitoringTransferRak.karyawan', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Employee::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $k = Employee::findOrFail($id);
        $k->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($id)
    {
        $k = Employee::findOrFail($id);
        $k->delete();

        return back();
    }
}
