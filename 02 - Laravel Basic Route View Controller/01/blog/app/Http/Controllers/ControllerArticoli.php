<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ControllerArticoli extends Controller
{
    public function show()
    {
        return view('articoli.show');
    }
}
