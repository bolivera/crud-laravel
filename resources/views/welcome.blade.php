<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('head')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    
</head>
<body>
    @include('nav')
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <h1><strong>Lista de integrantes - Trabajo desarrollo WEB - CRUD</strong></h1>
                <h2>
                    {{(isset($metodo)) ? 'Resultados de búsqueda : ' . $busqueda : ''}}
                </h2>
                
                <div class="col">
                    <button type="button" id="btnExportar" onclick="exportReportToExcel(this)" class="btn btn-success">Exportar datos</button>
                    <table class="table mt-3" id="integrantes">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Codigo</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($integrantes as $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$item->nombres}}</td>
                                <td>{{$item->apellidos}}</td>
                                <td>{{$item->codigo}}</td>
                                <td>
                                    <a  href="{{ route('editar', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <button type="button"  class="btn btn-danger btn-sm eliminar" data-id="{{$item->id}}">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // buscar
        function exportReportToExcel() {
            $("#integrantes").table2excel({
                filename: "file"+new Date()+".xls"
            });
        }

        // Eliminar
        $('.eliminar').click(function() {
            var data = {}
                data.id = $(this).attr('data-id');
                data._token = "{{ csrf_token() }}",

            swal({
                title: "¿Estás seguro de eliminar?",
                text: "Una vez eliminado no se podrá recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{ route('eliminar')}}",
                    }).done(function (res) {
                        if(res.status == true){
                            swal("Eliminado correctamente!", {
                                icon: "success",
                                button: "Aceptar!",

                            }).then( (elminado) => {
                                location.reload();
                            });
                        }
                    });
                }
            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>