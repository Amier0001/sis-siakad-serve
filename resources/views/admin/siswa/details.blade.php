@extends('template_backend.home')
@section('heading', 'Data Siswa')
@section('page')
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
<div class="content-body">
  <div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Detail Siswa</a></li>
			</ol>
        </div>
    <!-- row -->
    <div class="col-xl-12 col-lg-12 col-sm-12">
						<div class="card overflow-hidden">
							<div class="text-center p-5 overlay-box" style="background-image: url(images/big/img5.jpg);">
								<img src="{{ asset($siswa->foto) }}" width="100" class="img-fluid rounded-circle" alt="...">
								<h3 class="mt-3 mb-0 text-white">{{ $siswa->nama_siswa }}</h3>
							</div>
                            <div class="card-body">
								<div class="row text-center">
									<div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">No. Induk</h4>
											<h3>{{ $siswa->no_induk }}</h3>
										</div>
									</div>
									<div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">NIS</h4>
											<h3>{{ $siswa->nis }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Kelas</h4>
											<h3>{{ $siswa->kelas->nama_kelas }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Jenis Kelamin</h4>
											@if ($siswa->jk == 'L')
                                                <h5 class="card-title card-text mb-2">Laki-laki</h5>
                                            @else
                                                <h5 class="card-title card-text mb-2">Perempuan</h5>
                                            @endif
										</div>
									</div>
								</div>
                            </div>
                            <div class="card-body">
								<div class="row text-center">
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Agama</h4>
											<h3>{{ $siswa->agama }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Tempat Lahir</h4>
											<h3>{{{ $siswa->tmp_lahir }}}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Tanggal Lahir</h4>
											<h3>{{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">No. Telepon</h4>
											<h3>{{ $siswa->telp }}</h3>
										</div>
									</div>
								</div>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Alamat</h4>
											<h3>{{ $siswa->alamat }}</h3>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
					</div>
  </div>
</div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
    </script>
@endsection