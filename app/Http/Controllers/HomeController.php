<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewQuoteRequest;

class HomeController extends Controller
{
  public function index() {
    return view('home');
  }

  public function saveMessage(Request $request) {
    $dati = $request->all();
    $nuovo_messaggio = new Message();
    $nuovo_messaggio->fill($dati);
    $nuovo_messaggio->save();

    Mail::to('admin@mycompany.com')->send(new NewQuoteRequest($nuovo_messaggio));

    return view('thankyou');
  }
}
