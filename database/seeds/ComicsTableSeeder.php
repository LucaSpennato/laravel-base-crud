<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Comic;
use Illuminate\Support\Str;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) { 
            $newComic = new Comic();
            $newComic->title = $faker->unique()->words(5, true);
            $newComic->description = $faker->paragraphs(2, true);
            $newComic->thumb = $faker->imageUrl(360, 360, 'comic');
            $newComic->price = $faker->randomFloat(2, 1, 99);
            $newComic->series = $faker->sentence(3);
            $newComic->sale_date = $faker->date('Y-m-d');
            $newComic->type = $faker->sentence(2);
            $newComic->slug = Str::slug($newComic->title, '-') . "-" . $i;
            $newComic->save();
        }
    }
}
