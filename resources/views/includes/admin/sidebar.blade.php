<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Onschool.id</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">OS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown @if (Route::is('dashboard')) active @endif">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Manajemen</li>
            <li class="dropdown @if (Route::is('data-siswa.*') || Route::is('data-guru.*') || Route::is('data-admin.*')) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-user"></i> <span>Data User</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Route::is('data-siswa.*')) active @endif"><a class="nav-link" href="{{ route('data-siswa.index') }}">Data Siswa</a></li>
                    <li class="@if (Route::is('data-guru.*')) active @endif"><a class="nav-link" href="{{ route('data-guru.index') }}">Data Guru</a></li>
                    <li class="@if (Route::is('data-admin.*')) active @endif"><a class="nav-link" href="{{ route('data-admin.index') }}">Data Admin</a></li>
                </ul>
            </li>
            <li class="dropdown @if (Route::is('data-kategori.*') || Route::is('data-sub-kategori.*')) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Data Kategori</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Route::is('data-kategori.*')) active @endif"><a class="nav-link" href="{{ route('data-kategori.index') }}">Kategori</a></li>
                    <li class="@if (Route::is('data-sub-kategori.*')) active @endif"><a class="nav-link" href="{{ route('data-sub-kategori.index') }}">Sub Kategori</a></li>
                </ul>
            </li>
            <li class="dropdown @if (Route::is('materi.*')) active @endif">
                <a href="{{ route('materi.index') }}" class="nav-link"><i class="fas fa-atlas"></i><span>Materi</span></a>
            </li>
            <li class="dropdown @if (Route::is('founder.*')) active @endif">
                <a href="{{ route('founder.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Founder</span></a>
            </li>
            <li class="dropdown @if (Route::is('blog.*')) active @endif">
                <a href="{{ route('blog.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Blog</span></a>
            </li>
        </ul>
    </aside>
</div>
