<?php

namespace Database\Seeders;

use App\Models\Categoty;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(20)->create();
         Company::factory(20)->create();
         Job::factory(20)->create();
        //factory('App\Models\User',20)->create();

        $categories = [
            'Software','Agriculture','NGO','Digital Marketing','Networking','Govt','Banking'
        ];
        foreach($categories as $category){
            Categoty::create(['name'=>$category]);
        }
    }
}
