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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Jadwal</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header-lift">
          <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tambah-jadwal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
          </span>&nbsp; Tambah Data Jadwal</button>    
          <button type="button" class="btn btn-rounded btn-success" href="{{ route('jadwal.export_excel') }}" data-toggle="modal" data-target="#importExcel"><span class="btn-icon-start text-success"><i class="fa fa-upload color-success"></i>
          </span>&nbsp; Export Excel</button>  
          <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#importExcel"><span class="btn-icon-start text-primary"><i class="fas fa-file-import color-primary"></i>
          </span>&nbsp; Import Excel</button>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Lihat Jadwal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kelas as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td>
                      <a href="{{ route('jadwal.show', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
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
{{-- Modal Tambah Jadwal --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="tambah-jadwal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tambah Data Jadwal</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('jadwal.store') }}" method="post">
        @csrf
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="hari_id">Hari</label>
                  <select class="form-control default-select wide  @error('hari_id') is-invalid @enderror select2bs4" id="hari_id" name="hari_id">
                      <option selected="">--Pilih Hari--</option>
                       @foreach ($hari as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_hari }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="jam_mulai">Jam Mulai</label>
                  <input type='text' id="jam_mulai" name='jam_mulai' class="form-control @error('jam_mulai') is-invalid @enderror jam_mulai" placeholder="{{ Date('H:i') }}">
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="kelas_id">Kelas</label>
                  <select id="kelas_id" name="kelas_id" class="form-control default-select wide @error('kelas_id') is-invalid @enderror select2bs4">
                      <option selected="">--Pilih Kelas--</option>
                      @foreach ($kelas as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="jam_selesai">Jam Selesai</label>
                  <input type='text' id="jam_selesai" name='jam_selesai' class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="{{ Date('H:i') }}">
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="guru_id">Kode Mapel</label>
                  <select id="guru_id" name="guru_id" class="form-control default-select wide @error('guru_id') is-invalid @enderror select2bs4">
                      <option selected="">--Pilih Kode Mapel--</option>
                      @foreach ($guru as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label for="ruang_id" class="form-label">Ruang Kelas</label>
                  <select id="ruang_id" name="ruang_id" class="form-control default-select wide @error('ruang_id') is-invalid @enderror select2bs4">
                      <option selected="">--Pilih Ruang Kelas--</option>
                      @foreach ($ruang as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_ruang }}</option>
                      @endforeach
                  </select>
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
{{-- End Modal Tambah Jadwal --}}
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataJadwal").addClass("active");
        $("#jam_mulai,#jam_selesai").timepicker({
            timeFormat: 'HH:mm'
        });
</script>