@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
<div class="content-body">
  <div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Siswa</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header-lift">
          <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#data-siswa"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
          </span>&nbsp; Tambah Data Siswa</button> 
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kelas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_kelas }}</td>
                        <td>
                            <a href="{{ route('siswa.kelas', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
                        </td>
                    </tr>
                @endforeach                  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Modal Tambah Siswa --}}
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="data-siswa">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul">Tambah Data Siswa</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('siswa.store') }}" method="post">
        @csrf
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="no_induk">Nomor Induk</label>
                  <input type='text' id="no_induk" name='no_induk' class="form-control @error('no_induk') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="nama_siswa">Nama Siswa</label>
                  <input type='text' id="nama_siswa" name='nama_siswa' class="form-control @error('nama_siswa') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="jk">Jenis Kelamin</label>
                  <select id="jk" name="jk" class="form-control default-select wide @error('jk') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="tmp_lahir">Tempat Lahir</label>
                  <input type='text' id="tmp_lahir" name='tmp_lahir' class="form-control @error('tmp_lahir') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="agama">Agama</label>
                  <select id="agama" name="agama" class="form-control default-select wide @error('agama') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Agama --</option>
                        <option value="islam">Islam</option>
                        <option value="katolik">Katolik</option>
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="nis">NISN</label>
                  <input type='text' id="nis" name='nis' class="form-control @error('nis') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="kelas_id">Kelas</label>
                  <select id="kelas_id" name="kelas_id" class="form-control default-select wide @error('kelas_id') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                        @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="telp">Nomor Telpon/HP</label>
                  <input type='text' id="telp" name='telp' onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                  <input type='date' id="tgl_lahir" name='tgl_lahir' class="form-control @error('tgl_lahir') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="alamat">Alamat</label>
                  <input type='text' id="alamat" name='alamat' class="form-control @error('alamat') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="foto">File Input</label>
                  <input type='file' id="tgl_lahir" name='foto' class="form-control @error('foto') is-invalid @enderror" id="foto">
              </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> &nbsp; Tambahkan</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- End Modal Tambah Mapel --}}
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
    </script>
@endsection