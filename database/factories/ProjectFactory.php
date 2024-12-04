<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3), // Nombre del proyecto
            'description' => $this->faker->paragraph, // Descripción
            'deadline' => $this->faker->date(), // Fecha límite
            'user_id' => User::factory(), // Relación con un usuario
        ];
    }
}
