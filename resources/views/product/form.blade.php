@extends('theme.base')

@section('content')

<div class="container py-4">
{{-- CONDICIONAL PARA MOSTRAR EL EDIT Y EL CREATE --}}
    @if (isset($product))
        <h1 class="text-center">Editar producto</h1>
    @else
        <h1 class="text-center">Crear producto</h1>
    @endif
{{-- CONDICIONAL PARA MOSTRAR EL FORM EDIT Y EL CREATE --}}
    @if (isset($product))
        <form action="{{ route('product.update',$product) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('product.store') }}" method="post">
    @endif

        @csrf
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="nombre del producte" value="{{old('nombre') ?? @$product->nombre}}">
            @error('nombre')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" placeholder="descripcion" value="{{old('descripcion') ?? @$product->descripcion}}">
            @error('descripcion')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio" value="{{old('precio') ?? @$product->precio}}">

            @error('precio')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stock">Stock</label>
            <input type="number" step="0.01" name="stock" class="form-control" placeholder="Stock" value="{{old('stock') ?? @$product->stock}}">

            @error('stock')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>

        <a href="{{route('product.index')}}" class="btn btn-primary">regresar</a>
        {{-- CONDICIONAL PARA MOSTRAR EL EDIT Y EL CREATE --}}
        @if (isset($product))
            <button type="submit" class="btn btn-success">Guardar</button>
        @else
            <button type="submit" class="btn btn-success">Guardar</button>
        @endif
       
    </form>

</div>
    
@endsection