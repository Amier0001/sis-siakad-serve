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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Guru</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header-lift">
          <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tambah-guru"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
          </span>&nbsp; Tambah Data Guru</button>    
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
                  <th>Lihat Guru</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mapel as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_mapel }}</td>
                        <td>
                            <a href="{{ route('guru.mapel', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
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
{{-- Modal Tambah Guru --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="tambah-guru">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tambah Data Guru</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('guru.store') }}" method="post">
        @csrf
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="nama_guru">Nama Guru</label>
                  <input type='text' id="nama_guru" name='nama_guru' class="form-control @error('nama_guru') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="tmp_lahir">Tempat Lahir</label>
                  <input type='text' id="tmp_lahir" name='tmp_lahir' class="form-control @error('tmp_lahir') is-invalid @enderror">
              </div>
          </div>
          <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                  <input type='date' id="tgl_lahir" name='tgl_lahir' class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="jk">Jenis Kelamin</label>
                  <select id="jk" name="jk" class="form-control default-select wide @error('jk') is-invalid @enderror select2bs4">
                        <option selected="">-- Jinis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                  </select>
              </div>
          </div>
          <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="tlp">Nomer Hp</label>
                  <input type='text' id="tlp" name='tlp' onkeypress="return inputAngka(event)" class="form-control @error('tlp') is-invalid @enderror">
                </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="nip">NIP</label>
                  <input type='text' id="nip" name='nip' onkeypress="return inputAngka(event)" class="form-control @error('nip') is-invalid @enderror">
                </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
                  <label class="form-label" for="mapel_id">Mapel</label>
                  <select id="mapel_id" name="mapel_id" class="form-control default-select wide @error('mapel_id') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Mapel --</option>
                            @foreach ($mapel as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                            @endforeach
                  </select>
              </div>
              @php
                        $kode = $max+1;
                        if (strlen($kode) == 1) {
                            $id_card = "0000".$kode;
                        } else if(strlen($kode) == 2) {
                            $id_card = "000".$kode;
                        } else if(strlen($kode) == 3) {
                            $id_card = "00".$kode;
                        } else if(strlen($kode) == 4) {
                            $id_card = "0".$kode;
                        } else {
                            $id_card = $kode;
                        }
                    @endphp
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="id_card">Nomer ID Card</label>
                  <input type='text' id="id_card" name='id_card' maxlength="5" onkeypress="return inputAngka(event)" value="{{ $id_card }}" class="form-control @error('id_card') is-invalid @enderror readonly">
                </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
                  <label class="form-label" for="kode">Kode Jadwal</label>
                  <input type='text' id="kode" name='kode' maxlength="3" onkeypress="this.value = this.value.toUpperCase()" value="{{ $kode }}" class="form-control @error('kode') is-invalid @enderror">
                </div>
                <div class="mb-3 col-md-6">
                <label for="foto">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                        </div>
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
{{-- End Modal Tambah Guru --}}
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataGuru").addClass("active");
    </script>
@endsection