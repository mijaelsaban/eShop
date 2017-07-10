@extends('layouts.app')
@section('title')
	Cart
@endsection

@section('content')
	

	<h1>Carrito de Compras</h1>
	<h2><a href="/shop/index">Home</a><i class="material-icons">home</i></h2>
	  <ul class="nav navbar-nav">
	    <li><i class="material-icons">shopping_cart</i> 
	      <span class="badge"> {{ 0 }} </span>
	      Shopping Cart</li>
	   </ul>
	
	<table  class="table table-responsive table-bordered table-striped ">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Precio</th>
				<th>Qty</th>
				<th>Total</th>
				<th>Acciones</th>
			</tr>
		</thead>
@endsection
		{{-- <tbody>
			@forelse($productos as $producto)
				<tr>
					<td>
						<a href="/admin/products/{{$producto->id}}">{{ $producto->title }}</a>
					</td>
					<td>
						{{ $producto->price  }}
					</td>
					<td>
						{{ $producto->description  }}
					</td>
					<td>
						{{ $producto->imagePath  }}
					</td>
					<td>
						<button class="btn btn-warning btn-xs">
							<a style="color:white;" href="/admin/product/{{$producto->id}}/edit">Editar
							</a>
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							
						</button>
					</td>
					<td>

					<form action="/admin/product/{{ $producto->id }}/delete" method="post">
					    {{ csrf_field() }}
					    {{ method_field('DELETE') }}
					    <div class="form-group">
				        <button type="submit" class="btn btn-danger btn-xs">DELETE</button>
					    </div>
					</form>

					</td>
				</tr>
			@empty 
				<div>
				<h3>No hay productos</h3>
				</div>
			@endforelse
		</tbody>
	</table>
  </div>

@endsection



 --}}