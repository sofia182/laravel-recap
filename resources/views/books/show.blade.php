@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Visualizzazione libro: {{ $libro->id }}</h1>
    <ul>
      <li>Titolo: {{ $libro->title }}</li>
      <li>Autore: {{ $libro->author }}</li>
      <li>Prezzo: {{ $libro->price }}</li>
      <li>Categoria: {{ !empty($libro->category) ? $libro->category->name : '-' }}</li>
    </ul>

    <a href="{{ route('libri.index') }}" class="btn btn-primary">
      Torna alla lista dei libri
    </a>
  </div>
@endsection
