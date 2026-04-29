<?php

namespace App\Http\Controllers\pilihmenu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PilihMenuController extends Controller
{
    public function index()
    {
        return view('pilihmenu.index');
    }
}
