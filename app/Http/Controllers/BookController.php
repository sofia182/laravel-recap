<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{

    public function index()
    {
        $libri = Book::all();
        //return view('books.index')->with(['libri' => $libri]);
        //return view('books.index', compact('libri'));
        $data = [
          'libri' => $libri,
        ];
        return view('books.index', $data);
    }


    public function create()
    {
        $categorie = Category::all();
        $data = [
          'categorie' => $categorie
        ];
        return view('books.create', $data);
    }


    public function store(Request $request)
    {
        $rules = [
          'title' => 'required|unique:books',
          'author' => 'required',
          'price' => 'required|numeric|between:0,9999.99'
        ];
        $messages = [
          'title.required' => 'Inserisci il titolo',
          'title.unique' => 'Hai già inserito un libro con questo titolo',
          'author.required' => 'Inserisci l\'autore',
          'price.required' => 'Inserisci il prezzo',
          'price.numeric' => 'Il prezzo deve essere un numero',
          'price.between' => 'Il prezzo deve essere compreso tra 0 e 9999.99'
        ];
        $validatedData = $request->validate($rules, $messages);
        $dati = $request->all();
        $nuovo_libro = new Book;
        $nuovo_libro->fill($dati);
        $nuovo_libro->save();

        return redirect()->route('libri.index');
    }


    public function show($id)
    {
        $libro_da_visualizzare = Book::find($id);
        if(!empty($libro_da_visualizzare)) {
          return view('books.show')->with([
            'libro' => $libro_da_visualizzare
          ]);
        } else {
          abort(404);
        }
    }


    public function edit($id)
    {
        $libro_da_modificare = Book::find($id);
        /*
        if(!empty($libro_da_modificare)) {
          return view('books.edit')->with([
            'libro' => $libro_da_modificare
          ]);
        } else {
          abort(404);
        }
        */

        if(empty($libro_da_modificare)) {
          abort(404);
        }
        $categorie = Category::all();
        return view('books.edit')->with([
          'libro' => $libro_da_modificare,
          'categorie' => $categorie
        ]);
    }


    public function update(Request $request, $id)
    {
      $rules = [
        'title' => 'required',
        'author' => 'required',
        'price' => 'required|numeric|between:0,9999.99'
      ];
      $messages = [
        'title.required' => 'Inserisci il titolo',
        'author.required' => 'Inserisci l\'autore',
        'price.required' => 'Inserisci il prezzo',
        'price.numeric' => 'Il prezzo deve essere un numero',
        'price.between' => 'Il prezzo deve essere compreso tra 0 e 9999.99'
      ];
      $validatedData = $request->validate($rules, $messages);

      $dati = $request->all();
      $libro_da_modificare = Book::find($id);
      if(!empty($libro_da_modificare)) {
        $libro_da_modificare->fill($dati);
        $libro_da_modificare->save();
      }

      return redirect()->route('libri.index');
    }


    public function destroy($id)
    {
        $libro_da_cancellare = Book::find($id);
        if(!empty($libro_da_cancellare)) {
          $libro_da_cancellare->delete();
        }
        return redirect()->route('libri.index');
    }
}
