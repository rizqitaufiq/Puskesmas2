<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                    <a href="{{route('dashboard.index')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">data User</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Puskesmas</a>
                        <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-list"></i><a href="{{route('puskesmas.index')}}">&nbsp Puskesmas</a></li>
                            <li><i class="fa fa-user"></i><a href="{{route('puskesmas.create')}}">&nbsp Tambah</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">                            
                        <li><i class="fa fa-list"></i><a href="{{route('datauser')}}">&nbsp Data User</a></li>
                            <li><i class="fa fa-user"></i><a href="{{route('dashboard.create')}}">&nbsp Tambah User</a></li>
                        </ul>
                    </li>


                    <li class="menu-title">Data</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Lihat Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('skdn.datapus')}}">&nbsp SKDN</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('kadarzi.datapus')}}">&nbsp KADARZI</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('pmt.datapus')}}">&nbsp PMT</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('ttd.datapus')}}">&nbsp TAMBAH DARAH</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('data.index')}}"> <i class="menu-icon fa fa-tasks"></i>Lihat Data </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Program</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('program.index')}}">&nbsp Program</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('program.create')}}">&nbsp Tambah</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Indikator</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('indikator.index')}}">&nbsp Indikator</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('indikator.create')}}">&nbsp Tambah</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Target Umur</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('target.index')}}">&nbsp Target Umur</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('target.create')}}">&nbsp Tambah Target</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('user.printdata')}}">&nbsp Tabel</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('skdn.laporan')}}">&nbsp SKDN </a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('kadarzi.laporan')}}">&nbsp KADARZI</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('pmt.laporan')}}">&nbsp PMT</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('ttd.laporan')}}">&nbsp  TAMBAH DARAH</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->