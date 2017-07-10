@extends('layouts.master')
@section('content')
<a href="/admin/products/">Ir a Productos</a>
<h1>Producto</h1>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">

    @isset ($product->imagePath)
    <img src="{{$urlImage}}" alt="iphone" style="max-height: 300px;" class="img-responsive">        
    @endisset
    @empty ($product->imagePath)
      <img src="http://www.paraemigrantes.com/wp-content/themes/daily/images/default-thumb.gif" alt="Default Image" style="max-height: 300px;" class="img-responsive">        
    @endempty

      <div class="caption">
        <h3>{{$product->title}}</h3>
        <p class="description">{{$product->description}}</p>
        <div class="clearfix"> 
        <div class="pull-left price">U$S {{$product->price}}</div>
        <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection