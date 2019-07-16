@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="pull-left">Tutti i libri</h1>
    <a class="btn btn-primary pull-right" href="{{ route('libri.create') }}">
      Inserisci un libro
    </a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Prezzo</th>
          <th>Categoria</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($libri as $libro)
          <tr>
            <td>{{ $libro->id }}</td>
            <td>{{ $libro->title}}</td>
            <td>{{ $libro->author}}</td>
            <td>{{ $libro->price}}</td>
            <td>{{ !empty($libro->category) ? $libro->category->name : '-' }}</td>
            <td>
              <a href="{{ route('libri.show', $libro->id) }}" class="btn btn-secondary">Vedi</a>
              <a href="{{ route('libri.edit', $libro->id) }}" class="btn btn-warning">Modifica</a>
              <form action="{{ route('libri.destroy', $libro->id) }}" method="post" class="inline-form">
                @method('DELETE')
                @csrf
                <input type="submit" value="Cancella" class="btn btn-danger">
              </form>
            </td>
          </tr>
        @empty
          <p>Non ci sono libri presenti</p>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
