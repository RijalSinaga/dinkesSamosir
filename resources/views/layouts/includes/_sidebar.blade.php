    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="{{'/dashboard'}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    
                    @if(auth()->user()->role == 'admin')
                        <li><a href="{{'/siswa'}}" class=""><i class="lnr lnr-book"></i> <span>Siswa</span></a></li>
                        {{-- <li><a href="{{'/imunisasi'}}" class=""><i class="lnr lnr-book"></i> <span>Imunisasi</span></a></li> --}}

                        <li>
							<a href="#subPages" data-toggle="collapse" class="active" aria-expanded="true"><i class="lnr lnr-map"></i> <span>Surveilans</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse out" aria-expanded="true" style="">
								<ul class="nav">
									<li><a href="#" class=""><i class="lnr lnr-home"></i> <span>DASHBOARD</a></span></i></li>
									<li><a href="{{'/kominfo/pegawai'}}" class=""><i class="lnr lnr-code"></i> <span>Pengelola Surveilans</a></span></i></li>
									{{-- <li><a href="#" class=""><i class="lnr lnr-code"></i> <span>Imunisasi</a></span></i></li> --}}
									<li><a href="#" class=""><i class="lnr lnr-cart"></i> <span>Surveilans</a></span></i></li>
									<li><a href="{{'/covid19'}}" class=""><i class="lnr lnr-sun"></i> <span>COVID19</a></span></i></li>
								</ul>
							</div>
						</li>
                        {{-- <li><a href="#" class=""><i class="lnr lnr-code"></i> <span>DISKOMINFO</span></a></li> --}}
                    @endif
                </ul>
            </nav>
        </div>
    </div>