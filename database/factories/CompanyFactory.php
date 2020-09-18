<?php

namespace Database\Factories;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> \App\Models\User::all()->random()->id,
            'cname' => $title = $this->faker->company,
            'slug' => Str::slug($title),
            'address' => $this->faker->address,
            'phone' => $this->faker-> bankAccountNumber,
            'website'=> $this->faker->domainName,
            'logo'=>'images/logo.png',
            'cover_photo'=>'images/banner.jpg',
            'slogan'=>'Time to grow',
            'description'=> $this->faker->paragraph(rand(3,10)),
        ];
    }
}
