<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> \App\Models\User::all()->random()->id,
            'company_id' => \App\Models\Company::all()->random()->id,
            'title' => $title = $this->faker->companySuffix,
            'slug' => Str::slug($title),
            'roles' => $this->faker->text($maxNbChars = 10),
            'description'=> $this->faker->paragraph(rand(3,10)),
            'category_id' =>rand(0,1),
            'position' => $this->faker->jobTitle,
            'status'=>rand(0,1),
            'type'=>'Full Time',
            'last_date'=> $this->faker->dateTime,
            'address' => $this->faker->address,
        ];
    }
}
