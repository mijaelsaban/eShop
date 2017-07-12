@extends('layouts.master')
@section('content')
<ul>
	<li><a href="/admin/categories">Volver a Categorias</a></li>
	<li><a href="/admin/products/">Volver a Productos</a></li>
</ul>
	<h1>Categoria</h1>
	<h2>{{$category->name}}</h2>

	@forelse ($category->products as $product)
		<li style="font-size: 20px;">{{$product->title}}</li>
	@empty
		<h3>No hay productos, baby</h3>

	@endforelse

	
	
@endsection