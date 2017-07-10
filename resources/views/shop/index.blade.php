
@extends('layouts.app')
{{-- @extends('layouts.master') --}}
@section('title')
	Laravel shopping cart
@endsection

{{-- {{var_dump(request()->id)}} --}}
{{-- {{var_dump(request()->all())}} --}}
@section('content')

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
      <li role="presentation"><a href="#">{{ $categorias->pluck('name')[0] }}</a></li>
      <li role="presentation"><a href="#">{{ $categorias->pluck('name')[1] }}</a></li>
      <li role="presentation"><a href="#">{{ $categorias->pluck('name')[2] }}</a></li>
      <li role="presentation"><a href="#">{{ $categorias->pluck('name')[3] }}</a></li>
    </ul>
  </div>

<form>   
  <div class="form-group" style="width: 100px; margin-top: 20px;">
    
    <select class="form-control" id="exampleSelect1">
      <option>-Filtrar Por-</option>
      <option>Ordenar Por Precio Asc</a></option>
      <option>Ordenar Por Precio Desc</option>
      <option>Ordenar Por Nombre Asc</option>
      <option>Ordenar Por Nombre Desc</option>
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
                              <h3>{{$product->title}}</h3>
                                 <p class="description">{{$product->description}}</p>
                            <div class="clearfix"> 
                                  <div class="pull-left price">
                                  ${{$product->price}}
                                  </div>
                                {{--   <a href="" class="btn btn-success pull-right" role="button">Add to Cart</a> --}}
                                <form class="" action="" method="post">
                            {{ csrf_field() }}

                                <button class="btn btn-success pull-right" type="submit" name="id" value="{{ $product->id }}">ADD TO CART BTN</button>
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
  <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
@endsection



