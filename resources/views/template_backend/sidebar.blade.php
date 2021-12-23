        <!--**********************************
            Sidebar start
        ***********************************-->
		<div class="dlabnav">
			<div class="dlabnav-scroll">
				<ul class="metismenu" role="menu">
				{{-- Role Admin --}}
				@if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
					<li>
						<a class="" href="{{ url('/') }}" aria-expanded="false"> <i class="fas fa-home"></i> <span class="nav-text">Dashboard</span> </a>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false"><i class="fas fa-chart-line"></i> <span class="nav-text">Master Data</span> </a>
						<ul aria-expanded="false">
							<li><a href="{{ route('jadwal.index') }}">Data Jadwal</a></li>
							<li><a href="{{ route('guru.index') }}">Data Guru</a></li>
							<li><a href="{{ route('kelas.index') }}">Data Kelas</a></li>
							<li><a href="{{ route('siswa.index') }}">Data Siswa</a></li>
							<li><a href="{{ route('mapel.index') }}">Data Mapel</a></li>
							<li><a href="{{ route('user.index') }}">Data User</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ route('guru.absensi') }}" id="AbsensiGuru" class="" aria-expanded="false"> <i class="fas fa-user-check"></i> <span class="nav-text">Absensi Guru</span> </a>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false"> <i class="fas fa-file-alt"></i> <span class="nav-text">Nilai</span> </a>
						<ul aria-expanded="false">
							<li><a href="form-element.html">Nilai Ulangan</a></li>
							<li><a href="form-wizard.html">Nilai Sikap</a></li>
							<li><a href="form-ckeditor.html">Nilai Rapot</a></li>
							<li><a href="form-pickers.html">Deskripsi Predikat</a></li>
						</ul>
					</li>
					<li>
						<a class="" href="{{ route('admin.pengumuman') }}" aria-expanded="false" id="Pengumuman"> <i class="fas fa-clipboard"></i> <span class="nav-text">Pengumuman</span> </a>
					</li>
				{{-- End Role Admin --}}
				{{-- Role Guru --}}
				@elseif (Auth::user()->role == 'Guru' && Auth::user()->guru(Auth::user()->id_card))
					<li>
						<a class="" href="{{ url('/') }}" aria-expanded="false" id="Home"> <i class="fas fa-home"></i> <span class="nav-text">Dashboard</span> </a>
					</li>
					<li>
						<a href="{{ route('absen.harian') }}" id="AbsensGuru" class="" aria-expanded="false"> <i class="fas fa-user-check"></i> <span class="nav-text">Absensi</span> </a>
					</li>
					<li>
						<a href="{{ route('jadwal.guru') }}" id="JadwalGuru" class="" aria-expanded="false"> <i class="fas fa-user-check"></i> <span class="nav-text">Jadwal</span> </a>
					</li>
					<li class="nav-item has-treeview" id="liNilaiGuru">
                        <a href="#" class="nav-link" id="NilaiGuru">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>
                                Nilai
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('ulangan.index') }}" class="nav-link" id="UlanganGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Entry Nilai Ulangan</p>
                                </a>
                            </li>
                            @if (
                                Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Pendidikan Agama dan Budi Pekerti" ||
                                Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Pendidikan Pancasila dan Kewarganegaraan"
                            )
                                <li class="nav-item">
                                    <a href="{{ route('sikap.index') }}" class="nav-link" id="SikapGuru">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Entry Nilai Sikap</p>
                                    </a>
                                </li>
                            @else
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('rapot.index') }}" class="nav-link" id="RapotGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Entry Nilai Rapot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nilai.index') }}" class="nav-link" id="DesGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Deskripsi Predikat</p>
                                </a>
                            </li>
                        </ul>
                    </li>
				{{-- End Role Guru --}}
				{{-- Role Siswa --}}
				@elseif (Auth::user()->role == 'Siswa' && Auth::user()->siswa(Auth::user()->no_induk))
					<li>
						<a class="" href="{{ url('/') }}" aria-expanded="false" id="Home"> <i class="fas fa-home"></i> <span class="nav-text">Dashboard</span> </a>
					</li>
					<li>
						<a href="{{ route('jadwal.siswa') }}" id="JadwalSiswa" class="" aria-expanded="false"> <i class="fas fa-user-check"></i> <span class="nav-text">Jadwal</span> </a>
					</li>
					@else
				{{-- End Role Siswa --}}
				@endif
				</ul>
				
				<div class="copyright">
					<p><strong>SISAKAD Panel Admin</strong> © 2021 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by Amierrudin</p>
				</div>
			</div>
		</div>
		<!--**********************************
            Sidebar end
        ***********************************-->