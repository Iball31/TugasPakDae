<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nama' => $this->faker->name(),
        'kelas' => $this->faker->randomElement(['X PPLG 1', 'XI PPLG 2', 'XII PPLG 3']),
    ];
}
}