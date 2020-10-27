<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<101;$i++) {
            $authors_name = array('Bogdan', 'Stefan', 'John', 'Robert', 'Monique', 'Eve', 'Harry', 'Anonymous', 'Edward', 'Joanne');
            $authors_lastname = array('Rowan', 'Smith', 'Brown', 'Sapkowski', 'Harrison', 'Puzo', 'Knight', 'Lake', 'Saviano', 'Pilpiuk');
            $book_names = array('Lake', 'Gomorra', 'Wind', 'Lady', 'Godfather', 'Tamed', 'Blackout', 'The Return', 'Crazy flower', 'The Searcher');

            DB::table('books')->insert([
                'author' => $authors_name[rand(0, 9)] . " " . $authors_lastname[rand(0, 9)],
                'name' => $book_names[rand(0, 9)],
                'description' => "Random note: " . Str::random(15),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
