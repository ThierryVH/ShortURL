
@extends('layouts.master')

@section('content')

<a href="{{ $shortened }}">
  {{ config('app.url') }}/{{ $shortened }}
</a>

@endsection
