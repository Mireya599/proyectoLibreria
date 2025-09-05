
<li class="nav-item">
    <a href="{{ route('ventas.index') }}" class="nav-link {{ Request::is('ventas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Ventas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('detalleVentas.index') }}" class="nav-link {{ Request::is('detalleVentas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Detalle Ventas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('productos.index') }}" class="nav-link {{ Request::is('productos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Productos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('categorias.index') }}" class="nav-link {{ Request::is('categorias*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Categorias</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('proovedors.index') }}" class="nav-link {{ Request::is('proovedors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Proovedors</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('compras.index') }}" class="nav-link {{ Request::is('compras*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Compras</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li>
