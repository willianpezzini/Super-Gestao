<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nome' => fake()->name(),
            'telefone' => fake()->tollFreePhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'motivo_contato' => fake()->numberBetween(1,3),
            'mensagem' => fake()->text(200),
        ];
    }
}
