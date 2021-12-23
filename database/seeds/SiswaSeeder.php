<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'id' => 1,
            'no_induk' => '3212312404980001',
            'nis' => '202120212021',
            'nama_siswa' => 'Amierrudin',
            'jk' => 'L',
            'agama' => 'islam',
            'telp' => '087727664657',
            'tmp_lahir' => 'indramayu',
            'alamat' => 'Lemahabang let wargana, indramayu',
            'tgl_lahir' => '24/04/1998',
            'foto' => 'default.jpg',
            'Kelas_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
