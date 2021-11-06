@extends('theme.base')

@section('content')

<div class="container py-4">
    <h1 class="text-center">Listado de cliente</h1>
    
    {{-- <a href="{{route('client.index')}}" class="btn btn-primary">Crear cliente</a> --}}
    <a href="{{route('client.create')}}" class="btn btn-primary">Crear cliente</a>
    <br>
    <br>
    @if (Session::has('mensaje'))
        <div class="alert alert-info my-3 text-center">
            {{Session::get('mensaje')}}
        </div>
    @endif
  
    <table class="table table-bordered">
        <thead>
            <th>Nombre</th>
            <th>Saldo</th>
            <th width="1%"></th>
            <th width="1%"></th>
        </thead>
        <tbody>
           
                @forelse ($clients as $cliente)
                    <tr>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->deuda}}</td>
                        <td><a href="{{ route('client.edit',$cliente)}}" class="btn btn-warning btn-sm">Editar</a></td>
                        <td>
                            <form action="{{ route('client.destroy',$cliente)}}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estas seguro de eliminar este cliente')">Eliminar</button>
                            </form>
                        </td>
                      
                    </tr>
                 @empty
                 <tr>
                    <td colspan="3">No hay registro</td>
                </tr>
                @endforelse
        </tbody>
    </table>
    {{-- SI HAY REGISTRO MOSTRAR PAGINACION --}}
    @if ($clients->count())
        {{$clients->links()}}
    @endif

</div>
    
@endsection