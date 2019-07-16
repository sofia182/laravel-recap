@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Modifica libro: {{ $libro->id }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libri.update', $libro->id) }}" method="post">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" name="title" value="{{ old('title', $libro->title) }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="author">Autore</label>
        <input type="text" name="author" value="{{ old('author', $libro->author) }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="text" name="price" value="{{ old('price', $libro->price) }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="category_id">Categoria</label>
        <select class="form-control" name="category_id">
          <option value="">Seleziona una categoria</option>
          
          @foreach ($categorie as $categoria)
            <option value="{{ $categoria->id }}" {{ old('category_id', $libro->category->id) == $categoria->id ? 'selected' : '' }}>
              {{ $categoria->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Salva modifiche" class="btn btn-success">
      </div>
    </form>
  </div>
@endsection
