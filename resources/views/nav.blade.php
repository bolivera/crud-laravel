<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="https://www.postgradoutp.edu.pe/sites/default/files/logo_postgtradoutp.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('crear')}}">Agregar</a>
                </li>

            </ul>
            <form class="d-flex" action=" {{ route('buscar') }}" method="POST">
                @csrf
                <input class="form-control me-2"  name="buscar" type="search" placeholder="Buscar integrantes" aria-label="Search">
                <button class="btn btn-outline-warning" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>