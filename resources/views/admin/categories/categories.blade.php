@extends('layouts.master')


@section('content')
<h1>Categorias</h1>
{{ $categories }}
{{ dd($categories->products) }}

@foreach ($categories as $categorie)
	<li style="font-size: 20px;"><a href=""> {{$categorie->name}} </a></li>
@endforeach

@endsection