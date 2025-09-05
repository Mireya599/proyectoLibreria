
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
