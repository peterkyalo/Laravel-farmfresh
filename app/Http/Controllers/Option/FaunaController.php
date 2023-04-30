<?php

namespace App\Http\Controllers\Option;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaunaController extends Controller
{
    public function index()
    {
        return view('options.fauna.index');
    }
}