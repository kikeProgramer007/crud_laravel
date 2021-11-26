@extends('theme.base')

@section('content')

<div class="container py-4">
    <h1 class="text-center">Modulos</h1>
    <a href="{{route('client.index')}}" class="btn btn-primary">Clientes</a>
    <a href="{{route('product.index')}}" class="btn btn-primary">Producto</a>
</div>
    
@endsection