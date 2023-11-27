<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \APP\Models\Menu_Barang::factory()->create([
        //     'nama_barang' => 'Salad Buah',
        //     'harga_barang' => '10000',
        //     'foto' => 'salad.jpg'
        // ]);

        DB::table('barang')->insert([
            'kode_barang' => Str::random(10),
            'nama_barang' => 'Salad Buah',
            'harga_barang' => '10000',
            'foto' => 'salad.jpg'
        ]);
    }
}
