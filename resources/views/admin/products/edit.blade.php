@extends('layouts.master')
@section('content')
<a href="/admin/products">Ir a Productos</a>
  <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Editar Producto</h1>
                <form action="/admin/product/{{$product->id}}/update" method="POST" id="update" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @if ($errors->any())
                    {{-- como pasar errores campo por campo ????--}}
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="titulo">Nombre de Producto</label>
                        <input type="text" name="title" id="titulo" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="rating">Precio</label>
                        <input type="number" name="price" id="rating" value="{{old('price')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="premios">Descripción</label>
                        <input type="text" name="description" value="{{old('description')}}" id="premios" class="form-control">
                    </div>
                    <div class="form-group form-control-file">
                        <label for="estreno">Imagen</label>
                        <input type="file" name="imagePath" id="img" class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="enviador" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
