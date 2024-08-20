<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
            MessageSeeder::class,
            GeneralSeeder::class,
            CategorySeeder::class,
            FaqsSeeder::class,
            BeneficiosSeeder::class,
            SliderSeeder::class,
            StatusSeeder::class,
            PricesTableSeeder::class,
            PoliticasDatos::class,
            AboutUsSeeder::class,
            IconsTableSeeder::class,
            TestimonySeeder::class,
            productosCursosSeeder::class,
            ModuleSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
        ]);
    }
}
