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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Guru</a></li>
			</ol>
        </div>
    <!-- row -->
    <div class="col-xl-12 col-lg-12 col-sm-12">
						<div class="card overflow-hidden">
							<div class="text-center p-5 overlay-box" style="background-image: url(images/big/img5.jpg);">
								<img src="{{ asset($guru->foto) }}" width="100" class="img-fluid rounded-circle" alt="">
								<h3 class="mt-3 mb-0 text-white">{{ $guru->nama_guru }}</h3>
							</div>
                            <div class="card-body">
								<div class="row text-center">
									<div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">NIP</h4>
											<h3>{{ $guru->nip }}</h3>
										</div>
									</div>
									<div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">No Id Card</h4>
											<h3>{{ $guru->id_card }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Guru Mapel</h4>
											<h3>{{ $guru->mapel->nama_mapel }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Kode jadwal</h4>
											<h3>{{ $guru->kode }}</h3>
										</div>
									</div>
								</div>
                            </div>
                            <div class="card-body">
								<div class="row text-center">
									<div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Jenis Kelamin</h4>
											@if ($guru->jk == 'L')
                                                <h5 class="card-title card-text mb-2">Laki-laki</h5>
                                            @else
                                                <h5 class="card-title card-text mb-2">Perempuan</h5>
                                            @endif
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Tempat Lahir</h4>
											<h3>{{{ $guru->tmp_lahir }}}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">Tanggal Lahir</h4>
											<h3>{{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</h3>
										</div>
									</div>
                                    <div class="col-3">
										<div class="bgl-primary rounded p-2">
											<h4 class="mb-0">No. Telepon</h4>
											<h3>{{ $guru->telp }}</h3>
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
        $("#DataGuru").addClass("active");
    </script>
@endsection