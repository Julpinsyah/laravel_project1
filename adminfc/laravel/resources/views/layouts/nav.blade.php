<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ Route('home') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            @php
                $konfig = \App\Models\Konfig::all();
                $icon = $konfig->where('nama', 'logo')->first()->keterangan;
            @endphp
            <img class="rounded-circle" src="{{ asset('public/images/img/' . $icon) }}" alt=""
                style="max-width:50px">
        </div>
        <div class="sidebar-brand-text mx-3">IJEK FC</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ Route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ Route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>MyProfile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ Route('ubahpass') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Ubah Password</span></a>
    </li>

    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
        <li class="nav-item">
            <a class="nav-link" href="{{ Route('useradmin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Users</span></a>
        </li>
    @endif

    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Charts -->
    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
        <li class="nav-item">
            <a class="nav-link" href="{{ Route('banner.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Banner</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('club.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Club</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('galery.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Gallery</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('histori.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Histori</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('informasi.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Informasi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('konfig.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Konfigurasi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('pemain.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Pemain</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('pengurus.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Pengurus</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('posisi.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Posisi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('slide.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Slide</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ Route('slideprofile.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Slide Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ Route('sponsor.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Sponsor</span>
            </a>
        </li>
    @endif


    <li class="nav-item">
        <a class="nav-link" href="{{ Route('news.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            {{-- <i class="fa-solid fa-newspaper"></i> --}}
            <span>Berita</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ Route('latihan.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Jadwal Latihan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ Route('pertandingan.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Jadwal Pertandingan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ Route('tanding.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Liga</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ Route('video.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Video</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->

    <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-table"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
