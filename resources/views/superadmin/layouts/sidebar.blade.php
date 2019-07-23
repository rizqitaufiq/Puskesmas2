<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                    <a href="{{route('dashboard.index')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data</li><!-- /.menu-title -->

                    <li>
                        <a href="{{route('data.input')}}"> <i class="menu-icon fa fa-tasks"></i>Masukkan Data </a>
                    </li>
                    <li>
                        <a href="{{route('data.index')}}"> <i class="menu-icon fa fa-tasks"></i>Lihat Data </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('user.printdata')}}">&nbsp Laporan</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('skdn.laporan')}}">&nbsp Tabel </a></li>
                            
                        </ul>
                    </li>



                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Masukkan Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('skdn.create')}}">&nbsp SKDN</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('kadarzi.create')}}">&nbsp KADARZI</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('pmt.create')}}">&nbsp PMT</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('ttd.create')}}">&nbsp TAMBAH DARAH</a></li>
                        </ul>
                    </li>
                    

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Lihat Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('skdn.index')}}">&nbsp SKDN</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('kadarzi.index')}}">&nbsp KADARZI</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('pmt.index')}}">&nbsp PMT</a></li>
                            <li><i class="fa fa-medkit"></i><a href="{{route('ttd.index')}}">&nbsp  TAMBAH DARAH</a></li>
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