<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    // calcoli
    // logica
    // controlli
    // recupero dei deti
    // salvataggio dei dati
    $data = [
      'nome' => 'Sofia',
      'cognome' => 'Perlari',
      'studenti' => ['Giuseppe', 'Giovanni', 'Lucia', 'Pietro']
    ];
    return view('home', $data);
  }
}
