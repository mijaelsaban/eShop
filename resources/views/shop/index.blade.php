{{-- {{var_dump(session('carrito'))  }} --}}
@extends('layouts.app')
{{-- @extends('layouts.master') --}}
@section('title')
	Laravel eShop
@endsection

@php
  $cart=session('carrito');   
@endphp 

@section('content')
    @if (count(session('carrito')))
    <form class="" action="/destruir" method="post">
    {{ csrf_field() }}
    <button class="btn btn-danger">Destruir CARRITO</button>
    </form>
@endif
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <i class="material-icons">shopping_cart</i> 
        <span class="badge"> {{ count(session('carrito')) }} </span>
       <a href="/cart">Shopping Cart</a>

        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tus Compras</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul style="display: inline-flex;" class="nav navbar-nav">
        @if (session('carrito') && isset($productos) )
        @foreach ($productos as $pr)
        <div style="margin: auto;">
          <p><span style="color: brown">Nombre</span> {{ $pr->title }} <span style="color: brown">Precio: </span>${{$pr->price}}</p>
            <form  class="" action="/mija" method="post">
            {{ csrf_field() }}
               <button class="btn btn-success" type="submit" name="" value={{ $pr->id }}>
                  <i style='font-size: 20px; float: right' class="material-icons">remove_shopping_cart</i>   
               </button> 
            </form>
        </div>

        @endforeach
        @endif


      </ul>
      <form class="navbar-form navbar-left" action="/cart">
        <button type="submit" class="btn btn-success">Comprar</button>
        @if (session('carrito'))
        {{--  <span class="label label-info">Total = ${{ $pr->sum('price') }} </span> --}}
        @endif
        
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron">
  <h1>Biemvenido!</h1>
  <p>En este sitio encontraras ofertas INCREIBLES</p>
  {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> --}}
</div>
{{-- {{dd($categorias->where('id', 1) )}} --}}
{{-- {{ $categorias->pluck('name')[0]}} --}}

  <div class="container"></div>
    <ul class="nav nav-pills">
      <li role="presentation" class="active"><a href="#">Todos Los Productos</a></li>
     @foreach ($categorias as $categoria)
       <li role="presentation"><a href="#">{{ $categoria->name }}</a></li>
     @endforeach
  </div>

<form>   
  <div class="form-group" style="width: 100px; margin-top: 20px;">
    
    <select class="form-control" id="exampleSelect1">
      <option>-Filtrar Por-</option>
      <option value="price">Ordenar Por Precio Asc</a></option>
      <option value="price">Ordenar Por Precio Desc</option>
      <option value="title">Ordenar Por Nombre Asc</option>
      <option value="title">Ordenar Por Nombre Desc</option>
    </select>
  </div>
</form>





  @foreach ($products->Chunk(3) as $productChunk)
      <div class="row">
        @foreach ($productChunk as $product)
                <div class="col-sm-4 col-md-4">
                  <div class="thumbnail">
                      @isset ($product->imagePath)
                        <img src="{{ Storage::url($product->imagePath) }}" alt="{{$product->title}}" style="max-height: 150px;" class="img-responsive">
                      @endisset
                      @empty ($product->imagePath)    
                        <img src="https://www.neto.com.au/assets/images/default_product.gif" alt="iphone" style="max-height: 150px;" class="img-responsive">
                      @endempty
                        <div class="caption">
                              <h3>{{ $product->title }}</h3>
                                 <p class="description">{{$product->description}}</p>
                            <div class="clearfix"> 
                                  <div class="pull-left price">
                                  ${{$product->price}}
                                  </div>
                                {{--   <a href="" class="btn btn-success pull-right" role="button">Add to Cart</a> --}}
                                <form class="" action="" method="post">
                            {{ csrf_field() }}

                                <button class="btn btn-success pull-right" type="submit" name="id" value="{{ $product->id }}">ADD TO CART</button>
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
        
          @endforeach
      </div>
  @endforeach


      <div class="text-center">  
        {{ $products->links() }}
      </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  
  <script type="text/javascript">
  window.addEventListener('load', function(){
       var select = document.getElementById('exampleSelect1');
        select.onchange=function(){
        console.log(this.value);
        location.replace('http://localhost:8000/shop/index/order/'+this.value );
    }
  });

   
  </script>
@endsection



