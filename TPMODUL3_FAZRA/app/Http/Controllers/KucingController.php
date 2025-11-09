<?php

namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Request;

class KucingController extends Controller
{
    public function index()
    {
        $kucing = Kucing::all();
        return view('DaftarKucing', compact('kucing'));
    }

    public function show($id)
    {
        $kucing = Kucing::findOrFail($id);
        return view('DetailKucing', compact('kucing'));
    }
}
