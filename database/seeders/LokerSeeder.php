<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LowonganKerja;
use DateTime;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = LowonganKerja::create([
            'user_id' => '1',
            'nama' => 'Web Developer',
            'tgl_mulai' => now(),
            'tgl_akhir' => now(),
            'bagian' => 'IT',
            'persyaratan' => '-',
            'status' => 'AKTIF',
        ]);

    }
}
