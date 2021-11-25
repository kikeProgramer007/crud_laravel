@extends('theme.base')

@section('content')

<div class="container py-4">
{{-- CONDICIONAL PARA MOSTRAR EL EDIT Y EL CREATE --}}
    @if (isset($client))
        <h1 class="text-center">Editar cliente</h1>
    @else
        <h1 class="text-center">Crear cliente</h1>
    @endif
{{-- CONDICIONAL PARA MOSTRAR EL FORM EDIT Y EL CREATE --}}
    @if (isset($client))
        <form action="{{ route('client.update',$client) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('client.store') }}" method="post">
    @endif

    
        @csrf
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="nombre del cliente" value="{{old('nombre') ?? @$client->nombre}}">
            @error('nombre')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deuda">Deuda</label>
            <input type="number" name="deuda" class="form-control" placeholder="saldo" step="0.01"value="{{old('deuda') ?? @$client->deuda}}">
            @error('deuda')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="comentario">Comentario</label>
            <textarea cols="30" rows="4" name="comentario" class="form-control" placeholder="Comments">{{old('comentario') ?? @$client->comentario}}</textarea>
            @error('comentario')
            <p class="form-text text-danger"> {{$message}}</p>
            @enderror
        </div>
        <a href="{{route('client.index')}}" class="btn btn-primary">regresar</a>
        {{-- CONDICIONAL PARA MOSTRAR EL EDIT Y EL CREATE --}}
        @if (isset($client))
            <button type="submit" class="btn btn-success">Guardar</button>
        @else
            <button type="submit" class="btn btn-success">Guardar</button>
        @endif
       
    </form>

</div>
    
@endsection