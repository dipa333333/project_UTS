<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'judul' => 'Belajar Laravel Dasar',
                'penulis' => 'Dipa A. A.',
                'penerbit' => 'TeknoPress',
                'tahun_terbit' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Mahir PHP untuk Pemula',
                'penulis' => 'Jik Developer',
                'penerbit' => 'KodeKita',
                'tahun_terbit' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
