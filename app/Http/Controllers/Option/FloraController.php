<?php

namespace App\Http\Controllers\Option;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FloraController extends Controller
{
    public function index()
    {
        return view('options.flora.index');
    }
}