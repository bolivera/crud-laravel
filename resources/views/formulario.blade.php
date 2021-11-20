<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('head')

</head>

<body>
    @include('nav')
    <div class="content">
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <h1><strong> {{ (isset($integrante) && !empty($integrante->id)) ? 'Editar integrante'  : 'Agregar integrate' }}  - Trabajo desarrollo WEB - CRUD</strong></h1>
                <div class="col-6 mt-5">

                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('success') }}</li>
                                </ul>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('guardar') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ (isset($integrante) && !empty($integrante->id)) ? $integrante->id : 0 }}">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" required 
                                        value="{{ (isset($integrante) && !empty($integrante->nombres)) ? $integrante->nombres : '' }} "
                                        placeholder="Ingrese sus nombres">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required 
                                            value="{{ (isset($integrante) && !empty($integrante->apellidos)) ? $integrante->apellidos : '' }}"
                                            placeholder="Ingrese sus apellidos">
                                </div>

                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" name="codigo" class="form-control" id="codigo" 
                                            value="{{ (isset($integrante) && !empty($integrante->codigo)) ? $integrante->codigo : '' }}"
                                            placeholder="Ingrese su codigo universitario">
                                </div>

                                <a href="/" class="btn btn-warning btn-block">Volver</a>
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


{{-- ELIMIBNAR --}}


</body>

</html>