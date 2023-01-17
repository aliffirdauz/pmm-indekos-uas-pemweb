<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kost>
 */
class KostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            'no_telp' => $this->faker->phoneNumber,
            'deskripsi' => $this->faker->text,
            'harga' => $this->faker->numberBetween(500000, 900000),
            'status' => $this->faker->randomElement(['Tersedia', 'Terisi']),
            'tipe' => $this->faker->randomElement(['Putra', 'Putri', 'Campur']),
            'foto' => $this->faker->imageUrl,
            'pemilik_kost_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
