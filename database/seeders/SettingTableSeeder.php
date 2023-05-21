<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'Toko Saya',
            'alamat' => 'Perum Graha Candi',
            'telepon' => '082264632685',
            'tipe_nota' => 1, //ini nota kecil
            'diskon' => 5,
            'path_logo' => 'images/logo.png',
            'path_kartu_member' => 'images/member.png',
        ]);
    }
}
