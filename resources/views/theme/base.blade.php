<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TeamFinor</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- Bootstrap CSS iconos-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

   <link href="{{ asset('css2/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css2/rowGroup.bootstrap5.min.css') }}" rel="stylesheet">

</head>
<body>
  @yield('content')
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="{{ asset('js2/jquery-3.5.1.js') }}"></script>
  <script src="{{ asset('js2/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js2/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('js2/dataTables.rowGroup.min.js') }}"></script>


  <!-- sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  $(document).ready(function() {
  $('#example').DataTable( {
      responsive: true,
      order: [[0, 'asc']],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
  } );
} );
</script>
</body>
