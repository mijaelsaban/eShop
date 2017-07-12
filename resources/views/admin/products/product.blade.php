@extends('layouts.master')
@section('content')
<h1>Panel de Administracion</h1>

<div class="well well-sm">
	<h4 class="text-right"> <a href="/shop/index">Ir al Eshop</a> </h4>
	<h3 class="text-right"><a href="/admin/product/create">Crear Nuevo Producto</a></h3>
</div>
{{-- {{dd($categories)}} --}}

	<div class="container"></div>
		<ul class="nav nav-pills">
		  <li role="presentation" class="active"><a href="#">Todos Los Productos</a></li>
		  <li role="presentation"><a href="/admin/categories">Todas Las Categorias</a></li>
		  <li role="presentation"><a href="/admin/categories">Smartphones</a></li>
		  <li role="presentation"><a href="#">Tablets</a></li>
		  <li role="presentation"><a href="#">Foto/Video</a></li>
		  <li role="presentation"><a href="#">Accesorios</a></li>
		  
		</ul>
	</div>

<form>   
  <div class="form-group" style="width: 200px; float: right; margin-right: 20px;">
    
    <select class="form-control" id="exampleSelect1">
      <option>----Filtrar Por------</option>
      <option>Ordenar Por Precio Asc</option>
      <option>Ordenar Por Precio Desc</option>
      <option>Ordenar Por Nombre Asc</option>
      <option>Ordenar Por Nombre Desc</option>
    </select>
  </div>
</form>



<div class="container">
	<h1>Listado de Productos</h1>
	<table  class="table table-responsive table-bordered table-striped ">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Foto</th>
				<th>Acciones</th>
				{{-- <th></th> --}}

			</tr>
		</thead>
		<tbody>
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


					{{-- <input type="hidden" name="_method" value="DELETE"><a href="/admin/product/{{$producto->id}}/delete">Borrar</a> --}}
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


	{{ $productos->links() }}
@endsection