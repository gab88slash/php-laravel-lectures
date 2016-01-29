<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use League\Csv\Reader;

class ControllerProgetto extends Controller
{

    public function index()
    {
//        return view('progetto')->with('name','Gabriele Antonio Consiglio');

        $user = [
            'name' => 'Giacomo',
            'surname' => 'Consiglio',
            'job' => 'Capo'
        ];
        dd($user);
        $heroes = [];
//            [
//            'John Teller', 'Daredevil', 'Wolverine', 'Bob Aggiustatutto'
//        ];
        return view('progetto', compact('user', 'heroes', 'working'));
        /*
         * equivalente a
         * [
         *  'name' => $name
         * ]
         */
    }

    public function esercizioCsv()
    {
        $reader = Reader::createFromPath('file.csv');

        return json_encode($reader->fetchAll());
    }
}
