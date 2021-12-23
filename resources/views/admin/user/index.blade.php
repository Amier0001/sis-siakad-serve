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
				<li class="breadcrumb-item"><a href="javascript:void(0)">Data Pengguna</a></li>
			</ol>
    </div>
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header-lift">
          <button type="button" class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#tambah-user"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
          </span>&nbsp; Tambah Data Pengguna</button> 
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>Level User</th>
                  <th>Jumlah User</th>
                  <th>Lihat User</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $role => $data)
                  <tr>
                    <td>{{ $role }}</td>
                    <td>{{ $data->count() }}</td>
                    <td>
                      <a href="{{ route('user.show', Crypt::encrypt($role)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Ditails</a>
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
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true" id="tambah-user">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="judul">Tambah Data Pengguna</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.store') }}" method="post">
        @csrf
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="email">E-Mail Address</label>
                  <input type='email' id="email" name='email' class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="role">Level User</label>
                  <select id="role" name="role" class="form-control default-select wide @error('role') is-invalid @enderror select2bs4" value="{{ old('role') }}" autocomplete="role">
                        <option value="">-- Select {{ __('Level User') }} --</option>
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                  </select>
                  @error('role')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group" id="noId">
                </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="password">Password</label>
                  <input type='password' id="password" name='password' placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="mb-3 col-md-6">
                  <label class="form-label" for="password-confirm">Confirm Password</label>
                  <input type='password' id="password-confirm" name='password-confirm' class="form-control @error('password-confirm') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
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
    $(document).ready(function(){
        $('#role').change(function(){
            var kel = $('#role option:selected').val();
            if (kel == "Guru") {
              $("#noId").html('<label for="nomer">Nomer Id Card</label><input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control" name="nomer" autocomplete="off">');
            } else if(kel == "Siswa") {
              $("#noId").html(`<label for="nomer">Nomer Induk Siswa</label><input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="off">`);
            } else if(kel == "Admin" || kel == "Operator") {
              $("#noId").html(`<label for="name">Username</label><input id="name" type="text" placeholder="Username" class="form-control" name="name" autocomplete="off">`);
            } else {
              $("#noId").html("")
            }
        });
    });
    
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataUser").addClass("active");
  </script>
@endsection