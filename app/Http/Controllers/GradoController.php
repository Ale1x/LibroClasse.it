<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index($city)
    {
        $grades = ['Scuola Media', 'Scuola Superiore'];

        return view('adozioni.grado.selectGrado', ['city' => $city, 'grades' => $grades]);
    }
}
