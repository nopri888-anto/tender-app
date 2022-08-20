<?php

namespace App\Http\Controllers\penyedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenyediaController extends Controller
{
    public function index()
    {
        return view('penyedia.index');
    }
}
