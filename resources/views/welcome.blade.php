@extends('theme.base')

@section('content')

<div class="container py-4">
    <h1 class="text-center">Hola kereten</h1>
    <a href="{{route('client.index')}}" class="btn btn-primary">Clientes</a>
</div>
    
@endsection