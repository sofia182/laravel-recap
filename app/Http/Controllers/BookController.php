<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        return 'funzione index';
    }


    public function create()
    {
        return 'funzione create';
    }

    
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return 'funzione show';
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        return 'funzione update';
    }


    public function destroy($id)
    {
        return 'funzione destroy';
    }
}
