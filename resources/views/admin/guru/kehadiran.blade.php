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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Absensi Guru</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('guru.absensi') }}" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($absen as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('l, d F Y', strtotime($data->tanggal)) }}</td>
                    <td>{{ $data->kehadiran->ket }}</td>
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
        $("#AbsensiGuru").addClass("active");
    </script>
@endsection