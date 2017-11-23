@extends('layouts.master')

@section('content')
      <h1>The best URL Shortener</h1>

      <form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="url" placeholder="entre une adresse URL ici">
        <input type="submit" name="shorten" value="Make me shorter">
      </form>
@endsection
