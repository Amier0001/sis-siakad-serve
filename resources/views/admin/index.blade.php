@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
  <li class="breadcrumb-item active">Admin</li>
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
	<div class="content-body">
            <!-- row -->
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-6">
								<div class="row">
								
									{{-- Banner sisakad --}}
									<div class="col-xl-12">
										<div class="card tryal-gradient">
											<div class="card-body tryal row">
												<div class="col-xl-7 col-sm-6">
													<h2>SISAKAD</h2>
													<h3>Sistem Informasi Akademik Sekolah </h3>
													<a href="javascript:void(0);" class="btn btn-rounded  fs-18 font-w500">Try Free Now</a>
												</div>
												<div class="col-xl-5 col-sm-6">
													<img src="../themeds/images/chart.png" alt="" class="sd-shape">
												</div>
											</div>
										</div>
									</div>
									{{-- End Banner sisakad --}}
									{{-- Pengumuman --}}
									<div class="col-xl-12">
										<div class="card">
											<div class="card-header border-0">
												<div>
													<h4 class="fs-20 font-w700">Pengumuman</h4>
												</div>
												<div>
													<a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fs-18">View More</a>
												</div>
											</div>
											<div class="card-body px-0">
												<div class="d-flex justify-content-between recent-emails">
													<div class="d-flex">
														<div class="profile-k">
															<span class="bg-success">K</span>	
														</div>
														<div class="ms-3">
															<h4 class="fs-18 font-w500">Pengumuman Hasil Ujian Akhir Semester</h4>
															<span class="font-w400 d-block">{!! $pengumuman->isi !!}</span>
														</div>
													</div>
													<div class="email-check">
														<label class="like-btn mb-0">
															  <input type="checkbox">
															  <span class="checkmark"></span>
														</label>
													</div>
												</div>
												
											</div>
										</div>
									</div>
									{{-- End Pengumuman --}}
								</div>
							</div>
							<div class="col-xl-6">
								<div class="row">
									<div class="col-xl-12">
										<div class="row">
											{{-- Total Siswa --}}
											<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
												<div class="widget-stat card bg-primary">
													<div class="card-body p-4">
														<div class="media">
															<span class="me-3">
																<i class="flaticon-381-user-7" href="{{ route('siswa.index') }}"></i>
															</span>
															<div class="media-body text-white text-end">
																<p class="mb-1">Total Siswa</p>
																<h3 class="text-white">{{ $siswa }}</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											{{-- End Total Siswa --}}
											{{-- Total Guru --}}
											<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
												<div class="widget-stat card bg-danger">
													<div class="card-body p-4">
														<div class="media">
															<span class="me-3">
																<i class="flaticon-381-user-9" href="{{ route('guru.index') }}"></i>
															</span>
															<div class="media-body text-white text-end">
																<p class="mb-1">Total Guru</p>
																<h3 class="text-white">{{ $guru }}</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											{{-- End Guru --}}
											{{-- Kelas --}}
											<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
												<div class="widget-stat card bg-warning">
													<div class="card-body p-4">
														<div class="media">
															<span class="me-3">
																<i class="flaticon-381-home-1" href="{{ route('kelas.index') }}"></i>
															</span>
															<div class="media-body text-white text-end">
																<p class="mb-1">Kelas</p>
																<h3 class="text-white">{{ $kelas }}</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											{{-- End Kelas --}}
											{{-- Mapel --}}
											<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
												<div class="widget-stat card bg-success">
													<div class="card-body p-4">
														<div class="media">
															<span class="me-3">
																<i class="flaticon-381-menu" href="{{ route('mapel.index') }}"></i>
															</span>
															<div class="media-body text-white text-end">
																<p class="mb-1">Mapel</p>
																<h3 class="text-white">{{ $mapel }}</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											{{-- End Mapel --}}
										</div>
									</div>
									{{-- Kelas/Paket keahlian --}}
									<div class="col-xl-12 col-lg-12">
										<div class="row">
											<div class="col-xl-6 col-xxl-12 col-sm-6">
												<div class="card">
													<div class="card-header border-0">
														<div>
															<h4 class="fs-20 font-w700">Kelas / Paket Keahlian</h4>
														</div>	
													</div>	
													<div class="card-body">
														<div id="emailchart"> </div>
														<div class="mb-3 mt-4">
															<h4 class="fs-18 font-w600">Keterangan</h4>
														</div>
														<div>
															<div class="d-flex align-items-center justify-content-between mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#886CC0"></rect>
																	</svg>
																	Bisnis kontruksi dan Properti
																</span>
															</div>
															<div class="d-flex align-items-center justify-content-between  mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#26E023"></rect>
																	</svg>
																	Desain Permodelan dan Informasi Bangunan
																</span>
															</div>
															<div class="d-flex align-items-center justify-content-between  mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#61CFF1"></rect>
																	</svg>
																	Elektronika Industri
																</span>
															</div>
															<div class="d-flex align-items-center justify-content-between  mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#FFDA7C"></rect>
																	</svg>
																	Otomasi Industri 
																</span>
															</div>
															<div class="d-flex align-items-center justify-content-between  mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#FF86B1"></rect>
																	</svg>
																	Teknik dan Bisnis Sepeda Motor 
																</span>
															</div>
															<div class="d-flex align-items-center justify-content-between  mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#999999"></rect>
																	</svg>
																	Rekayasa Perangkat Lunak 
																</span>
															</div>
															<div class="d-flex align-items-center justify-content-between  mb-4">
																<span class="fs-18 font-w500">	
																	<svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="20" height="20" rx="6" fill="#0b2e75"></rect>
																	</svg>
																	Teknik Pemesin
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>	
										</div>	
									</div>
									{{-- End Kelas/Paket Keahlian --}}
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            'use strict'

            var pieChartCanvasGuru = $('#pieChartGuru').get(0).getContext('2d')
            var pieDataGuru        = {
                labels: [
                    'Laki-laki', 
                    'Perempuan',
                ],
                datasets: [
                    {
                    data: [{{ $gurulk }}, {{ $gurupr }}],
                    backgroundColor : ['#007BFF', '#DC3545'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasGuru, {
                type: 'doughnut',
                data: pieDataGuru,
                options: pieOptions      
            })

            var pieChartCanvasSiswa = $('#pieChartSiswa').get(0).getContext('2d')
            var pieDataSiswa        = {
                labels: [
                    'Laki-laki', 
                    'Perempuan',
                ],
                datasets: [
                    {
                    data: [{{ $siswalk }}, {{ $siswapr }}],
                    backgroundColor : ['#007BFF', '#DC3545'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasSiswa, {
                type: 'doughnut',
                data: pieDataSiswa,
                options: pieOptions      
            })

            
            var pieChartCanvasPaket = $('#pieChartPaket').get(0).getContext('2d')
            var pieDataPaket        = {
                labels: [
                    'Bisnis kontruksi dan Properti',
                    'Desain Permodelan dan Informasi Bangunan',
                    'Elektronika Industri',
                    'Otomasi Industri',
                    'Teknik dan Bisnis Sepeda Motor',
                    'Rekayasa Perangkat Lunak',
                    'Teknik Pemesinan',
                    'Teknik Pengelasan',
                ],
                datasets: [
                    {
                    data: [{{ $bkp }}, {{ $dpib }}, {{ $ei }}, {{ $oi }}, {{ $tbsm }}, {{ $rpl }}, {{ $tpm }}, {{ $las }}],
                    backgroundColor : ['#886CC0', '#26E023', '##61CFF1', '#00a352', '#2cabe6', '#999999', '#999999', '#7980f7'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasPaket, {
                type: 'doughnut',
                data: pieDataPaket,
                options: pieOptions      
            })
        })
        
        $("#Dashboard").addClass("active");
        $("#liDashboard").addClass("menu-open");
        $("#AdminHome").addClass("active");
    </script>
@endsection