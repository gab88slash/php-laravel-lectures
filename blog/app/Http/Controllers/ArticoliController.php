<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticoliController extends Controller
{

    public function create()
    {


        return view('articoli.new-form');
    }

    /**
     * Salva un nuovo articolo nel database
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        return redirect('/', 302,[] ,false);
    }

}
