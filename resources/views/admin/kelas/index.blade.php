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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Kelas</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header-lift">
          <button type="button" class="btn btn-rounded btn-info" onclick="getCreateKelas()" data-bs-toggle="modal" data-bs-target="#form-kelas"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
          </span>&nbsp; Tambah Data Kelas</button> 
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Wali Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kelas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td>{{ $data->guru->nama_guru }}</td>
                    <td>
                        <form action="{{ route('kelas.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-info btn-sm" onclick="getSubsSiswa({{$data->id}})" data-toggle="modal" data-target=".view-siswa">
                              <i class="nav-icon fas fa-users"></i> &nbsp; View Siswa
                            </button>
                            <button type="button" class="btn btn-info btn-sm" onclick="getSubsJadwal({{$data->id}})" data-toggle="modal" data-target=".view-jadwal">
                              <i class="nav-icon fas fa-calendar-alt"></i> &nbsp; View Jadwal
                            </button>
                            <button type="button" class="btn btn-success btn-sm" onclick="getEditKelas({{$data->id}})" data-toggle="modal" data-target="#form-kelas">
                              <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                            </button>
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
{{-- Modal Tambah Kelas --}}
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="form-kelas">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul">Tambah Data Kelas</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kelas.store') }}" method="post">
        @csrf
          <div class="row">
              <div class="mb-3 col-md-6">
                    <input type="hidden" id="id" name="id">
                  <label class="form-label" for="nama_kelas">Nama Kelas</label>
                  <input type='text' id="nama_kelas" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror">
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="paket_id">Pekat Keahlian</label>
                  <select id="paket_id" name="paket_id" class="form-control default-select wide @error('paket_id') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Paket Keahlian --</option>
                        @foreach ($paket as $data)
                            <option value="{{ $data->id }}">{{ $data->ket }}</option>
                        @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="guru_id">Wali Kelas</label>
                  <select id="guru_id" name="guru_id" class="form-control default-select wide @error('guru_id') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Wali Kelas --</option>
                        @foreach ($guru as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
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
{{-- End Modal Tambah Mapel --}}
@endsection
@section('script')
  <script>
    function getCreateKelas(){
      $("#judul").text('Tambah Data Kelas');
      $('#id').val('');
      $('#form_nama').html(`
        <label for="nama_kelas">Nama Kelas</label>
        <input type='text' id="nama_kelas" onkeyup="this.value = this.value.toUpperCase()" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="{{ __('Nama Kelas') }}">
      `);
      $('#nama_kelas').val('');
      $('#form_paket').html('');
      $('#form_paket').html(`
        <label for="paket_id">Paket Keahlian</label>
        <select id="paket_id" name="paket_id" class="select2bs4 form-control @error('paket_id') is-invalid @enderror">
          <option value="">-- Pilih Paket Keahlian --</option>
          @foreach ($paket as $data)
            <option value="{{ $data->id }}">{{ $data->ket }}</option>
          @endforeach
        </select>
      `);
      $('#guru_id').val('');
    }

    function getEditKelas(id){
      var parent = id;
      var form_paket = (`
        <input type="hidden" id="paket_id" name="paket_id">
        <input type="hidden" id="nama_kelas" name="nama_kelas">
      `);
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/kelas/edit/json') }}",
        success:function(result){
            // console.log(result);
          if(result){
            $.each(result,function(index, val){
              $("#judul").text('Edit Data Kelas ' + val.nama);
              $('#id').val(val.id);
              $('#form_nama').html('');
              $('#form_paket').html('');
              $("#form_paket").append(form_paket);
              $('#nama_kelas').val(val.nama);
              $("#paket_id").val(val.paket_id);
              $('#guru_id').val(val.guru_id);
            });
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
    }

    function getSubsSiswa(id){
      var parent = id;
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/siswa/view/json') }}",
        success:function(result){
          // console.log(result);
          var siswa = "";
          if(result){
            $.each(result,function(index, val){
              $("#judul-siswa").text('View Data Siswa ' + val.kelas);
              siswa += "<tr>";
                siswa += "<td>"+val.no_induk+"</td>";
                siswa += "<td>"+val.nama_siswa+"</td>";
                siswa += "<td>"+val.jk+"</td>";
                siswa += "<td><img src='"+val.foto+"' width='100px'></td>";
              siswa+="</tr>";
            });
            $("#data-siswa").html(siswa);
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
      $("#link-siswa").attr("href", "https://siakad.didev.id/listsiswapdf/"+id);
    }
    
    function getSubsJadwal(id){
      var parent = id;
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/jadwal/view/json') }}",
        success:function(result){
          // console.log(result);
          var jadwal = "";
          if(result){
            $.each(result,function(index, val){
              $("#judul-jadwal").text('View Data Jadwal ' + val.kelas);
              jadwal += "<tr>";
                jadwal += "<td>"+val.hari+"</td>";
                jadwal += "<td><h5 class='card-title'>"+val.mapel+"</h5><p class='card-text'><small class='text-muted'>"+val.guru+"</small></p></td>";
                jadwal += "<td>"+val.jam_mulai+" - "+val.jam_selesai+"</td>";
                jadwal += "<td>"+val.ruang+"</td>";
              jadwal+="</tr>";
            });
            $("#data-jadwal").html(jadwal);
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
      $("#link-jadwal").attr("href", "https://siakad.didev.id/jadwalkelaspdf/"+id);
    }

    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataKelas").addClass("active");
  </script>
@endsection