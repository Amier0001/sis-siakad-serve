@extends('template_backend.home')
@section('heading')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
  <li class="breadcrumb-item active">{{ $kelas->nama_kelas }}</li>
@endsection
@section('content')
<div class="content-body">
  <div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Jadwal</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">{{ $kelas->nama_kelas }}</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('jadwal.index') }}" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Jadwal</th>
                  <th>Jam Pelajaran</th>
                  <th>Ruang Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->hari->nama_hari }}</td>
                    <td>
                        <h5 class="card-title">{{ $data->mapel->nama_mapel }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $data->guru->nama_guru }}</small></p>
                    </td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruang->nama_ruang }}</td>
                    <td>
                      <form action="{{ route('jadwal.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('jadwal.edit',Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
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
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataJadwal").addClass("active");
    </script>
@endsection