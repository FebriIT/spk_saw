<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-1">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>

                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('kriteria')}}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Kriteria</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('crip')}}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Nilai Crips</span>
                    </a>
                </li>

                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('alternatif')}}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Alternatif</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('nilai')}}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Nilai Alternatif</span>
                    </a>
                </li>

                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('perhitungan')}}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Perhitungan</span>
                    </a>
                </li>

                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('penerima.beasiswa')}}"
                        aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Data Penerima Beasiswa</span>
                    </a>
                </li>

                <li class="text-center p-20 upgrade-btn">
                    <a href="/logout"
                        class="btn d-grid btn-danger text-white">
                        Logout
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
