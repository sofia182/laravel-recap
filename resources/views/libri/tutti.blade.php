@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>tutti i libri:</h1>
    @forelse ($all_books as $book)
      Titolo: {{ $book->title }}, di {{ $book->author }} (€ {{ $book->price }})<br>
    @empty
      <p>Non ci sono libri</p>
    @endforelse
  </div>
@endsection
