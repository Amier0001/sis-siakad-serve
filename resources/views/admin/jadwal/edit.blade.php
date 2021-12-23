@extends('template_backend.home')
@section('heading')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
  <li class="breadcrumb-item active">Edit Jadwal</li>
@endsection
@section('content')
<div class="content-body">
  <div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Edit Data Jadwal</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
        <h3 class="card-title">Edit Data Jadwal</h3>
      </div>
        <form action="{{ route('jadwal.store') }}" method="post">
          @csrf
          <div class="row">
              <div class="mb-3 col-md-4">
                  <label class="form-label" for="hari_id">Hari</label>
                  <select class="form-control default-select wide  @error('hari_id') is-invalid @enderror select2bs4" id="hari_id" name="hari_id">
                      <option selected="">--Pilih Hari--</option>
                       @foreach ($hari as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->hari_id == $data->id)
                        selected
                      @endif
                    >{{ $data->nama_hari }}</option>
                  @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-4">
                  <label class="form-label" for="kelas_id">Kelas</label>
                  <select class="form-control default-select wide  @error('kelas_id') is-invalid @enderror select2bs4" id="kelas_id" name="kelas_id">
                      <option selected="">--Pilih Kelas--</option>
                       @foreach ($kelas as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->kelas_id == $data->id)
                        selected
                      @endif
                    >{{ $data->nama_kelas }}</option>
                  @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-4">
                  <label class="form-label" for="guru_id">Kode Mapel</label>
                  <select class="form-control default-select wide  @error('guru_id') is-invalid @enderror select2bs4" id="guru_id" name="guru_id">
                      <option selected="">--Pilih Kelas--</option>
                       @foreach ($guru as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->guru_id == $data->id)
                        selected
                      @endif
                    >{{ $data->kode }}</option>
                  @endforeach
                  </select>
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-4">
                  <label class="form-label" for="hari_id">Hari</label>
                  <select class="form-control default-select wide  @error('hari_id') is-invalid @enderror select2bs4" id="hari_id" name="hari_id">
                      <option selected="">--Pilih Hari--</option>
                       @foreach ($hari as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->hari_id == $data->id)
                        selected
                      @endif
                    >{{ $data->nama_hari }}</option>
                  @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-4">
                  <label class="form-label" for="kelas_id">Kelas</label>
                  <select class="form-control default-select wide  @error('kelas_id') is-invalid @enderror select2bs4" id="kelas_id" name="kelas_id">
                      <option selected="">--Pilih Kelas--</option>
                       @foreach ($kelas as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->kelas_id == $data->id)
                        selected
                      @endif
                    >{{ $data->nama_kelas }}</option>
                  @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-4">
                  <label class="form-label" for="guru_id">Kode Mapel</label>
                  <select class="form-control default-select wide  @error('guru_id') is-invalid @enderror select2bs4" id="guru_id" name="guru_id">
                      <option selected="">--Pilih Kelas--</option>
                       @foreach ($guru as $data)
                    <option value="{{ $data->id }}"
                      @if ($jadwal->guru_id == $data->id)
                        selected
                      @endif
                    >{{ $data->kode }}</option>
                  @endforeach
                  </select>
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
        $("#DataJadwal").addClass("active");
    </script>
@endsection