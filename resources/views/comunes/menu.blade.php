<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">
        <img src="{!! asset('icons/MP/32x32.png') !!}" alt="Market Price">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Generales
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('ofertas.index')}}">Ofertas</a>
                    <a class="dropdown-item" href="{{route('sector.index')}}">Sector</a>
                    <a class="dropdown-item" href="{{route('tipoarrendamiento.index')}}">Tipos de Arrendamientos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('clientes.index')}}">Clientes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Comparables
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('arrendamientos.index')}}">Arrendamientos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('empresacomparable.index')}}">Empresas Comparables</a>
                    <a class="dropdown-item" href="{{route('empresacomparable.nuevoef')}}">Estados Financieros</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Analisis
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('analisis.arrendamientos')}}">Arrendamientos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('empresacomparable.index')}}">Estados Financieros</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('estudios.index')}}">Estudio de Precios</a>
            </li>
        </ul>
    </div>
</nav>
