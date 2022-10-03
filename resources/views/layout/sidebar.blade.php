<aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="../../index3.html" class="brand-link">
                <img src="https://yt3.ggpht.com/ytc/AMLnZu9JW4gVnRwef3M2GbDxrfyO00bqDxawTFifLKcY=s88-c-k-c0x00ffffff-no-rj"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMK Antartika 1</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Azuzan Ananta Firdausi</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header">DASHBOARD</li>
                            <a href="/" class="nav-link {{ request()->is('dashboar*')? 'active' :'' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">MASTER</li>
                            <a href="{{ route('guru.index') }}" class="nav-link {{ request()->is('guru*')? 'active' :'' }}">
                                <i class="fas fa-user"></i>
                                <p>
                                    Guru
                                </p>
                            </a>

                            <a href="{{ route('kelas.index') }}" class="nav-link {{ request()->is('kelas*')? 'active' :'' }}">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <p>
                                    Kelas
                                </p>
                            </a>

                            <a href="{{ route('mapel.index') }}" class="nav-link {{ request()->is('mapel*')? 'active' :'' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Mapel
                                </p>
                            </a>

                            <a href="/siswa" class="nav-link {{ request()->is('siswa*')? 'active' :'' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Siswa
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>