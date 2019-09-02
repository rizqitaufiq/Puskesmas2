<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                    <a href="{{route('dashboard.index')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">data User</li><!-- /.menu-title -->
                    <li>
                        <a href="{{route('puskesmas.index')}}"> <i class="menu-icon fa fa-hospital-o"></i>Puskesmas </a>
                    </li>
                    <li>
                        <a href="{{route('datauser')}}"> <i class="menu-icon fa fa-user"></i>User </a>
                    </li>
                    
                    <li class="menu-title">Data</li><!-- /.menu-title -->
                    <li>
                        <a href="{{route('data.index')}}"> <i class="menu-icon fa fa-tasks"></i>Lihat Data </a>
                    </li>
                    <li>
                        <a href="{{route('program.index')}}"> <i class="menu-icon fa fa-tasks"></i>Program </a>
                    </li>
                    <li>
                        <a href="{{route('indikator.index')}}"> <i class="menu-icon fa fa-tasks"></i>Indikator </a>
                    </li>
                    <li>
                        <a href="{{route('target.index')}}"> <i class="menu-icon fa fa-tasks"></i>Target Umur </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-medkit"></i><a href="{{route('data.laporan')}}">&nbsp Laporan</a></li>
                             <li><i class="fa fa-medkit"></i><a href="{{route('data.chartdata')}}">&nbsp Chart </a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->