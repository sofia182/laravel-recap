@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">Richiedi un preventivo</h1>
    <form action="{{ route('contact.save') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="message">Messaggio</label>
        <textarea class="form-control" name="message" rows="8" cols="80">{{ old('message') }}</textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Invia richiesta" class="btn btn-success">
      </div>
    </form>
  </div>

@endsection

@section('page_title', 'Homepage recap')
