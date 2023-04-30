<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    public function create()
    {
        return view('category.crop.create');
    }
    public function store(Request $request)
    {
        Crop::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'duration'=>$request->duration,
            'acrerange'=>$request->acrerange,
            'note'=>$request->note,
        ]);
        return view('category.crop.create');
    }
}