<?php

namespace App\Http\Controllers\Option;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function chooseOption(Request $request)
    {
        if($request->option === 'crop'){
            return redirect('/admin/category/crop/create');
        }else if($request->option === 'animal'){
            return redirect('/admin/category/animal/create');
        }
    }
}