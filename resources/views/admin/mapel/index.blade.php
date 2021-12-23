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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Mapel</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header-lift">
          <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tambah-mapel"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
          </span>&nbsp; Tambah Data Mapel</button>    
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
                  <th>Nama Mapel</th>
                  <th>Paket</th>
                  <th>Kelompok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mapel as $result => $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_mapel }}</td>
                    @if ( $data->paket_id == 9 )
                      <td>{{ 'Semua' }}</td>
                    @else
                      <td>{{ $data->paket->ket }}</td>
                    @endif
                    <td>{{ $data->kelompok }}</td>
                    <td>
                        <form action="{{ route('mapel.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('mapel.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                            <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                        </form>
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
{{-- Modal Tambah Mapel --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="tambah-mapel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tambah Data Mapel</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('mapel.store') }}" method="post">
        @csrf
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="nama_mapel">Nama Mapel</label>
                  <input type='text' id="nama_mapel" name='nama_mapel' class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="{{ __('Nama Mata Pelajaran') }}">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="paket_id">Paket</label>
                  <select id="paket_id" name="paket_id" class="form-control default-select wide @error('paket_id') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Paket Mapel --</option>
                        <option value="9">Semua</option>
                            @foreach ($paket as $data)
                                <option value="{{ $data->id }}">{{ $data->ket }}</option>
                            @endforeach
                  </select>
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="kelompok">Kelompok</label>
                  <select id="kelompok" name="kelompok" class="form-control default-select wide @error('kelompok') is-invalid @enderror select2bs4">
                        <option selected="">--Pilih Kelompok Mapel--</option>
                        <option value="A">Pelajaran Umum</option>
                        <option value="B">Pelajaran Khusus</option>
                        <option value="C">Pelajaran Keahlian</option>
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
{{-- End Modal Tambah Mapel --}}
@endsection
@section('script')
  <script>
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataMapel").addClass("active");
  </script>
@endsection