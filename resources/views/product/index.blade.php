@extends('theme.base')

@section('content')

<div class="container py-4">
    <h2 class="text-center">CRUD con laravel 8, php, bootstrap 5 y datatables</h2>
    
    {{-- <a href="{{route('product.index')}}" class="btn btn-primary">Crear producto</a> --}}
    <div class="mb-3">
        <a href="{{route('product.create')}}" class="btn btn-primary"><i class="bi bi-person-plus"></i> Agregar producto</a>
    </div>
  
    @if (Session::has('mensaje'))
        <div class="alert alert-info my-3 text-center">
            {{Session::get('mensaje')}}
        </div>
    @endif
    <!-- class="table table-bordered" -->
    <div class="card">
        <div class="card-header text-center"><b>Registro de Productos</b></div>
        <div class="card-body"> 
          
          
    <table id="example" class="table table-sm table-striped table-hover table-bordered nowrap" style="width:100%">
        <thead>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th width="1%"></th>
            <th width="1%"></th>
        </thead>
        <tbody>
            @forelse ($products as $producto)
                <tr>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->stock}}</td>
                    <td><a href="{{ route('product.edit',$producto)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a></td>
                    <td>
                        <form action="{{ route('product.destroy',$producto)}}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"  onclick="archiveFunction()"><i class="bi bi-trash2-fill"></i></button>
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
     {{-- @if ($products->count())
        {{$products->links()}}
    @endif  --}}
    </div><!--card-body-->
    </div><!--card-->
</div>
<script>

function archiveFunction() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '!Si, elimínalo!',
  
    }).then((result) => {
        if (result.isConfirmed) {
        
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Yes, delete it!',
            showConfirmButton: false,
            timer: 1500
            }),
            form.submit();
        }
    });
}
</script>
@endsection

