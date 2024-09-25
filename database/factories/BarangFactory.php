<?php

namespace Database\Factories;
use App\Models\Barang;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Barang::class;
    public function definition(): array
    {
        return [
            //
            'nama_barang' => $this->faker->word,
            'harga' => $this->faker->numberBetween(10000, 100000),
            'stok' => $this->faker->numberBetween(1, 100),
            'deskripsi' => $this->faker->sentence,
            'kode' => $this->faker->unique()->numerify("BRG-###"),
            'kategori' => $this->faker->randomElement(['Elektronik', 'Pakaian', 'Kendaraan', 'Alat Tulis', 'Otomotif']),
            'lokasi' => $this->faker->randomElement(['Gudang Utama', 'Gudang Cabang', 'Toko', 'Kantor']),
        ];
    }
}
