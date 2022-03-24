<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Bangka Londry</title>
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/icon/icon.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 
	@yield('css')
</head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="{{ url('/dashboard') }}" class="logo"> <img src="{{ asset('icons/icon/2.png') }}" width="50" height="70" alt="logo"></a>
				<a href="{{url('/dashboard')}}" class="logo logo-small"> <img src="{{ asset('icons/icon/lg.png') }}" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
						<div class="noti-content">
							<ul class="notification-list">
								
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-11.jpg') }}">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">International Software
													Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-17.jpg') }}">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone
													XR</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-13.jpg') }}">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Mercury Software
												Inc</span> added a new product <span class="noti-title">Apple
												MacBook Pro</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
					</div>
				</li>
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{ asset('/pictures/' . auth()->user()->avatar ) }}" height="31" width="31" alt=""></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img class="avatar-img rounded-circle" src="{{ asset('/pictures/' . auth()->user()->avatar ) }}" alt=""> </div>
							<div class="user-text">
								<p class="text-muted mb-0">{{ Auth::user()->name }}</p>
							</div>
						</div> 
						@if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
						<a class="dropdown-item" href="{{ url('/kelola_profil') }}">Kelola Profil</a> 
						@endif
						<a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>  
					
					</div>
				</li>
			</ul>
			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control search_page_input" placeholder="Search here">
					<button class="btn" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active"> <a href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>
						@if(auth()->user()->role == 'admin')
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Kelola Data </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('/kelola_pengguna') }}"> Kelola Pengguna </a></li>
								<li><a href="{{ url('/kelola_paket') }}"> Kelola Paket </a></li>
								<li><a href="{{ url('/kelola_outlet') }}"> Kelola Outlet </a></li>
							</ul>
						</li>
						@endif
						@if(auth()->user()->role == 'admin' || auth()->user()->role == 'kasir')
						<li class="submenu"> <a href="#"><i class="far fa-money-bill-alt"></i> <span> Layanan Laundry </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('/registrasi_pelanggan') }}">Registrasi Pelanggan </a></li>
								<li><a href="{{ url('/kelola_pelanggan') }}">Kelola Pelanggan </a></li>
								<li><a href="{{ url('/kelola_transaksi') }}">Transaksi </a></li>
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-book"></i> <span> Laporan </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('/laporan_pegawai') }}">Laporan Pegawai </a></li>
								<li><a href="{{ url('/laporan_transaksi') }}">Laporan Transaksi </a></li>
							</ul>
						</li>
						@endif
						@if(auth()->user()->role == 'member' || auth()->user()->role == 'non_member')
						<li class="submenu"> <a href="#"><i class="fe fe-table"></i> <span> Pesanan </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="{{ url('/pesanan_saya') }}">Pesanan Saya </a></li>
							</ul>
						</li>
						@endif
						<li class="list-divider"></li>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="page-wrapper">
			<div class="content container-fluid isi-konten">
				@yield('konten')				
			</div>
			<div class="content-body search-konten" hidden="">
				<div class="container-fluid mt-5">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body" style="background: rgba(0, 0, 0, 0.1)">
									<h4 class="text-center judul_pencarian"></h4>
									<div class="row mt-4">
										<div class="col-md-12">
											<div class="list-group isi_cari_halaman">
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
	<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('assets/js/chart.morris.js') }}"></script> --}}
	<script src="{{ asset('assets/js/script.js') }}"></script>

	{{-- <script src="{{ asset('plugins/common/common.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('plugins/datamaps/datamaps.world.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>

	<script type="text/javascript">
        $('.search_page_input').on('keyup', function(){
            if($(this).val() != ''){
                $('.isi-konten').prop('hidden', true);
                $('.search-konten').prop('hidden', false);
                var search_word = $(this).val();
                $.ajax({
                    url: "{{ url('/cari_halaman') }}/" + search_word,
                    method: "GET",
                    success:function(response){
                        $('.judul_pencarian').html(''+response.length+' Hasil Pencarian "'+search_word+'"');
                        var lengthLoop = response.length - 1;
                        var searchResultList = '';
                        for(var i = 0; i <= lengthLoop; i++){
                            var url = "{{ url('/', ':id') }}";
                            url = url.replace('%3Aid', response[i].page_url);
                            searchResultList += '<a href="'+url+'" class="list-group-item list-group-item-action flex-column align-items-start"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1 text-primary">'+response[i].page_name+'</h5></div><div class="mb-1 page_url">http://localhost:8000/'+response[i].page_url+'</div></a>';
                        }
                        $('.isi_cari_halaman').html(searchResultList);
                        $('.page_url:contains("'+search_word+'")').each(function(){
                            var regex = new RegExp(search_word, 'gi');
                            $(this).html($(this).text().replace(regex, '<span style="background-color: yellow;">'+search_word+'</span>'));
                        });
                    }
                });
            }else{
                $('.isi-konten').prop('hidden', false);
                $('.search-konten').prop('hidden', true);
            }
        });

        $(document).ready(function(){
            $( document ).on( 'focus', ':input', function(){
                $( this ).attr( 'autocomplete', 'off' );
            });
        });

        (function($) {
            "use strict"

            new quixSettings({
                sidebarPosition: "fixed"
            });
            
        })(jQuery);
    </script>
	
    @yield('script')
</body>

</html>