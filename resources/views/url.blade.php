@extends('layouts.master')

@section('content')
      <h1>The best URL Shortener</h1>

      <form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="url" placeholder="entre une adresse URL ici" value="{{ old('url')}}">
        {!! $errors->first('url', '<p>:message</p>')!!}
        <input type="submit" name="shorten" value="Make me shorter">
      </form>
@endsection
