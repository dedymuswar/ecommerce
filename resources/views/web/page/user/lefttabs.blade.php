<div class="dashboard_tab_button">
    <ul role="tablist" class="nav flex-column dashboard-list">
        <li><a href="{{ route('user.profilku') }}" class="nav-link {{ (request()->segment(1) == 'profile') ? 'active' : '' }}">Profil</a></li>
        <li><a href="{{ route('user.alamat') }}" class="nav-link {{ (request()->segment(1) == 'alamat') ? 'active' : '' }}">Alamat
                Pengiriman</a></li>
        <li><a href="{{ route('pesanan.show') }}" class="nav-link {{ (request()->segment(1) == 'pesanan') ? 'active' : '' }}">Pesanan Saya</a></li>
        <li><a href="/logout" class="nav-link">logout</a></li>
    </ul>
</div>