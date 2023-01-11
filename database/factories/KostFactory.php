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
            'nama_pemilik' => $this->faker->name,
            'alamat' => $this->faker->address,
            'no_telp' => $this->faker->phoneNumber,
            'deskripsi' => $this->faker->text,
            'harga' => $this->faker->numberBetween(1, 9),
            'status' => $this->faker->randomElement(['tersedia', 'terisi']),
            'tipe' => $this->faker->randomElement(['putra', 'putri', 'campur']),
            'foto' => $this->faker->imageUrl,
        ];
    }
}
