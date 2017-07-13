@extends('layouts.app')
@section('title')
	Cart
@endsection

@section('content')
	

	<h1>Carrito de Compras</h1>
	<h2><a href="/shop/index">Home</a><i class="material-icons">home</i></h2>
	  <ul style="margin: auto;" class="nav navbar-nav">
	    <li><i class="material-icons">shopping_cart</i> 
	      <span class="badge"> {{ count(session('carrito')) }} </span>
	      Shopping Cart
	    </li>
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

		 <tbody>
			@forelse($productos as $producto)
				<tr>
					<td>
						<a href="/admin/products/{{$producto->id}}">{{ $producto->title }}</a>
					</td>
					<td class="price">
						{{ $producto->price  }}
					</td>
					<td class="qty">
						<input style="width: 40px;" type="number" name="qty" value="1">
					</td>
					<td class="total">
						
					</td>
				
					<td>

					<form action="/admin/product/{{ $producto->id }}/delete" method="post">
					    {{ csrf_field() }}
					    <div class="form-group">
					        <button type="submit" class="btn btn-danger btn-xs">DELETE
					        </button>
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

  <div>
  	<button style="width: 50%; transform: translateX(-50%); margin: auto 50%" class="btn-group btn-lg btn-success">CHECKOUT</button>
  </div>

@endsection

<script type="text/javascript">
addEventListener('load', function(){
	var price=document.querySelector('.price');
	var priceValue= price.innerText;
	var qty=document.querySelector('.qty input');
	var qtyValue= qty.value;
	var b=document.querySelector('.total');
	
	b.innerText=qtyValue*priceValue;

		qty.addEventListener('blur' && 'change', function(){
			var x=document.querySelector('.qty input').value;
			b.innerText=x*priceValue;
			
		})
		


});
	
</script>