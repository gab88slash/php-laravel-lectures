<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ControllerGareCsv extends Controller
{

    /**
     *
     * Ritorna l'elenco dei giorni con una gara
     * per giorno
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showList()
    {
        return view();
    }

    /**
     *
     * Inserisce una gara nel mio csv
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createGara()
    {
        return view();
    }

    /**
     * Mostra il form per creare una gara
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormGara()
    {
        return view();
    }

    /**
     * Mostra la lista delle gare per l'amministratore
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showListAdmin()
    {
        return view();
    }

}
