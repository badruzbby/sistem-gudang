<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Barang;
use App\Models\Mutasi;
use Carbon\Carbon;
class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        $barangs = Barang::all();
        foreach (range(1, 10) as $index) {
            foreach ($barangs as $barang) {
                Mutasi::create([
                    'tanggal' => Carbon::now()->subDays(rand(0,30)),
                    'jenis_mutasi' => rand(0,1) ? 'masuk' : 'keluar',
                    'jumlah' => rand(1,50),
                    'user_id' => $users->random()->id,
                    'barang_id' => $barang->id,
                ]);
            }
        }
    }
}
