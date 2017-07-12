@extends('layouts.master')


@section('content')
<a href="/admin/products">Volver a Productos</a>
<ul>
	<li> <a href="">Crear una Categoria</a></li>
</ul>
<h1>Todas las Categorias</h1>

{{-- {{ dd($categories->products) }} --}}

@foreach ($categories as $categorie)
	<li style="font-size: 20px;"><a href="/admin/categories/{{ $categorie->id }}"> {{$categorie->name}} </a> edit delete </li>
@endforeach

@endsection