<?php


namespace App\Http\Controllers;


class MioController extends Controller
{

    public function __contruct()
    {
        $this->user = "gabriele";
    }

    public function ciao_mondo()
    {
        return "ciao mondo";
    }

    public function ciao_mondo_con_parametro($parametro)
    {
        return "ciao ".$parametro;
    }
}